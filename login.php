<?php

    $title = "Bike Buy Brandon | Login";
    include("./inc/header.php");
    include("./inc/Utils.php");
    include("./view/LoginForm.php");
    include("./view/Message.php");
    include("./service/AccountService.php");
    include("./view/ButtonGroup.php");
  if(isset($_SESSION['user_id']))
    {
        redirect_user('./index.php');
    }
     //get endpoint
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['msg']))
        Message($_GET['msg'],"warning");
    LoginForm(true);
   
  }
   //post endpoint
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("./inc/dbconnect.php");
    $accountService=new AccountService($dbc);
    
    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $AuthLoginResult=$accountService->AuthLogin($_POST['email'],$_POST['password']);
        //successfully logged in
        if($AuthLoginResult['status']==0){

            $_SESSION['user_id'] = $AuthLoginResult['value']['user_id'];
            $_SESSION['name'] = $AuthLoginResult['value']['name'];
            $_SESSION['email'] = $AuthLoginResult['value']['email'];
            $_SESSION['agent'] = sha1($_SERVER['HTTP_USER_AGENT']);

            //setcookie('firstname',$_SESSION['firstname'],time()+86400*30,"/");
            //redirect user to a loggined page
            //print_r($_SESSION);
            //refresh header
            // redirect_user('./login.php');
            Message('You have successfully logged in', 'success');
            ButtonGroup(['backToIndex','viewCart']);
            //session_destroy();
        }
        else if($AuthLoginResult['status']==201){
            Message("User does not exist or the email and password do not match",'danger');
            LoginForm(true);
        }
        else if($AuthLoginResult['status']==202){
            Message('Server Error: 202','danger');
            LoginForm(true);
        }

    }
    else{
        Message('All the fields are required','danger');
        LoginForm(true);
    }
    
        



   }




    include("./inc/footer.php");
?>