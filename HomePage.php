<?php include "lang.php"; ?>
<?php include "head.php"; ?>


    <main>
        <!-- Hero Section -->
        <section class="hero-container">
            <img src="images/Ropazkalns2.JPG" alt="Ropažkalns Countryside" class="hero-image">
            <div class="hero-overlay">
                <h2><?php echo $texts['homepage_intro_1'] ?? 'Laipni lūdzam Ropažkalnā'; ?></h2>
                <p><?php echo $texts['homepage_intro_2'] ?? ''; ?></p>
            </div>
            <div class="hero-buttons">
                <a href="Rentals/RentForDayActivities.php?lang=<?= $langCode ?>" class="btn btn-rent"><?php echo $texts['homepage_button_day'] ?? 'Dienas aktivitātes'; ?></a>
                <a href="Rentals/RentForPrivateEvents.php?lang=<?= $langCode ?>" class="btn btn-rent"><?php echo $texts['homepage_button_events'] ?? 'Privātie pasākumi'; ?></a>
                <a href="Rentals/RentalPrices.php?lang=<?= $langCode ?>" class="btn btn-rent"><?php echo $texts['homepage_button_prices'] ?? 'Īres cenas'; ?></a>
            </div>
        </section>

        <!-- New Informative Section -->
        <section class="intro-section">
            <div class="info-box">
                <h2><?php echo $texts['homepage_intro_1'] ?? ''; ?></h2>
                <p><?php echo $texts['homepage_intro_paragraph_1'] ?? ''; ?></p>
                <p><?php echo $texts['homepage_intro_paragraph_2'] ?? ''; ?></p>
            </div>

            <div class="highlight-note">
                <p><?php echo $texts['homepage_note_quiet_policy'] ?? ''; ?></p>
            </div>

            <div class="info-box">
                <p><?php echo $texts['homepage_opening_season'] ?? ''; ?></p>
                <p><?php echo $texts['homepage_pet_policy'] ?? ''; ?></p>
            </div>

            <head>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
            </head>

            <body>
            <section class="kempings-section">
                <div class="kempings-box">
                    <h2>
                        <i class="fa-solid fa-house" style="color: #508c39; margin-right: 8px;"></i>
                        Kempings
                    </h2>
                </div>
            </section>
            </body>

            <div class="rental-cards">
                <div class="rental-card" onclick="location.href='Rentals/CampingHauses.php?lang=<?= $langCode ?>'">
                    <img src="images/kempingaNamins.jpeg" alt="Kempinga namiņi">
                    <div class="card-label"><?= $texts['camping_houses_title'] ?? 'Kempinga namiņi'; ?></div>
                </div>

                <div class="rental-card" onclick="location.href='Rentals/TentPlace.php?lang=<?= $langCode ?>'">
                    <img src="images/teltis.jpeg" alt="Telšu vietas">
                    <div class="card-label"><?= $texts['tent_place_title'] ?? 'Telšu vietas'; ?></div>
                </div>

                <div class="rental-card" onclick="location.href='Rentals/ActivitiesInNature.php?lang=<?= $langCode ?>'">
                    <img src="images/pargajiens.jpeg" alt="Aktivitātes dabā">
                    <div class="card-label"><?= $texts['activities_nature_title'] ?? 'Aktivitātes dabā'; ?></div>
                </div>
            </div>

            <section class="kempings-section noma-spacing">
                <div class="kempings-box">
                    <h2>
                        <i class="fa-solid fa-hot-tub-person" style="color: #508c39; margin-right: 8px;"></i>
                        <?= $texts['rental_section_title'] ?? 'Noma' ?>
                    </h2>
                </div>
            </section>

            <div class="rental-cards">
                <div class="rental-card" onclick="location.href='Rentals/RentSauna.php?lang=<?= $langCode ?>'">
                    <img src="images/pirts.jpeg" alt="Pirts noma">
                    <div class="card-label"><?= $texts['sauna_rental_title'] ?? 'Pirts noma'; ?></div>
                </div>

                <div class="rental-card" onclick="location.href='Rentals/RentHotTub.php?lang=<?= $langCode ?>'">
                    <img src="images/kubls.jpeg" alt="Kubls noma">
                    <div class="card-label"><?= $texts['hot_tub_rental_title'] ?? 'Kubls noma'; ?></div>
                </div>
            </div>

    </main>

<?php include "footer.php"; ?>