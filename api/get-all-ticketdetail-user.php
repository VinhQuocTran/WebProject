<?php
require_once('connection.php');
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM ticketdetail, person,ticket, flight
    WHERE ticketdetail.UserID = person.UserID
    AND ticketdetail.ticketID = ticket.ticketID
    AND ticket.flightCode = flight.flightCode
    AND person.UserID = $id
    ORDER BY TicketDetailID DESC";
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$i = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $timestamp = strtotime($row['PurchaseDate']);
    $new_date = date("d/m/Y", $timestamp);
    echo '<tr scope="row">
                <td>' . $row['TicketDetailID'] . '</td>
                <td>' . $row['Name'] . '</td>
                <td>' . $row['Phone'] . '</td>
                <td>' . $new_date . '</td>
                <td>' . $row['Source'] . '</td>
                <td>' . $row['Destination'] . '</td>
                <td>' . $row['TakeoffTime'] . '</td>
                <td>' . $row['AmountEcoTicket'] . '</td>
                <td>' . $row['AmountBusTicket'] . '</td>
            </tr>
        ';
}
?>