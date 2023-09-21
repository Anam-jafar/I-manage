<?php
//database connection
include_once 'config/database_connect.php';
//initializing the variables
$cateringServiceid=$cateringServiceName=$mealsperDay=$subscription='';
$errors = array(); 
if(isset($_POST['submit'])){
   $cateringServiceid= $_POST['cateringServiceid'];
   $cateringServiceName= $_POST['cateringServiceName'];
   $mealsperDay	= $_POST['mealsperday'];
   $subscription= $_POST['subscription'];
}

  if (empty($cateringServiceid)) { array_push($errors, "Email is required"); }
  if (empty($cateringServiceName)) { array_push($errors, "Catering service name is required"); }
  if (empty($mealsperDay)) { array_push($errors, "Meal per day  is required"); }
  if (empty($subscription)) { array_push($errors, "subscription  is required"); }
    if(count($errors)==0){
//update the user with landlord id
    $updateRegistration = "UPDATE users
SET cateringServiceid='$cateringServiceid'
WHERE email='$cateringServiceid'";
    $conn->query( $updateRegistration);
     // insert for house keeper
   $insertValueForCateringService= "INSERT INTO cateringservice(cateringServiceid, cateringServiceName)
VALUES('$cateringServiceid',   '$cateringServiceName')";
   $conn->query($insertValueForCateringService );
   $insertValueForCateringMenu= "INSERT INTO cateringmenu(cateringServiceid, menuid, number_of_meals_a_day, subscription_fee_monthly)
VALUES ('$cateringServiceid', NULL, $mealsperDay, $subscription)";
   $conn->query($insertValueForCateringMenu );
   header('Location: dashboard.php');
    }
    
    


?>
<!DOCTYPE html>
<html lang="en">
    <?php
include 'templates/dashboardheader.php';
?>

<section class="container grey-text">
  
<h5 class="center">Register for providing a catering service </h5>
        
<article class="card-body">
  <!-- Registration Form start -->
          <form action="register_for_cateringService.php" method="POST">
            <div class="form-row">             
            <!-- houseKeeperid Email -->
            <div class="form-group col-md-6">
              <label>User Email</label>
              <input type="email" name="cateringServiceid"class="form-control" placeholder="example@gmail.com" required/>
              </div>
               <div class="form-group col-md-6">
            <!-- experience_years -->
                <label>Catering Service</label>
              <input type="text" name="cateringServiceName"class="form-control" placeholder="Name" required/>
              </div>
            </div>
        
            
            <label> Description </label>
            <div class="form-row">
            <!-- form-group start -->              
            <div class="form-group col-md-6">             
            <!-- flat area -->
                <input type="text" class="form-control" placeholder="Number of meals" name="mealsperday" required/>
                </div>
                <div class="form-group col-md-6">
            <!-- flat rent -->
                <input type="text" class="form-control" placeholder="Subscription" name="subscription" required/>
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