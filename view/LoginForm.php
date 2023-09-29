<?php
    // form component for contact 
    function LoginForm($showForm=true){
        //
        if($showForm){
            ?>
            <!-- login Form html to be injected  -->
            <h2>Login</h2>
            <div class="modal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
      <form name="formRegister" action="./login.php" class="form-group" method="post" novalidate>
                <p style="color: red;">All fields are required</p>
                <!-- <input type="text" name="name" id="name" placeholder="User Name" autofocus required class="form-control <?php
                if (isset($_POST["submit"]) && empty($_POST["name"])) {
                    echo "bg-warning opacity-50";
                }
                ?>"><br> -->
    
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
                
                <input type="submit" name="submit" class="btn btn-success" value="Login">
                <input type="reset" if="clear" class="btn btn-warning" value="reset">
            </form>
     
           
            <!-- finish injection  -->
            <?php
        }
    }
?>