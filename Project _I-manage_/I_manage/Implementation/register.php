<?php
session_start();
//database connection
include_once 'config/database_connect.php';
//initializing the variables
$name=$email=$contact=$gender=$dob=$marital_status=$city=$subdistrict=$passcode='';
$errors = array();
if(isset($_POST['submit'])){
   $name= $_POST['name'];
   $email= $_POST['email'];
   $contact= $_POST['contact'];
   $gender= $_POST['gender'];
   $dob= $_POST['dob'];
   $marital_status= $_POST['marital_status'];
   $city = $_POST['city'];
   $subdistrict= $_POST['subdistrict'];
   $passcode = $_POST['passcode'];
}
 // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($contact)) { array_push($errors, "contact is required"); }
  if (empty($gender)) { array_push($errors, "gender is required"); }
  if (empty($dob)) { array_push($errors, "dob is required"); }
  if (empty($marital_status)) { array_push($errors, "marital Sataus is required"); }
  if (empty($city)) { array_push($errors, "city is required"); }
  if (empty($subdistrict)) { array_push($errors, "subdistrict is required"); }
  if (empty($passcode)) { array_push($errors, "passcode is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE user_name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['user_name'] === $name) {
      array_push($errors, "Username already exists");
    }
     if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


if(count($errors)== 0){
//insertion query
$sql = "INSERT INTO users(user_name, dob, gender, marital_status,email, city, subdistrict,contact,passcode)
VALUES('$name', '$dob','$gender', '$marital_status', '$email', '$city', '$subdistrict', '$contact','$passcode');";
$conn->query($sql);
$_SESSION['user_name'] = $name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php
include 'templates/header.php';
?>

<section class="container grey-text">
  
<h4 class="center">Sign up</h4>
        
<article class="card-body">
  <!-- Registration Form start -->
          <form action="register.php" method="POST">
            <div class="form-row">             
            <!--User Name  -->
              <label>Name</label>
                <input type="text" name="name" class="form-control" required />                        
            </div>
            <!-- User Email -->
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email"class="form-control" placeholder="example@gmail.com" required/>
              <!-- User Contact -->
              <label>Contact</label>
              <input type="text" name="contact" class="form-control" placeholder="+880" required/>
            </div>
            <!-- User Gender  -->
            <div class="form-group">
              <label>Gender: </label>

              <label class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gender"
                  value="male"
                />

                <span class="form-check-label"> Male </span>
              </label>
              <label class="form-check form-check-inline">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gender"
                  value="famale"
                />
                <span class="form-check-label"> Female</span>
              </label>
              
            </div>
            <!-- form-group start -->
            <div class="form-row">
              <div class="form-group col-md-6">
            <!-- User DOB -->
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control" />
              </div>             
              <div class="form-group col-md-6">
            <!-- User Marital status -->
                <label>Maretial Status</label>
                <select id="status" name="marital_status" class="form-control">
                  <option>Single</option>
                  <option selected="">Married</option>                  
                </select>
              </div>
            <!-- form-group end.// -->
            </div>
            <!-- Location -->
            <label>  Location</label>
            <div class="form-row">
            <!-- form-group start -->              
            <div class="form-group col-md-6">             
            <!-- city -->
                <input type="text" class="form-control" placeholder="City" name="city" required/>
                </div>
                <div class="form-group col-md-6">
            <!-- subdistrict -->
                <input type="text" class="form-control" placeholder="Subdistrict" name="subdistrict" required/>
                </div>
              </div>
            <!-- form-group end./ / -->
            </div>
            <!--form-row end.//-->
            <div class="form-group">
              <label>Create password</label>
              <!-- Password -->
              <input class="form-control" type="password" placeholder="********" name="passcode" required/>
            </div>
            <!-- form-group end.// -->
            <div class="form-group">
              <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
                Register
              </button>
            </div>
            <!-- form-group// -->
            <small class="form-text text-muted"
                >We'll never share your personal information with anyone else.</small>
          </form>
  <!-- Registration form ended -->
        </article>
</section>
<?php
include 'templates/footer.php';
?>
</body>
</html>