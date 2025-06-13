<?php
$langCode = $_GET['lang'] ?? 'lv';
$translationsPath = __DIR__ . "/translations/$langCode/$langCode.json";
$lang = file_exists($translationsPath) ? json_decode(file_get_contents($translationsPath), true) : [];

$currentPage = basename($_SERVER['SCRIPT_NAME']);
$currentDir = dirname($_SERVER['SCRIPT_NAME']);
$dir = basename($currentDir);
$base = ($dir === 'About' || $dir === 'Rentals' || $dir === 'Contact') ? '../' : '';
?>

<!DOCTYPE html>
<html lang="<?= $langCode ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $base; ?>css/styles.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #EDE8D0;
        }

        .navbar {
            background-color: rgba(255, 255, 255) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            z-index: 9999;
        }

        .navbar-brand img {
            height: 50px;
        }

        .nav-link {
            font-weight: bold;
        }

        .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: 9999 !important;
            position: absolute !important;
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .navbar-nav .dropdown-menu {
            left: 0 !important;
            right: auto !important;
            transform: none !important;
        }

        #contactDropdown + .dropdown-menu {
            left: auto !important;
            right: 0 !important;
        }

        .dropdown-item {
            color: #333;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .language-switcher {
            position: absolute;
            left: 20px;
            top: 10px;
        }

        .lang-btn {
            margin-right: 10px;
            color: #065f6b;
            text-decoration: none;
            font-weight: bold;
        }

        .fa-map-marker-alt {
            color: #3b6337;
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">

        <!-- Left side: Logo + Directions -->
        <div class="d-flex align-items-center">
            <a href="<?= $base; ?>HomePage.php" class="navbar-brand me-3">
                <img src="<?= $base; ?>images/RopazkalnsLogo2resize.png" alt="Ropažkalns Logo" width="120" />
            </a>
            <a class="nav-link" href="https://www.google.com/maps/@57.1325543,25.2537051,15.29z?entry=ttu&g_ep=EgoyMDI1MDYxMS4wIKXMDSoASAFQAw%3D%3D"
               target="_blank">
                <i class="fas fa-map-marker-alt" style="color: #3b6337;"></i> <?= $lang['location_directions'] ?? 'Braukšanas norādes' ?>
            </a>
        </div>

        <!-- Navbar toggle for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Right side: Nav items + Language -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav align-items-center">

                <!-- Nav links -->
                <li class="nav-item"><a class="nav-link" href="<?= $base; ?>HomePage.php"><?= $lang['home'] ?? 'Sākumlapa' ?></a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $lang['about'] ?? 'Par' ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <li><a class="dropdown-item" href="<?= $base; ?>About/OurStory.php?lang=<?= $langCode ?>"><?= $lang['our_story'] ?? 'Mūsu Stāsts' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>About/OurVision.php?lang=<?= $langCode ?>"><?= $lang['our_vision'] ?? 'Mūsu vīzija' ?></a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="rentalsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $lang['rent'] ?? 'Īre' ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="rentalsDropdown">
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/RentForDayActivities.php?lang=<?= $langCode ?>"><?= $lang['day_activities'] ?? 'Dienas aktivitātes' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/RentForPrivateEvents.php"><?= $lang['private_events'] ?? 'Privātie pasākumi' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/CampingHauses.php"><?= $lang['camping_house'] ?? 'Kempinga namiņš' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/TentPlace.php"><?= $lang['tent_place'] ?? 'Telšu vieta' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/ActivitiesInNature.php"><?= $lang['nature_activities'] ?? 'Aktivitātes' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/RentalPrices.php"><?= $lang['rental_prices'] ?? 'Īres cenas' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/RentSauna.php"><?= $lang['sauna'] ?? 'Pirts' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Rentals/RentHotTub.php"><?= $lang['hot_tub'] ?? 'Kubls' ?></a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="contactDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $lang['contact'] ?? 'Kontaktinformācija' ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="contactDropdown">
                        <li><a class="dropdown-item" href="<?= $base; ?>Contact/GeneralInquieries.php"><?= $lang['general_inquiries'] ?? 'Vispārīgi jautājumi' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Contact/BookingInformation.php"><?= $lang['booking_info'] ?? 'Rezervācijas informācija' ?></a></li>
                        <li><a class="dropdown-item" href="<?= $base; ?>Contact/bookingpage.php"><?= $lang['booking_page'] ?? 'Rezervācijas lapa' ?></a></li>
                    </ul>
                </li>

                <li class="nav-item d-flex align-items-center">
    <span class="nav-link disabled">
        <i class="fas fa-envelope" style="color: #3b6337;"></i> <?= $lang['email'] ?? 'Dummytest@inbox.lv' ?>
    </span>
                </li>
                <li class="nav-item d-flex align-items-center">
    <span class="nav-link disabled">
        <i class="fas fa-phone" style="color: #3b6337;"></i> <?= $lang['phone'] ?? '+371 00 000 000' ?>
    </span>
                </li>
                <!-- Language switch -->
                <li class="nav-item ms-3">
                    <a href="?lang=lv" class="lang-btn"> <img src="../images/flag_lv.png" width="18", height="18" > LV</a>
                    <a href="?lang=en" class="lang-btn"> <img src="../images/flag_gb.png" width="18", height="18" > ENG</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
