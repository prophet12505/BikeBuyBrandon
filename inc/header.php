<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/card.css">
    <link rel="stylesheet" href="./css/shoplist.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <!-- font awesome  -->
    <script src="https://kit.fontawesome.com/c1145b9de9.js" crossorigin="anonymous"></script>
    <!-- jQuery and bootstrap should be put in the header    -->
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- Vue.js   -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
<div class="container-fluid">
<nav class="navbar navbar-dark bg-dark d-flex justify-content-between ">
    <ul class="navbar-nav  mb-2 mb-lg-0">   
        <!-- pay attention to relative path, it's crucial -->
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="./register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="./about.php">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="./contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="./admin/dashboard.php">Dashboard</a>
        </li>
        
    </ul>
    <ul class="navbar-nav  mb-2 mb-lg-0 me-5">
        <li class="nav-item">
            <a class="nav-link h3" 
            href=<?php
                session_start();
                if(!isset($_SESSION['user_id']))
                    echo  "./login.php";
                else{
                    echo  "./logout.php";
                }
            ?>
            > 
                <?php
                //session_start();
                if(!isset($_SESSION['user_id']))
                echo 'Login <i class="fa-solid fa-right-to-bracket"></i>';
                else{
                    echo 'Logout <i class="fa-solid fa-right-from-bracket"></i>';
                }
                ?>
                
            
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link h3" href="./viewCart.php"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a>
        </li>
    </ul>
</nav>
<header>
</header>