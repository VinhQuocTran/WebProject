<?php
session_start();
require_once('connection.php');
if (
    empty($_POST['flight_code']) || empty($_POST['departure_date'])
    || empty($_POST['eco_price']) || empty($_POST['bus_price'])
) {
    $_SESSION['res_add_state'] = "Vui lòng nhập đầy đủ thông tin";
    header("Location: ../admin/manage_ticket.php");
    exit();
}

$flight_code = $_POST['flight_code'];
$departure_date = $_POST['departure_date'];
$eco_price = $_POST['eco_price'];
$bus_price = $_POST['bus_price'];


// add ticket
$sql = 'SET @p0=?;
        SET @p1=?;
        SET @p2=?;
        SET @p3=?;
        CALL `insert_ticket`(@p0, @p1, @p2, @p3);';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(
        array(
            $flight_code,
            $departure_date,
            $eco_price,
            $bus_price
        )
    );
    $_SESSION['res_add_state'] = "Thêm vé thành công";
    header("Location: ../admin/manage_ticket.php");
    exit();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>