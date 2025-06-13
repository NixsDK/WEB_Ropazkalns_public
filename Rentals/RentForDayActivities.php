<?php include "../lang.php"; ?>
<?php include "../head.php"; ?>


<main class="rental-section">
    <h2><?php echo $texts['rental_day_title'] ?? 'Īre dienas aktivitātēm'; ?></h2>
    <p><?php echo $texts['rental_day_intro'] ?? 'Neaizmirstamai lauku pieredzei izvēlieties kādu no mūsu aktivitātēm. Cenas norādītas par stundu un visu dienu.'; ?></p>

    <div class="rental-cards">

        <!-- Buggy -->
        <div class="rental-card-wrapper">
            <div class="rental-card toggle-info">
                <img src="../images/buggy.jpg" alt="Buggy">
                <div class="card-label">
                    <?php echo $texts['rental_buggy_title'] ?? 'Bagijs'; ?><br>
                    <?php echo $texts['rental_buggy_price'] ?? '$35/h - $180/d'; ?>
                </div>
            </div>
            <div class="card-details">
                <p><?php echo $texts['rental_buggy_desc'] ?? 'Bagijs ir lieliski piemērots aizraujošiem bezceļa braucieniem.'; ?></p>
                <ul>
                    <li><?php echo $texts['rental_buggy_li1'] ?? 'Iekļauta ķivere un cimdi'; ?></li>
                    <li><?php echo $texts['rental_buggy_li2'] ?? 'Vadītājiem jābūt vismaz 18 gadus veciem ar derīgu vadītāja apliecību'; ?></li>
                    <li><?php echo $texts['rental_buggy_li3'] ?? 'Degviela iekļauta pirmajai stundai'; ?></li>
                </ul>
            </div>
        </div>

        <!-- Motorbike -->
        <div class="rental-card-wrapper">
            <div class="rental-card toggle-info">
                <img src="../images/motorbike.jpg" alt="Motorbike">
                <div class="card-label">
                    <?php echo $texts['rental_bike_title'] ?? 'Motocikls'; ?><br>
                    <?php echo $texts['rental_bike_price'] ?? '$15/h - $150/d'; ?>
                </div>
            </div>
            <div class="card-details">
                <p><?php echo $texts['rental_bike_desc'] ?? 'Brīvi pārvietojies pa apkārtni ar mūsu motociklu.'; ?></p>
                <ul>
                    <li><?php echo $texts['rental_bike_li1'] ?? 'Iekļauta ķivere'; ?></li>
                    <li><?php echo $texts['rental_bike_li2'] ?? 'Degviela iekļauta pirmajām 2 stundām'; ?></li>
                    <li><?php echo $texts['rental_bike_li3'] ?? 'Jāievēro marķētās takas'; ?></li>
                </ul>
            </div>
        </div>

        <!-- Water Skis -->
        <div class="rental-card-wrapper">
            <div class="rental-card toggle-info">
                <img src="../images/Waterskies.jpg" alt="Water Skis">
                <div class="card-label">
                    <?php echo $texts['rental_ski_title'] ?? 'Ūdens slēpes'; ?><br>
                    <?php echo $texts['rental_ski_price'] ?? '$10/h - $100/d'; ?>
                </div>
            </div>
            <div class="card-details">
                <p><?php echo $texts['rental_ski_desc'] ?? 'Izbaudi adrenalīna pilnu braucienu.'; ?></p>
                <ul>
                    <li><?php echo $texts['rental_ski_li1'] ?? 'Glābšanas veste iekļauta cenā'; ?></li>
                    <li><?php echo $texts['rental_ski_li2'] ?? 'Instruktors pieejams pēc pieprasījuma'; ?></li>
                    <li><?php echo $texts['rental_ski_li3'] ?? 'Jābūt drošam ūdenī'; ?></li>
                </ul>
            </div>
        </div>

        <!-- House -->
        <div class="rental-card-wrapper">
            <div class="rental-card toggle-info">
                <img src="../images/kempingaNamins.jpeg" alt="House">
                <div class="card-label">
                    <?php echo $texts['rental_house_title'] ?? 'Namiņš'; ?><br>
                    <?php echo $texts['rental_house_price'] ?? '$250/day'; ?>
                </div>
            </div>
            <div class="card-details">
                <p><?php echo $texts['rental_house_desc'] ?? 'Ideāli piemērots ģimenes atpūtai.'; ?></p>
                <ul>
                    <li><?php echo $texts['rental_house_li1'] ?? 'Nakšņošanai līdz 4 cilvēkiem'; ?></li>
                    <li><?php echo $texts['rental_house_li2'] ?? 'Iekļauts dušas stūrītis, mini virtuve un terase'; ?></li>
                    <li><?php echo $texts['rental_house_li3'] ?? 'Pieejami malkas krājumi un grils'; ?></li>
                </ul>
            </div>
        </div>

    </div>
</main>

<?php include "../footer.php"; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.toggle-info').forEach(card => {
            card.addEventListener('click', () => {
                const details = card.nextElementSibling;
                if (details) {
                    details.style.display = (details.style.display === 'block') ? 'none' : 'block';
                }
            });
        });
    });
</script>

</body>
</html>
