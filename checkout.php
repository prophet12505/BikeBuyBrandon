<?php
$title = "Bike Buy Brandon | Checkout";
include("./inc/header.php");
include("./inc/dbconnect.php");
include("./inc/Utils.php");
include("./service/OrderService.php");
include("./view/Message.php");
include("./view/CheckoutPage.php");


    //get endpoint, by default
    //if not logged in, redirect to login page
    if(!isset($_SESSION['user_id']))
        redirect_user("login.php?msg=You must be logged in to checkout");

    if(!isset($_SESSION['cart']))
        redirect_user("index.php?msg=Your cart is empty");
    $orderService=new OrderService($dbc);

    // set userid and total into variables
    $userid = $_SESSION['user_id'];
    $total = $_SESSION['total'];
    $checkoutResult=$orderService->checkout($_SESSION['cart'],$userid,$total);
if($checkoutResult['status']==0){
    // unset the cart and total
    if(isset($_SESSION['cart']))
        unset($_SESSION['cart']);
    if(isset($_SESSION['total']))
        unset($_SESSION['total']);
    CheckoutPage($checkoutResult['value']['ordernum'],$checkoutResult['value']['to'],$checkoutResult['value']['displaydst'],$checkoutResult['value']['do'],$checkoutResult['value']['total']);

}

?>