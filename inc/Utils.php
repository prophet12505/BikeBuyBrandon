<?php
   function clean_input($data)
   {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
   }
   function redirect_user($page="login.php",$delay=0){
        //use this to switch location

        header("Location: $page");
        
        exit();
    }

?>