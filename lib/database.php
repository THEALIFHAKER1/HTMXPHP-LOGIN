<?php
require_once __DIR__ . '/../lib/env.php';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
} catch (PDOException $e) {
    echo '<h1 class="z-50 relative text-3xl font-bold underline text-red-500">' . $e->getMessage() . '</h1>';
    exit;
}

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>