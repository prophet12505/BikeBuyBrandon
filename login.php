<?php

    $title = "Bike Buy Brandon | Register";
    include("./inc/header.php");

    include("./view/LoginForm.php");
    include("./view/Message.php");
    include("./service/AccountService.php");
    function clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    

     //get endpoint
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    LoginForm(true);


  }
   //post endpoint
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("./inc/dbconnect.php");
    $accountService=new AccountService($dbc);
    
    if(!empty($_POST['email']) && !empty($_POST['password']))
        $AuthLoginResult=$accountService.AuthLogin($_POST['email'],$_POST['password']);
        if($AuthLoginResult['status']==0){
            session_start();
            $_SESSION['user_id'] = $AuthLoginResult['value']['user_id'];
            $_SESSION['name'] = $AuthLoginResult['value']['name'];
            $_SESSION['email'] = $AuthLoginResult['value']['email'];
            $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);
            
            //setcookie('firstname',$_SESSION['firstname'],time()+86400*30,"/");
            //redirect user to a loggined page
            //redirect_user('loggedin.php');
            //session_destroy();
        }
        else if($AuthLoginResult['status']==201){
            Message("User does not exist or the email and password do not match",'danger');
        }
        else if($AuthLoginResult['status']==202){
            Message('Server Error: 202','danger');
        }
    else{
        Message('All the fields are required','warning');
    }
    
        



   }




    include("./inc/footer.php");
?>