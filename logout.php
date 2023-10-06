<?php
    $title = "Bike Buy Brandon | Logout";
    include("./view/Message.php");
    include("./inc/header.php");
    include("./inc/Utils.php");
    include("./view/ButtonGroup.php");

    Message('You have successfully logged out.', 'success');
    //clear session
    $_SESSION['user_id'] = null;
    $_SESSION['name'] = null;
    $_SESSION['email'] = null;
    $_SESSION['agent'] = null;
    ButtonGroup(['backToIndex']);

    include("./inc/footer.php");
    // redirect_user('./login.php');
?>