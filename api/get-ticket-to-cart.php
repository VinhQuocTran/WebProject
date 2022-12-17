<?php
session_start();

if(!isset($_SESSION['ticket_in_cart'])){
    $_SESSION['ticket_in_cart'] = array();
}
if(isset($_POST['ticket_id'])){
    $prod_id = $_POST['ticket_id'];
    array_push($_SESSION['ticket_in_cart'],$prod_id);
    $_SESSION['ticket_in_cart'] = array_unique($_SESSION['ticket_in_cart']);
    header("Location: ../user/cart.php");
    exit();
}
if(isset($_POST['isDeleted'])){
    foreach($_SESSION['ticket_in_cart'] as $key=>$value){
        if($value == $_POST['isDeleted']){
            unset($_SESSION['ticket_in_cart'][$key]);
        if(count($_SESSION['ticket_in_cart'])==0){
            $_SESSION['ticket_in_cart'] = array();
            }
    }
}
}
?>
