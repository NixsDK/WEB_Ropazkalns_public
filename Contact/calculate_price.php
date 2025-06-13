<?php
include '../db.php'; 

$slugToType = [
  'tent'   => 'teltis',
  'house'  => 'namins',
  'rest'   => 'teritorija',
  'hottub' => 'kubls',
];

// collect form arrays
$slugs     = $_POST['rental_type'] ?? [];
$qtys      = $_POST['quantity']    ?? [];
$from      = $_POST['from_date'];
$to        = $_POST['to_date'];
$people    = (int)($_POST['people_count'] ?? 1);

if (!$slugs || !$from || !$to) exit('Missing data.');

// get items.id + pricing 
$items      = [];   // will be fed into the JSON for create_booking
$priceTotal = 0;    // running total
$days       = max(1, (new DateTime($from))->diff(new DateTime($to))->days);

$stmtItem = $db->prepare("SELECT id FROM items WHERE type = ?");
$stmtPrice= $db->prepare("SELECT * FROM pricing WHERE item_id = ?");

foreach ($slugs as $i => $slug) {
  $slug = $slug ?? '';
  $dbType = $slugToType[$slug] ?? null;
  if (!$dbType) continue;

  $stmtItem->execute([$dbType]);
  $item_id = $stmtItem->fetchColumn();
  if (!$item_id) continue;

  $qty = max(1, (int)($qtys[$i] ?? 1));
  $items[] = ['item_id'=>$item_id,'qty'=>$qty];

  $stmtPrice->execute([$item_id]);
  $p = $stmtPrice->fetch();
  if (!$p) continue;

  // base 
  $price = $p['daily_price'] *
           ($p['per_unit'] ? $qty : 1) *
           $days;

  // extra people (matters only for territory) 
  if ($p['included_people'] !== null && $people > $p['included_people']) {
      $extra = $people - $p['included_people'];
      $price += $extra * $p['extra_price_per_person'] * $days;
  }

  $priceTotal += $price;
}

if (!$items) exit('No valid items.');

// show estimate 
echo "<strong>Estimated price for $days day(s): €"
   . number_format($priceTotal,2) . '</strong><br>';

// if user clicked confirm, commit booking 
if (!empty($_POST['confirm'])) {

  $call = $db->prepare("CALL create_booking(?,?,?,?,?,?,?)");
  $call->execute([
      $_POST['name'],
      $_POST['email'],
      $from,
      $to,
      $people,
      $_POST['notes'] ?? '',
      json_encode($items)
  ]);

  $row = $call->fetch(PDO::FETCH_ASSOC);
  echo "Booking #{$row['booking_id']} saved. "
     . "Final total (authoritative): €"
     . number_format($row['total_price'],2);
}
?>
