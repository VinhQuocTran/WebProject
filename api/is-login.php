<?php
session_start();
$user_name = $_POST['txtUsername'];
$pwd = $_POST['txtPwd'];
echo $_POST['txtUsername'];
require_once('connection.php');
$sql = 'SELECT * FROM Person';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['Username'] == $user_name && $row['Password'] == $pwd) {
        $_SESSION["user_id"] = $row['UserID'];
        $_SESSION["user_name"] = $row['Username'];
        $_SESSION["user_name_temp"] = $row['Username'];
        $_SESSION["is_admin"] = $row['IsAdmin'];
        if ($row['IsAdmin'] == 1) {
            header("Location: ../admin/index.php");
            exit();
        } else {
            header("Location: ../index.php");
            exit();
        }
    }
}
$_SESSION['is-login'] = "Nhập sai tên hoặc mật khẩu";
header("Location: ../login.php");
exit();
?>