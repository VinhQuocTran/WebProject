<?php
session_start();
require_once('connection.php');
$sql = 'SELECT * FROM flight';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$_SESSION['all_des'] = array();
$_SESSION['all_src'] = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($_SESSION['all_des'], $row['Destination']);
    array_push($_SESSION['all_src'], $row['Source']);
}
$_SESSION['all_des'] = array_unique($_SESSION['all_des']);
$_SESSION['all_src'] = array_unique($_SESSION['all_src']);
header("Location: ../index.php");
exit();
?>