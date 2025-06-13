<?php
$host = '83.149.95.205';
$dbname = 'ropazkal_rentalsystem';
$user = 'ropazkal_admin';
$pass = 'IfMoreOfUsValuedFoodAndCheerAndSongAboveHoardedGoldItWouldBeAMerrierWorld';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $db = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
