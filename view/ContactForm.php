<?php
// form component for contact 
function ContactForm($showForm = true)
{
    if ($showForm) {
        //include('./inc/contactForm.php');
        //contact Form HTML to be injected
        ?>
        <!-- HTML injection   -->
        <form name="formContact" action="./contact.php" class="form-group" method="post" novalidate>
            <p style="color: red;">All fields are required</p>
            <input type="text" name="fname" id="fname" value="<?php
            if (isset($_POST["submit"]) && !empty($_POST["fname"])) {
                echo $_POST["fname"];
            }
            ?>" placeholder="First Name" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["fname"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <input type="text" name="lname" id="lname" value="<?php
            if (isset($_POST["submit"]) && !empty($_POST["lname"])) {
                echo $_POST["lname"];
            }
            ?>" placeholder="Last Name" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["lname"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <input type="email" name="email" id="email" value="<?php
            if (isset($_POST["submit"]) && !empty($_POST["email"])) {
                echo $_POST["email"];
            }
            ?>" placeholder="Email" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["email"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <input type="text" name="subject" id="subject" value="<?php
            if (isset($_POST["submit"]) && !empty($_POST["subject"])) {
                echo $_POST["subject"];
            }
            ?>" placeholder="Subject" autofocus required class="form-control <?php
            if (isset($_POST["submit"]) && empty($_POST["subject"])) {
                echo "bg-warning opacity-50";
            }
            ?>"><br>

            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Comment..." class="form-control <?php
            if (isset($_POST['submit']) && empty($_POST['comment'])) {
                echo 'bg-warning opacity-50';
            }
            ?>"
                required><?php if (isset($_POST['submit']) && !empty($_POST['comment'])) {
                    echo (ltrim($_POST['comment']));
                } ?></textarea><br>
            <input type="submit" name="submit" class="btn btn-success" value="Contact US">
            <input type="reset" if="clear" class="btn btn-warning" value="clear">
        </form>
        <!-- finish injection    -->
        <?php
    }
}
?>