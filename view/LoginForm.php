<?php
// form component for contact 
function LoginForm($showForm = true)
{
  //
  if ($showForm) {
    ?>
    <div class="login-container ">
      <div class="container pt-5 ">
        <div class="login-panel row d-flex justify-content-center align-items-center border border-info rounded ">
          <div class="col-md-6 py-5 ">
            <form name="formRegister" action="./login.php" class="form-group" method="post" novalidate>
              <h1 class="h1 text-center">Login </h1>
              
              <!-- <input type="text" name="name" id="name" placeholder="User Name" autofocus required class="form-control <?php
              if (isset($_POST["submit"]) && empty($_POST["name"])) {
                echo "bg-warning opacity-50";
              }
              ?>"><br> -->
              <label for="email">Email address</label>
              <input type="email" name="email" id="email" placeholder="123@example.com" autofocus required class="form-control <?php
              if (isset($_POST["submit"]) && empty($_POST["email"])) {
                echo "bg-warning opacity-50";
              }
              ?>"><br>
              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder="123abc321" autofocus required class="form-control <?php
              if (isset($_POST["submit"]) && empty($_POST["password"])) {
                echo "bg-warning opacity-50";
              }
              ?>"><br>

              <input type="submit" name="submit" class="btn btn-dark col-md-12" value="Login">
              <input type="reset" if="clear" class="mt-2 btn btn-warning col-md-12" value="Reset">
              <p class="h6 mt-2">Forget about password? Click <span class="text-danger" onclick="alert(
                'Don\'t forget to change your password. Just don\'t. I haven\'t completed this part yet.'
                )"
                >here</span></p>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- finish injection  -->
    <?php
  }
}
?>