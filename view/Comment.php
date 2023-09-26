<?php 
// comment list in the dashboard 
function Comment($commentAssocArray){
                echo "<pre class='bg-light border'>";
                echo '<h4 class="text-info">'.$commentAssocArray['subject']."</h4>";
                echo '<h6 class="text-secondary">From: '.$commentAssocArray['first_name']." ".$commentAssocArray['last_name']."</h6>";
                echo '<p>'.$commentAssocArray['comment']."</p>";
                echo '<h6 class="text-secondary">'.$commentAssocArray['comment_date']."</h6>";
                echo "</pre>";
}
?>