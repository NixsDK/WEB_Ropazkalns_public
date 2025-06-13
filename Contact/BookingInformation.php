<?php
require_once '../db.php'; // DB connection

if (isset($_GET['date'])) {
    header('Content-Type: application/json');

    $date = $_GET['date'];
    // gets the bookings
    $stmt = $db->prepare("
        SELECT 
            b.start_date,
            b.end_date,
            i.name AS item_name
        FROM bookings b
        LEFT JOIN booking_items bi ON bi.booking_id = b.id
        LEFT JOIN items i ON i.id = bi.item_id
        WHERE b.start_date <= :start_date AND b.end_date > :end_date
    ");

    $stmt->execute([
        'start_date' => $date,
        'end_date' => $date
    ]);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
    exit;
}
?>

<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>

<main class="rental-section">
    <h2><?= htmlspecialchars($translations['contact_booking_title'] ?? 'TITLE MISSING') ?></h2>
    <p><?= htmlspecialchars($translations['contact_booking_paragraph'] ?? 'PARAGRAPH MISSING') ?></p>

    <?php include '../Calendar.php'; ?>
</main>

<?php include "../footer.php"; ?>
