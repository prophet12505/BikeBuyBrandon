<?php
$title = "Bike Buy Brandon | Register";
include("./inc/header.php");
include('./inc/constants/dir.php');
include("./view/RegisterForm.php");
include("./view/Message.php");
include("./inc/dbconnect.php");
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!-- html section    -->
<section>
    <div class=" bg-light">
        <h2>Sign Up</h2>
        <?php
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
                //  check to see if the comments folder exists and create a folder if not
                //open a stream to the text file
                    $name = clean_input($_POST['name']);
                    $email = clean_input($_POST['email']);
                    $password = clean_input($_POST['password']);
                    $passwordRepeat = clean_input($_POST['passwordRepeat']);
                    $queryIfEmailExistSql="SELECT * FROM user WHERE email = '$email'";
                    $queryIfEmailExistResult=mysqli_query($dbc,$queryIfEmailExistSql);
                    //email doesn't exist
                    if(mysqli_num_rows($queryIfEmailExistResult) == 0) {
                        $insertUserSql="INSERT INTO user(name,email,password) VALUES ('$name','$email','$password')";
                        $insertUserSqlResult=mysqli_query($dbc,$insertUserSql);
                        Message("We have successfully created your account", "success");
                        RegisterForm($showForm = false);
                    } else {//email exists
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
    </div>
</section>
<?php
include("./inc/footer.php");
?>