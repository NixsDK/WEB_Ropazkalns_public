<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>


<main>

    <section class="rental-section">
        <div class="rental-header">
            <h2><?= $translations['private_events_title'] ?></h2>
        </div>

        <p>
            <?php echo $texts['private_events_instruction'] ?? 'Lai rezervētu visu teritoriju privātam pasākumam, lūdzu, sazinieties ar mūsu CEO vai COO, lai vienotos par laiku un ilgumu.'; ?><br>
        </p>

        <div class="rental-prices">
            <h3><?= $translations['private_events_prices_title'] ?></h3>
            <table>
                <tr>
                    <th><?= $translations['sauna_prices_duration'] ?></th>
                    <th><?= $translations['sauna_prices_price'] ?></th>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td><?= "24h" ?></td>
                    <td><?= "600€" ?></td>
                </tr>
            </table>
        </div>

        <div class="rental-prices">
            <h3><?= $translations[ "private_events_kontakti" ]?></h3>
        </div>

        <div class="private-event-cards">
            <div class="private-event-card">
                <img src="../images/employee2.jpg" alt="CEO">
                <h3><?php echo $texts['private_events_ceo_name'] ?? 'John Doe'; ?></h3>
                <p><?php echo $texts['private_events_ceo_role'] ?? 'CEO'; ?></p>
                <p><?php echo $texts['private_events_ceo_phone'] ?? 'Tālrunis: +371 26581569'; ?></p>
            </div>
            <div class="private-event-card">
                <img src="../images/employee1.jpg" alt="COO">
                <h3><?php echo $texts['private_events_coo_name'] ?? 'Jane Smith'; ?></h3>
                <p><?php echo $texts['private_events_coo_role'] ?? 'COO'; ?></p>
                <p><?php echo $texts['private_events_coo_phone'] ?? 'Tālrunis: +371 26581569'; ?></p>
            </div>
        </div>
    </main>

<?php include "../footer.php"; ?>
