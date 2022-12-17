<?php
require_once('connection.php');

if (!isset($_POST['id'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$ticket_id = $_POST['id'];
$sql = 'DELETE FROM ticket where TicketID = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($ticket_id));

} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>