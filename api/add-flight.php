<?php
session_start();
require_once('connection.php');
if (
    empty($_POST['plane_name']) || empty($_POST['source'])
    || empty($_POST['destination']) || empty($_POST['time_take_off'])
    || empty($_POST['duration']) || empty($_POST['area_take_off'])
    || empty($_POST['area_to_land']) || empty($_POST['seat_business'])
    || empty($_POST['seat_economy'])
) {
    $_SESSION['res_add_state'] = "Vui lòng nhập đầy đủ thông tin";
    header("Location: ../admin/index.php");
    exit();
}
$plane_name = $_POST['plane_name'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$time_take_off = $_POST['time_take_off'];
$duration = $_POST['duration'];
$area_take_off = $_POST['area_take_off'];
$area_to_land = $_POST['area_to_land'];
$seat_economy = $_POST['seat_economy'];
$seat_business = $_POST['seat_business'];

// add flight
$sql = 'INSERT INTO flight(TakeoffTime, Duration,PlaneName, EcoSeat, 
BusSeat, Source,SourceAP, Destination, DestinationAP) values(?,?,?,?,?,?,?,?,?)';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(
        array(
            $time_take_off,
            $duration,
            $plane_name,
            $seat_economy,
            $seat_business,
            $source,
            $area_take_off,
            $destination,
            $area_to_land
        )
    );
    $_SESSION['res_add_state'] = "Thêm chuyến bay thành công";
    header("Location: ../admin/");
    exit();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>