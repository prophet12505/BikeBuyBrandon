<?php
$title = "Backup";
include("./header.php");
include('../view/Message.php');
if (isset($_POST['submit'])) {
    Message("Congratulations! Your comments have been backed up", "success");
    $source = "comments";
    $destination = "backup";
    //check if backup folder exists and make it if not
    if (!file_exists($source))
        mkdir($source);
    if (!file_exists($destination))
        mkdir($destination);
    //check if source foldr is a directory
    if (is_dir($source)) {

        //scan the directory
        $dirEntries = scandir($source);

        if ($dirEntries) {
            foreach ($dirEntries as $entry) {
                //see if the entry has the txt file
                if (strpos($entry, ".txt") == TRUE) {
                    copy("$source/" . $entry, "$destination/" . $entry);
                }
            }
        } else {
            Message("There are no comment files to be backed up", "info");
        }
        Message("The comment file(s) were successfully backed up!", "success");
        
    } else {
        Message("The comment file(s) could not be backed up", "warning");
    }
} 
else {
    Message("There is an error in this page! Try to go back and redo the operation.", "warning");
}

?>
<a class="btn btn-success" href="./dashboard.php">Back</a>
<?php
include('../inc/footer.php');
?>