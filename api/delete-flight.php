<?php
require_once('connection.php');

if (!isset($_POST['id'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$flight_id = $_POST['id'];
$sql = 'DELETE FROM flight where FlightCode = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($flight_id));

} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>