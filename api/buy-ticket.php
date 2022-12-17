<?php
session_start();
require_once('connection.php');
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];
}
$ticketsID = $_POST['TicketsId'];
$NumberEcoSeat = $_POST['NumberEcoSeat'];
$NumberBusSeat = $_POST['NumberBusSeat'];
$Name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$DateOfBirth = $_POST['DateOfBirth'];
$accountID = $_POST['accountID'];
$Password = $_POST['Password'];
$TotalCost = $_POST['TotalCost'];
$PurchaseDate = date("Y-m-d");

$tickets = implode(",", $_POST['TicketsId']);

$sql = "SELECT * FROM ticket where TicketID in (".$tickets.")";
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$i = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   if($NumberEcoSeat[$i] > $row['AvailEcoSeat'] ){
    $_SESSION['res_buy_ticket'] = "Số ghế phổ thông còn lại không đủ";
    header("Location: ../user/cart.php");
    exit();
   }
   if($NumberBusSeat[$i] > $row['AvailBusSeat']){
    $_SESSION['res_buy_ticket'] = "Số ghế thương gia còn lại không đủ";
    header("Location: ../user/cart.php");
    exit();
   }
    $i++;
}

$sql = 'SELECT * FROM creditcard';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
$flag = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($accountID == $row['AccountID'] && $Password == $row['Password']) {
        $flag = 1;
        if ($TotalCost < $row['Balanced']) {
            $newBalanced = $row['Balanced'] - $TotalCost;
            $sql = 'UPDATE creditcard set Balanced =? where AccountID = ?';
        try {
            $stmt = $dbCon->prepare($sql);
            $stmt->execute(
                array(
                    $newBalanced,
                    $accountID
                )
            );
        } catch (PDOException $ex) {
            die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
        }
        break;
        } else {
            $_SESSION['res_buy_ticket'] = "Số dư của bạn không đủ";
            header("Location: ../user/cart.php");
            exit();
        }
    }
}
if ($flag == 0) {
    $_SESSION['res_buy_ticket'] = "Tài khoản không hợp lệ";
    header("Location: ../user/cart.php");
    exit();
}
if (!isset($userID)) {
    $sql = 'INSERT INTO Person(Name,Email,Phone,DateOfBirth) VALUES(?,?,?,?)';
    try {
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(
            array(
                $Name,
                $email,
                $phone,
                $DateOfBirth
            )
        );
    } catch (PDOException $ex) {
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
    $sql = "SELECT * FROM person ORDER BY UserID DESC LIMIT 1";
    try {
        $stmt = $dbCon->prepare($sql);
        $stmt->execute();
    } catch (PDOException $ex) {
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $userID = $row['UserID'];
        break;
    }
}
$i = 0;
$sql = 'INSERT INTO ticketDetail(TicketID, UserID,PurchaseDate, AmountEcoTicket, 
AmountBusTicket) values(?,?,?,?,?)';
foreach ($ticketsID as $value) {
    try {
        $stmt = $dbCon->prepare($sql);
        $stmt->execute(
            array(
                $value,
                $userID,
                $PurchaseDate,
                $NumberEcoSeat[$i],
                $NumberBusSeat[$i]
            )
        );
    } catch (PDOException $ex) {
        die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
    }
    $i++;
}
$count = count($ticketsID);
$sql = "SELECT * FROM ticketDetail ORDER BY TicketDetailID DESC LIMIT $count";
$ticketDetailsID = array();
try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute();
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($ticketDetailsID, $row['TicketDetailID']);
}
$strid = join(" ", $ticketDetailsID);
$strTemp = "Mua vé thành công, hãy nhớ các vé sau: ";
$_SESSION['res_buy_ticket'] = $strTemp . $strid;
unset($_SESSION['ticket_in_cart']);
header("Location: ../user/cart.php");
exit();
?>