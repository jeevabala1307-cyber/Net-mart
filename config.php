<?php
mysqli_report(MYSQLI_REPORT_OFF);

$db_host = getenv('DB_HOST') ?: '127.0.0.1';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: '';
$db_name = getenv('DB_NAME') ?: 'netmart';
$db_port = (int) (getenv('DB_PORT') ?: 3306);

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    error_log('Database connection failed: ' . $conn->connect_error);
    http_response_code(500);
    exit('Database connection failed. Please check the database configuration.');
}

$conn->set_charset('utf8mb4');
?>
