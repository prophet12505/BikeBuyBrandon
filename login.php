<?php

    $title = "Bike Buy Brandon | Register";
    include("./inc/header.php");

    include("./view/LoginForm.php");
    include("./view/Message.php");
    include("./inc/dbconnect.php");
    function clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    LoginForm(true);


    include("./inc/footer.php");
?>