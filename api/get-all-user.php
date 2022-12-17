<?php
require_once('connection.php');
$sql = 'SELECT * FROM Person where Username!=""';
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$i = 1;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($row['IsAdmin'] == 1) {
        continue;
    }
    $timestamp = strtotime($row['DateOfBirth']);
    $new_date = date("d/m/Y", $timestamp);
    $timestamp = strtotime($row['DateOfRegister']);
    $create_date = date("d/m/Y", $timestamp);
    echo '<tr scope="row">
                <td>' . $i . '</td>
                <td>' . $row['UserID'] . '</td>
                <td>' . $create_date . '</td>
                <td>' . $row['Username'] . '</td>
                <td>' . $row['Name'] . '</td>
                <td>' . $row['Email'] . '</td>
                <td>' . $row['Phone'] . '</td>
                <td>' . $new_date . '</td>
                <td class="d-flex justify-content-center">
                <button class="btn btn-danger delete-user" id="' . $row['UserID'] . '">Xóa</button>
                </td>
                </tr>';
    $i++;
}
?>