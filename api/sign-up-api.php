<?php
session_start();
require_once('connection.php');
if (
    !isset($_POST['txtUsername']) || !isset($_POST['txtEmail'])
    && !isset($_POST['txtPwd']) && !isset($_POST['txtRePwd']) && !isset($_POST['check'])
) {
    $_SESSION['check_sign_up'] = "Vui lòng nhập đầy đủ thông tin";
    header("Location: ../user/sign_up.php");
    exit();
}
$user_name = $_POST['txtUsername'];
$Email = $_POST['txtEmail'];
$pwd = $_POST['txtPwd'];
$re_pwd = $_POST['txtRePwd'];

$sql = 'SELECT * FROM person';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Username'] == $user_name || $row['Email'] == $Email) {
        $_SESSION['check_sign_up'] = "Email hoặc tài khoản đã tồn tại";
        header("Location: ../user/sign_up.php");
        exit();
    }
}
if ($pwd == $re_pwd) {
    $sql = 'INSERT INTO Person(Username,Email,Password) VALUES(?,?,?)';
} else {
    $_SESSION['check_sign_up'] = "Nhập lại mật khẩu không đúng";
    header("Location: ../user/sign_up.php");
    exit();
}
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($user_name, $Email, $pwd));
    $_SESSION['check_sign_up'] = "Đăng kí tài khoảng thành công";
    header("Location: ../user/sign_up.php");
    exit();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
?>