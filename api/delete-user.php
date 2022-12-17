<?php
require_once('connection.php');
if (!isset($_POST['id'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$user_id = $_POST['id'];
$sql = 'DELETE FROM Person where UserID = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($user_id));

} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}

?>