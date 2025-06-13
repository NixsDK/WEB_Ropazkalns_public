<?php
include '../lang.php';
include '../head.php';

$slugOptions = [
    'tent'   => $translations['reservation_item_tent'] ?? 'Tent space',
    'house'  => $translations['reservation_item_house'] ?? 'Cabin (house)',
    'rest'   => $translations['reservation_item_rest'] ?? 'Territory',
    'hottub' => $translations['reservation_item_hottub'] ?? 'Hot tub'
];
?>

<link rel="stylesheet" href="../css/style.css">

<main>
    <section class="rental-section">
        <div class="rental-header">
            <h2><?= $translations['reservation_title'] ?? 'Make a Reservation' ?></h2>
        </div>

        <div class="rental-content">
            <form id="rentalForm" class="reservation-form">

                <!-- Items Table -->
                <table id="itemsTable" class="items-table">
                    <thead>
                    <tr>
                        <th><?= $translations['reservation_item'] ?? 'Item' ?></th>
                        <th><?= $translations['reservation_quantity'] ?? 'Qty' ?></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <button type="button" id="addRow">+ <?= $translations['reservation_add_item'] ?? 'Add item' ?></button>

                <!-- Dates -->
                <div class="form-row">
                    <div class="form-group">
                        <label><?= $translations['reservation_from'] ?? 'From:' ?></label>
                        <input type="date" name="from_date" required>
                    </div>
                    <div class="form-group">
                        <label><?= $translations['reservation_to'] ?? 'To:' ?></label>
                        <input type="date" name="to_date" required>
                    </div>
                </div>

                <!-- People -->
                <div class="form-row">
                    <div class="form-group full-width">
                        <label><?= $translations['reservation_people'] ?? 'People:' ?></label>
                        <input type="number" name="people_count" min="1" value="1" required>
                    </div>
                </div>

                <!-- Name & Email -->
                <div class="form-row">
                    <div class="form-group">
                        <label><?= $translations['reservation_name'] ?? 'Your Name:' ?></label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label><?= $translations['reservation_email'] ?? 'Your Email:' ?></label>
                        <input type="email" name="email" required>
                    </div>
                </div>

                <!-- Notes -->
                <div class="form-row">
                    <div class="form-group full-width">
                        <label><?= $translations['reservation_notes'] ?? 'Notes:' ?></label>
                        <textarea name="notes" rows="3"></textarea>
                    </div>
                </div>

                <!-- Submit -->
                <div class="form-row">
                    <button type="button" id="dummyBtn"><?= $translations['reservation_calc_price'] ?? 'Get Price' ?></button>
                </div>
            </form>

            <div id="result" style="margin-top:1rem;"></div>
        </div>
    </section>
</main>

<script>
    const itemLabels = <?= json_encode($slugOptions, JSON_UNESCAPED_UNICODE); ?>;

    function buildRow() {
        const tr = document.createElement('tr');

        const sel = document.createElement('select');
        sel.name = 'rental_type[]';
        sel.required = true;
        sel.innerHTML =
            '<option value="">-- choose --</option>' +
            Object.entries(itemLabels).map(([slug, label]) =>
                `<option value="${slug}">${label}</option>`
            ).join('');
        tr.insertCell().appendChild(sel);

        const qty = document.createElement('input');
        qty.type = 'number';
        qty.name = 'quantity[]';
        qty.min = 1;
        qty.value = 1;
        tr.insertCell().appendChild(qty);

        const del = document.createElement('button');
        del.type = 'button';
        del.textContent = '×';
        del.title = 'Remove item';
        del.onclick = () => tr.remove();
        tr.insertCell().appendChild(del);

        return tr;
    }

    document.getElementById('addRow').addEventListener('click', () => {
        document.querySelector('#itemsTable tbody').appendChild(buildRow());
    });

    document.getElementById('addRow').click();

    document.getElementById('dummyBtn').addEventListener('click', () => {
        const result = document.getElementById('result');
        result.innerHTML = `<p style="color:green;"><strong>Demo only – no data submitted.</strong></p>`;
    });
</script>

<?php include '../footer.php'; ?>
