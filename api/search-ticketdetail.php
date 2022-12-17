<?php
session_start();
require_once('connection.php');
$id = $_POST['id'];
$sql = "SELECT * FROM ticketdetail, person,ticket, flight
    WHERE ticketdetail.UserID = person.UserID
    AND ticketdetail.ticketID = ticket.ticketID
    AND ticket.flightCode = flight.flightCode
    AND TicketDetailID = $id";
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $_SESSION['ticket_detail'] = serialize($row);
    exit();
}
?>