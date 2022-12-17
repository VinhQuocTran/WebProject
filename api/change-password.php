<?php
session_start();
require_once('connection.php');
if (
    empty($_POST['old-password']) || empty($_POST['new-password']) 
    || empty($_POST['new2-password'])
) {
    $_SESSION['res_update_state'] = "Vui lòng nhập đầy đủ thông tin";
    header("Location: ../user/profile.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$old_password = $_POST['old-password'];
$new_password = $_POST['new-password'];
$new2_password = $_POST['new2-password'];
$sql = "SELECT * FROM Person where UserID = $user_id";
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Password'] == $old_password) {
        if ($new_password == $new2_password) {
            break;
        }
    }
    $_SESSION['res_update_state'] = "Nhập lại mật khẩu mới không hợp lệ";
    header("Location: ../user/profile.php");
    exit();
}

$sql = 'UPDATE person set Password = ?  where UserID= ?';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(
        array(
            $new_password,
            $user_id
        )
    );
    $_SESSION['res_update_state'] = "Đổi mật khẩu thành công";
    header("Location: ../user/profile.php");
    exit();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>