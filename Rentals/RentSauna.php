<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>

<main>

    <section class="rental-section">
        <div class="rental-header">
            <h2><?= $translations['sauna_rental_title'] ?></h2>
        </div>

        <div class="rental-content">
            <div class="rental-text">
                <h3><?= $translations['sauna_info_title'] ?></h3>
                <ul>
                    <li><?= $translations['sauna_li1'] ?></li>
                    <li><?= $translations['sauna_li2'] ?></li>
                    <li><?= $translations['sauna_li3'] ?></li>
                    <li><?= $translations['sauna_li4'] ?></li>
                </ul>
                <p><strong><?= $translations['sauna_hours'] ?></strong></p>

                <!-- Main image inside content for consistent width -->
                <img src="../images/pirts.jpeg" alt="Pirts noma" class="rental-main-image">
            </div>
        </div>

        <div class="rental-prices">
            <h3><?= $translations['sauna_prices_title'] ?></h3>
            <table>
                <tr>
                    <th><?= $translations['sauna_prices_duration'] ?></th>
                    <th><?= $translations['sauna_prices_price'] ?></th>
                </tr>
                <tr>
                    <td><?= $translations['sauna_prices_row1_col1'] ?></td>
                    <td><?= $translations['sauna_prices_row1_col2'] ?></td>
                </tr>
                <tr>
                    <td><?= $translations['sauna_prices_row2_col1'] ?></td>
                    <td><?= $translations['sauna_prices_row2_col2'] ?></td>
                </tr>
                <tr>
                    <td><?= $translations['sauna_prices_row3_col1'] ?></td>
                    <td><?= $translations['sauna_prices_row3_col2'] ?></td>
                </tr>
            </table>
            <p class="price-note"><?= $translations['sauna_price_note'] ?></p>
        </div>

    <div class="rental-gallery">
        <h3><?= $translations['gallery_title'] ?></h3>
        <div class="gallery-row">
            <img src="../images/pirts.jpeg" class="zoomable-image" alt="Pirts foto 1">
        </div>
    </div>
</section>
<script src="/js/zoom.js" defer></script>

<?php include '../footer.php'; ?>
