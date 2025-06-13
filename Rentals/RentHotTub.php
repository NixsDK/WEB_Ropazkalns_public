<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>

<main>
    <section class="rental-section">
        <div class="rental-header">
            <h2><?= $translations['hot_tub_rental_title'] ?></h2>
        </div>

        <div class="rental-content">
            <div class="rental-text">
                <h3><?= $translations['hot_tub_info_title'] ?></h3>
                <ul>
                    <li><?= $translations['hot_tub_li1'] ?></li>
                    <li><?= $translations['hot_tub_li2'] ?></li>
                    <li><?= $translations['hot_tub_li3'] ?></li>
                    <li><?= $translations['hot_tub_li4'] ?></li>
                </ul>
                <p><strong><?= $translations['hot_tub_available'] ?></strong></p>

                <img src="../images/kubls.jpeg" alt="Kubla noma" class="rental-main-image">
            </div>
        </div>

        <div class="rental-prices">
            <h3><?= $translations['hot_tub_prices_title'] ?></h3>
            <table>
                <tr>
                    <th><?= $translations['hot_tub_prices_duration'] ?></th>
                    <th><?= $translations['hot_tub_prices_price'] ?></th>
                </tr>
                <tr>
                    <td><?= $translations['hot_tub_prices_row1_col1'] ?></td>
                    <td><?= $translations['hot_tub_prices_row1_col2'] ?></td>
                </tr>
                <tr>
                    <td><?= $translations['hot_tub_prices_row2_col1'] ?></td>
                    <td><?= $translations['hot_tub_prices_row2_col2'] ?></td>
                </tr>
                <tr>
                    <td><?= $translations['hot_tub_prices_row3_col1'] ?></td>
                    <td><?= $translations['hot_tub_prices_row3_col2'] ?></td>
                </tr>
            </table>
            <p class="price-note"><?= $translations['hot_tub_price_note'] ?></p>
        </div>

    <div class="rental-gallery">
        <h3><?= $translations['gallery_title'] ?></h3>
        <div class="gallery-row">
            <img src="../images/kubls.jpeg" class="zoomable-image" alt="Kubla foto 1">
        </div>
    </div>
</section>
<script src="/js/zoom.js" defer></script>

<?php include '../footer.php'; ?>
