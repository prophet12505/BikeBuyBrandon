<?php
 
    $title = "Bike Buy Brandon | Logout";
    include("./view/Message.php");
    include("./inc/header.php");
    include("./inc/Utils.php");
    include("./view/ButtonGroup.php");

    Message('You have successfully logged out.', 'success');
    if(isset($_SESSION['user_id']))
    {
        session_destroy();
        
        //clear session
        $_SESSION['user_id'] = null;
        $_SESSION['name'] = null;
        $_SESSION['email'] = null;
        $_SESSION['agent'] = null;
        $_SESSION=array();
        //refresh header
        redirect_user("./logout.php");
    }
    ButtonGroup(['backToIndex']);

    include("./inc/footer.php");
    // redirect_user('./login.php');
?>