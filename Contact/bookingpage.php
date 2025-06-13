<?php
include '../lang.php';
include '../head.php';

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
                    <label><?= $translations['reservation_from'] ?? 'From:' ?>
                        <input type="date" name="from_date" required>
                    </label>
                    <label><?= $translations['reservation_to'] ?? 'To:' ?>
                        <input type="date" name="to_date" required>
                    </label>
                </div>

                <!-- People -->
                <div class="form-row">
                    <label><?= $translations['reservation_people'] ?? 'People:' ?>
                        <input type="number" name="people_count" min="1" value="1" required>
                    </label>
                </div>

                <!-- Name & Email -->
                <div class="form-row">
                    <label><?= $translations['reservation_name'] ?? 'Your Name:' ?>
                        <input type="text" name="name" required>
                    </label>
                    <label><?= $translations['reservation_email'] ?? 'Your Email:' ?>
                        <input type="email" name="email" required>
                    </label>
                </div>

                <!-- Notes -->
                <label><?= $translations['reservation_notes'] ?? 'Notes:' ?>
                    <textarea name="notes" rows="2"></textarea>
                </label>

                <!-- Submit -->
                <button type="submit" id="calcBtn"><?= $translations['reservation_calc_price'] ?? 'Get Price' ?></button>
            </form>

            <div id="result" style="margin-top:1rem;"></div>
        </div>
    </section>
</main>

<script>
    const itemLabels = <?php echo json_encode($slugOptions, JSON_UNESCAPED_UNICODE); ?>;

    function buildRow() {
        const tr = document.createElement('tr');

        const sel = document.createElement('select');
        sel.name = 'rental_type[]';
        sel.required = true;
        sel.innerHTML =
            '<option value="">-- choose --</option>' +
            Object.entries(itemLabels)
                .map(([slug, label]) => `<option value="${slug}">${label}</option>`)
                .join('');
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

    const form = document.getElementById('rentalForm');
    const resultDiv = document.getElementById('result');

    form.addEventListener('submit', e => {
        e.preventDefault();
        resultDiv.textContent = '<?= $translations['reservation_calculating'] ?? 'Calculating…' ?>';

        const fd = new FormData(form);
        fetch('calculate_price.php', { method: 'POST', body: fd })
            .then(r => r.text())
            .then(html => {
                resultDiv.innerHTML = html;
                addConfirmButton();
            })
            .catch(err => resultDiv.textContent = err);
    });

    function addConfirmButton() {
        if (document.getElementById('confirmBtn')) return;

        const btn = document.createElement('button');
        btn.id = 'confirmBtn';
        btn.type = 'button';
        btn.style.marginTop = '0.5rem';
        btn.textContent = '<?= $translations['reservation_confirm'] ?? 'Confirm & Save' ?>';

        btn.addEventListener('click', () => {
            const fd = new FormData(form);
            fd.append('confirm', '1');

            resultDiv.textContent = '<?= $translations['reservation_saving'] ?? 'Saving…' ?>';
            fetch('calculate_price.php', { method: 'POST', body: fd })
                .then(r => r.text())
                .then(html => resultDiv.innerHTML = html)
                .catch(err => resultDiv.textContent = err);
        });

        resultDiv.appendChild(btn);
    }
</script>

<?php include '../footer.php'; ?>
