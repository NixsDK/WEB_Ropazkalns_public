<?php
session_start();

if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$langCode = $_SESSION['lang'] ?? 'lv';

$translationsPath = __DIR__ . "/translations/$langCode/$langCode.json";
$translations = file_exists($translationsPath) ? json_decode(file_get_contents($translationsPath), true) : [];

$texts = $translations;
$lang = $translations;
?>
