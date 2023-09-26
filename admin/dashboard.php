<?php
$title = "Dashboard";
include("./header.php");
include("../view/Comment.php");
?>
<div class="container-fluid">
        <h1 class="display-3 ">Dashboard</h1>
        <form action="./backup.php" method="post" >
                <button type="submit" name="submit" class="btn btn-success" >Backup</button>
        </form>
        <br>
        <?php 
        include('../inc/dbconnect.php');
        $readCommentSql='SELECT * FROM comment';
        $readCommentResult=mysqli_query($dbc,$readCommentSql);
        if($readCommentResult==false){
                Message('ERROR'. mysqli_error($dbc),'warning');
        }
        else{
                if(mysqli_num_rows($readCommentResult)>0)
                        {
                        while($row =mysqli_fetch_assoc($readCommentResult)){
                                Comment($row);
                        }
                        }
                        else{
                        Message('Sorry, they were no comments found','warning');
                        }
        }
        ?>
     
</div>
<?php
include("../inc/footer.php");
?>