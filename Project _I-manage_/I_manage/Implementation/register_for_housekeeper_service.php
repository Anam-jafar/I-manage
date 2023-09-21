<?php
//database connection
include_once 'config/database_connect.php';
//initializing the variables
$houseKeeperid=$experience_years=$working_days_in_a_week=$wage_weekly='';
$errors = array(); 
if(isset($_POST['submit'])){
   $houseKeeperid= $_POST['houseKeeperid'];
   $experience_years= $_POST['experience_years'];
   $working_days_in_a_week	= $_POST['working_days_in_a_week'];
   $wage_weekly= $_POST['wage_weekly'];
}
  if (empty($houseKeeperid)) { array_push($errors, "Email is required"); }
  if (empty($experience_years)) { array_push($errors, "experience_year is required"); }
  if (empty($working_days_in_a_week)) { array_push($errors, "Working days in a week  is required"); }
  if (empty($wage_weekly)) { array_push($errors, "wage_weekly  is required"); }
    if(count($errors)==0){
//update the user with landlord id
    $updateRegistration = "UPDATE users SET houseKeeperid= '$houseKeeperid' WHERE email='$houseKeeperid' ";
    $conn->query( $updateRegistration);
     // insert for house keeper
   $insertValueForHouseKeeping =$sql = "INSERT INTO housekeeper (houseKeeperid, experience_years, working_days_in_a_week, wage_weekly) VALUES ('$houseKeeperid', '$experience_years', '$working_days_in_a_week', '$wage_weekly') ";
   $conn->query($insertValueForHouseKeeping );
   header('Location: dashboard.php');
    }
    
    


?>
<!DOCTYPE html>
<html lang="en">
    <?php
include 'templates/dashboardheader.php';
?>

<section class="container grey-text">
  
<h5 class="center">Register as a housekeeper </h5>
        
<article class="card-body">
  <!-- Registration Form start -->
          <form action="register_for_housekeeper_service.php" method="POST">
            <div class="form-row">             
            <!-- houseKeeperid Email -->
            <div class="form-group col-md-6">
              <label>User Email</label>
              <input type="email" name="houseKeeperid"class="form-control" placeholder="example@gmail.com" required/>
              </div>
               <div class="form-group col-md-6">
            <!-- experience_years -->
                <label>Expericence-(years)</label>
                <select id="status" name="experience_years" class="form-control">
                  <option selected="">No experice</option>
                  <option >1</option> 
                  <option>2</option>                 
                </select>
              </div>
            </div>
        
            
            <label> Description </label>
            <div class="form-row">
            <!-- form-group start -->              
            <div class="form-group col-md-6">             
            <!-- flat area -->
                <input type="text" class="form-control" placeholder="Working days in a week" name="working_days_in_a_week" required/>
                </div>
                <div class="form-group col-md-6">
            <!-- flat rent -->
                <input type="text" class="form-control" placeholder="wage weekly" name="wage_weekly" required/>
                </div>
              </div>
             
            <!-- form-group end./ / -->
            <div class="form-group">
              <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
                submit
              </button>
            </div>
            <!-- form-group// -->            
          </form>
  <!-- Registration form ended -->
        </article>
</section>
<?php
include 'templates/footer.php';
?>
</body>
</html>