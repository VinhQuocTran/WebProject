<?php
require_once('connection.php');
$sql = 'SELECT * FROM planetype';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$_SESSION['get_all_plane_name'] = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($_SESSION['get_all_plane_name'], $row['PlaneName']);
}
?>