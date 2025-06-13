<?php
// booking_form.public.php — Public-safe version (no DB)
$items = [
    ['id' => 1, 'name' => 'Cabin', 'type' => 'house'],
    ['id' => 2, 'name' => 'Hot Tub', 'type' => 'hot_tub'],
    ['id' => 3, 'name' => 'Sauna', 'type' => 'sauna'],
    ['id' => 4, 'name' => 'Territory', 'type' => 'territory'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make a Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Book an Item</h2>
    <form id="bookingForm">
        <div class="mb-3">
            <label for="item" class="form-label">Select Item</label>
            <select class="form-select" name="item_id" id="item" required>
                <option value="">Choose...</option>
                <?php foreach ($items as $item): ?>
                    <option value="<?= $item['id'] ?>" data-type="<?= $item['type'] ?>">
                        <?= htmlspecialchars($item['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control" name="customer_name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="customer_email" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" name="start_time" required>
        </div>

        <div class="mb-3">
            <label class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" name="end_time" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Adults</label>
            <input type="number" class="form-control" name="people_count" value="1" min="1">
        </div>

        <div class="mb-3">
            <label class="form-label">Kids Aged 4–10</label>
            <input type="number" class="form-control" name="kids_count_4_10" value="0" min="0">

            <label class="form-label mt-2">Kids Under 4</label>
            <input type="number" class="form-control" name="kids_under_4" value="0" min="0">
        </div>

        <div class="mb-3">
            <strong>Total Price: <span id="priceDisplay">0</span> EUR</strong>
        </div>

        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Booking Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="modalBody">
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    function calculatePrice() {
        const type = $("#item option:selected").data('type');
        const adults = parseInt($("input[name='people_count']").val()) || 0;
        const kids4_10 = parseInt($("input[name='kids_count_4_10']").val()) || 0;

        let price = 0;
        switch (type) {
            case 'house':
                price = 50 + adults * 15;
                break;
            case 'hot_tub':
                price = 60;
                break;
            case 'sauna':
                const hours = (new Date($("input[name='end_time']").val()) - new Date($("input[name='start_time']").val())) / 3600000;
                price = 50;
                if (hours > 2) price += (hours - 2) * 20;
                if (adults > 6) price += 10;
                break;
            case 'territory':
                price = adults * 12 + kids4_10 * 6;
                break;
        }

        $("#priceDisplay").text(price.toFixed(2));
    }

    $("#item, input").on("change", calculatePrice);
    $("input[name='start_time'], input[name='end_time']").on("change", calculatePrice);

    $("#bookingForm").on("submit", function (e) {
        e.preventDefault();
        const message = "This is a demo. No real booking is made.";
        $("#modalBody").text(message);
        new bootstrap.Modal(document.getElementById('bookingModal')).show();
        $("#bookingForm")[0].reset();
        $("#priceDisplay").text("0");
    });
});
</script>
</body>
</html>
