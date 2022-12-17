<?php
require_once('connection.php');
$sql = 'SELECT * FROM ticket';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $timestamp = strtotime($row['DepartureDate']);
    $new_date = date("d/m/Y", $timestamp);
    echo '<tr scope="row">
                <td>' . $row['TicketID'] . '</td>
                <td>' . $row['FlightCode'] . '</td>
                <td>' . $new_date . '</td>
                <td>' . number_format($row['EcoPrice']) . ' đ</td>
                <td>' . number_format($row['BusPrice']) . ' đ</td>
                <td>' . $row['AvailEcoSeat'] . '</td>
                <td>' . $row['AvailBusSeat'] . '</td>
                <td class="d-flex justify-content-center">
                <button class="btn btn-danger me-2 delete-ticket" id = "' . $row['TicketID'] . '">Xóa</button>
                <button class="btn btn-warning text-light btn-update" id = "' . $row['TicketID'] . '">Thay đổi</button>
                </td>
            </tr>
        ';
}
?>