<?php
if (
    empty($_POST['source']) || empty($_POST['destination'])
    || empty($_POST['date_depart']) || empty($_POST['date_return'])
    || empty($_POST['num_passenger'])
) {
} else {
    $_SESSION['search_flight'] = "is-check";
    $_SESSION['radio_type'] = $_POST['radio_type'];
    $_SESSION['source'] = $_POST['source'];
    $_SESSION['destination'] = $_POST['destination'];
    $_SESSION['date_depart'] = $_POST['date_depart'];
    $_SESSION['date_return'] = $_POST['date_return'];
    $_SESSION['num_passenger'] = $_POST['num_passenger'];
    $_SESSION['flight_valid'] = array();
}
$radio_type = $_SESSION['radio_type'];
$source = $_SESSION['source'];
$destination = $_SESSION['destination'];
$date_depart = $_SESSION['date_depart'];
$date_return = $_SESSION['date_return'];
$num_passenger = $_SESSION['num_passenger'];
$timestamp = strtotime($date_depart);
$new_date_depart = date("Y-m-d", $timestamp);
$timestamp = strtotime($date_return);
$new_date_return = date("Y-m-d", $timestamp);

require_once('connection.php');
if ($radio_type == "one-way") {
    $sql = "SELECT * FROM flight,ticket 
        WHERE flight.FlightCode = ticket.FlightCode
        AND DepartureDate LIKE '$new_date_depart%' 
        AND Destination = '$destination' 
        AND Source  = '$source'  
        AND (AvailEcoSeat > $num_passenger 
            OR  AvailBusSeat > $num_passenger)";
} else {
    $sql = "SELECT * FROM flight,ticket 
    WHERE flight.FlightCode = ticket.FlightCode
    AND (
            (DepartureDate LIKE '$new_date_depart%' 
            AND Destination = '$destination' 
            AND Source  = '$source'
            AND (AvailEcoSeat > $num_passenger 
                OR  AvailBusSeat > $num_passenger)
            )
            OR (DepartureDate LIKE '$new_date_return%'
            AND Destination = '$source' 
            AND Source  = '$destination'
            AND (AvailEcoSeat > $num_passenger 
                OR  AvailBusSeat > $num_passenger)
            )
    )";
}
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
                    <td>' . $row['FlightCode'] . '</td>
                    <td>' . $new_date . '</td>
                    <td>' . $row['TakeoffTime'] . '</td>
                    <td>' . $row['Source'] . '</td>
                    <td>' . $row['Destination'] . '</td>
                    <td>' . number_format($row['EcoPrice']) . ' đ</td>
                    <td>' . number_format($row['BusPrice']) . ' đ</td>
                    <td>' . $row['AvailEcoSeat'] . '</td>
                    <td>' . $row['AvailBusSeat'] . '</td>
                    <td class="d-flex justify-content-center">
                    <button class="btn btn-danger me-2 choose-ticket" id = "' . $row['TicketID'] . '">Chọn</button>
                    </td>
                </tr>
            ';
}
?>