
<?php
$conn = new mysqli("127.0.0.1", "root", "Jeeva_S_131207", "netmart", 3306);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>