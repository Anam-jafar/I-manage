<?php
include_once 'config/database_connect.php';
$email=$passcode='';
if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $passcode= $_POST['passcode'];
}
$query= "SELECT * FROM users WHERE email='$email' AND passcode='$passcode' ";
$results=$conn -> query($query);
if(mysqli_num_rows($results)>0){
  while($row = mysqli_fetch_assoc($results)){
    $mail= $row['email'];
    session_start();
    $_SESSION['email']=$mail;
    
  }
  header('Location: dashboard.php');
}
else echo "Invalid email or password";


?>


<!DOCTYPE html>
<html lang="en">
    <?php
include 'templates/header.php';
?>

   <div class="container">
  <br />

  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <header class="card-header">
        
          
          <h4 class="card-title mt-2">Login</h4>
        </header>
        <article class="card-body">
          <!-- index is the login page -->
          <form action="index.php" method="POST">
            
            <!-- form-row end.// -->
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email"
              class="form-control" placeholder="yourmail@gmail.com" />
            </div>
            

            <div class="form-group">
              <label>Your password</label>
              <input class="form-control" type="password" placeholder="*********"name="passcode" />
            </div>
            <!-- form-group end.// -->
            <div class="form-group">
              <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">
                Login
              </button>
            </div>
            <!-- form-group// -->
            
          </form>
        </article>
        <!-- card-body end .// -->
        <div class="border-top card-body text-center">
          Don't Have any account? <a href="register.php">Create Account</a> <br>
          <!-- Want to be a seller ? <a href="./seller-registration.html">Create service provider Account</a>
        </div> -->
      </div>
      <!-- card.// -->
    </div>
    <!-- col.//-->
  </div>
  <!-- row.//-->
</div>
<!--container end.//-->

</article>
<?php
include 'templates/footer.php';
?>


</html>