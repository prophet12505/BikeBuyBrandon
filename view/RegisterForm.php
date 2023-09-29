<section>
    <div class=" bg-light">
        <h2>Sign Up</h2>
<?php
// form component for contact 
function RegisterForm($showForm = true)
{
    
    if ($showForm) {
        //include('./inc/registerForm.php');
        ?>
        
        <!-- registerForm html to be injected  -->
        <form name="formRegister" action="./register.php" class="form-group" method="post" novalidate>
            <p style="color: red;">All fields are required</p>
            <input type="text" name="name" id="name" placeholder="User Name" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["name"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <input type="email" name="email" id="email" placeholder="123@example.com" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["email"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <input type="password" name="password" id="password" placeholder="123abc321" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["password"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>
            <input type="password" name="passwordRepeat" id="passwordRepeat" placeholder="123abc321" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["passwordRepeat"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>
            <input type="submit" name="submit" class="btn btn-success" value="Register">
            <input type="reset" if="clear" class="btn btn-warning" value="clear">
        </form>
         <!-- finish injection  -->
        <?php
    }
}
?>
    </div>
</section>