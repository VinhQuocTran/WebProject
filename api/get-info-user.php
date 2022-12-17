<?php
$user_id = $_SESSION['user_id'];
require_once('connection.php');
$sql = 'SELECT * FROM Person';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['UserID'] == $user_id) {
        $_SESSION['info_user'] = serialize($row);
        break;
    }
}
?>