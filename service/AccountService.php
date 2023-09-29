<?php
class AccountService {
    private $dbc;

    public function __construct($dbc) {
        $this->dbc = $dbc;
    }
    //validate and handle error
    public function AuthLogin($email,$pass){
        $errors=array();
            //retrieve the user id
            $sql="SELECT `user_id`,`name`,`email` FROM user
            WHERE email='$email' AND password=SHA1('$pass')";
            $result=mysqli_query($this->dbc,$sql);
            //check the return
            if(mysqli_num_rows($result)==1)//have one result
            {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);//retrieve result as an array
    
                //return true and the record
                return array("status" => 0, "value" => $row);
                // return array(TRUE,$row);//return multiple results in an array form, success
            
            }
            else if(mysqli_num_rows($result)>=1){
                return array("status" => 201, "value" => Null);
            }
            else if(mysqli_num_rows($result)==0){
                return array("status" => 202, "value" => Null);
            }
        

            mysqli_close($this->dbc);

    }
    //move the register process here 
    public function Register(){
        
    }

    // ...
}



?>