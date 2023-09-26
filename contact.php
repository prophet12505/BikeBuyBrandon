<?php
$title = "Bike Buy Brandon | Contact Us";
include("./inc/header.php");
include('./inc/constants/dir.php');
include("./view/ContactForm.php");
include("./view/Message.php");

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function writeAComment($firstName,$lastName, $email, $subject , $comment)
{
    include("./inc/dbconnect.php");
    $writeACommentSql="INSERT INTO comment(first_name,last_name,email,subject,comment) VALUES ('$firstName','$lastName', '$email', '$subject' , '$comment')";
    $writeACommentResult=mysqli_query($dbc,$writeACommentSql);
    if ($writeACommentResult === false) {
        // handle the error, for example:
        Message("Error: " . mysqli_error($dbc),'warning');
    } else {
        // the query was executed successfully
        Message("Comment submitted successfully!",'success');
    }
}
?>
<!-- html section    -->
<section>
    <div class=" bg-light">
        <h2>Contact Us</h2>
        <?php
        if (isset($_POST['submit'])) {
            ContactForm($showForm = false);
            if (
                !empty($_POST['fname'])
                && !empty($_POST['lname'])
                && !empty($_POST['email'])
                && !empty($_POST['subject'])
            ) {
                
                //  check to see if the comments folder exists and create a folder if not
                //open a stream to the text file
                $firstName = clean_input($_POST['fname']);
                $lastName = clean_input($_POST['lname']);
                $subject = clean_input($_POST['subject']);
                $email = clean_input($_POST['email']);
                $comment = clean_input($_POST['comment']);
                $fullName = $firstName . " " . $lastName;
                $timeStamp = time();
                writeAComment($firstName,$lastName, $email, $subject , $comment);
                Message("Thank you, you have successfully registered our newsletter!", "success");
            } else {
                Message("Oh no! Something went wrong while submitting the form", "warning");
                ContactForm($showForm = true);
            }
        } else {
            ContactForm($showForm = true);
        }
        ?>
    </div>
</section>
<?php
include("./inc/footer.php");
?>