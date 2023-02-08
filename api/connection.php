<?php
header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$dbName = 'airline_reservations_system_db';
$username = 'root';
$password = '';

try {
    $dbCon = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $dbName, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => 'Unable to connect: ' . $ex->getMessage())));
}

?>