<?php
require_once '../db.php';
// creates somerhing like a sequence to get days from start to end
$stmt = $db->query("
    SELECT DISTINCT d.day
    FROM (
        SELECT start_date + INTERVAL seq DAY AS day
        FROM bookings
        JOIN (
            SELECT 0 AS seq UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3
            UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6
        ) AS days
        WHERE start_date + INTERVAL seq DAY < end_date
    ) AS d
    ORDER BY d.day
");

$dates = $stmt->fetchAll(PDO::FETCH_COLUMN);
header('Content-Type: application/json');
echo json_encode($dates);
?>