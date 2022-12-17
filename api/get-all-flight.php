<?php
require_once('connection.php');
$sql = 'SELECT * FROM flight';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$_SESSION['get_all_flight_code'] = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($_SESSION['get_all_flight_code'], $row['FlightCode']);
    echo '<tr scope="row">
                <td>' . $row['FlightCode'] . '</td>
                <td>' . $row['TakeoffTime'] . '</td>
                <td>' . $row['Duration'] . '</td>
                <td>' . $row['PlaneName'] . '</td>
                <td>' . $row['EcoSeat'] . '</td>
                <td>' . $row['BusSeat'] . '</td>
                <td>' . $row['Source'] . '</td>
                <td>' . $row['SourceAP'] . '</td>
                <td>' . $row['Destination'] . '</td>
                <td>' . $row['DestinationAP'] . '</td>
                <td class="d-flex justify-content-center">
                <button class="btn btn-danger me-2 delete-flight" id = "' . $row['FlightCode'] . '">Xóa</button>
                <button class="btn btn-warning text-light btn-update" id = "' . $row['FlightCode'] . '">Thay đổi</button>
                </td>
            </tr>
        ';
}
?>