<?php
$title = "Bike Buy Brandon | Register";
include("./inc/header.php");
include('./inc/constants/dir.php');
include("./view/RegisterForm.php");
include("./view/Message.php");

include("./service/AccountService.php")


?>
<!-- html section    -->

        <?php
            include('./inc/Utils.php');
            if (isset($_POST['submit'])) {
                RegisterForm($showForm = false);
                if (
                    !empty($_POST['name'])
                    && !empty($_POST['password'])
                    && !empty($_POST['email'])
                    && !empty($_POST['passwordRepeat'])
                ) {
                    if($_POST['password']==$_POST['passwordRepeat']){
                        //Message("Thank you, you have successfully registered our newsletter!", "success");
                        $name = clean_input($_POST['name']);
                        $email = clean_input($_POST['email']);
                        $password = clean_input($_POST['password']);
                        $passwordRepeat = clean_input($_POST['passwordRepeat']);
                        include("./inc/dbconnect.php");
                        $accountService=new AccountService($dbc);
                        $signupResult=$accountService->signup($name,$email,$password);
                        if($signupResult['status']==0){
                            Message("Successfully registered!", "success");
                            RegisterForm($showForm = false);
                        }
                        else if($signupResult['status']==211){
                            Message("Email already exists", "warning");
                            RegisterForm($showForm = true);
                        }
                    }
                    else{
                        Message("Please make sure your password and repeated password are identical.", "warning");
                        RegisterForm($showForm = true);
                    }
                } else {
                    Message("Oh no! Something went wrong while submitting the form", "warning");
                    RegisterForm($showForm = true);
                }
            } else {
                RegisterForm($showForm = true);
            }
        ?>

<?php
include("./inc/footer.php");
?>