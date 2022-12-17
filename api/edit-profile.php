<?php
session_start();
require_once('connection.php');
if (
    empty($_POST['full_name']) || empty($_POST['new-email'])
    || empty($_POST['phone']) || empty($_POST['dob'])
) {
    $_SESSION['res_save_change'] = "Vui lòng nhập đầy đủ thông tin";
    header("Location: ../user/profile.php");
    exit();
}
$id = $_SESSION['user_id'];
$full_name = $_POST['full_name'];
$email = $_POST['new-email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];


$sql = 'UPDATE Person set Name = ?, Email = ?,
     Phone = ?, DateOfBirth=? where UserID = ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($full_name, $email, $phone, $dob, $id));
    $_SESSION['res_save_change'] = "Chỉnh sửa thông tin thành công";
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
header("Location: ../user/profile.php");
exit()
    ?>