<?php
//database connection
include_once 'config/database_connect.php';
//initializing the variables
$landlordid=$area=$floorNumber=$numberOfRooms=$rent=$preferance ='';
$errors = array(); 


if(isset($_POST['submit'])){
   $landlordid= $_POST['landlordid'];
   $area= $_POST['area'];
   $floorNumber= $_POST['floorNumber'];
   $numberOfRooms= $_POST['numberOfRooms'];
   $rent= $_POST['rent'];
   $preferance= $_POST['preferance'];
}

  if (empty($landlordid)) { array_push($errors, "email is required"); }
  if (empty($area)) { array_push($errors, "area is required"); }
  if (empty($floorNumber)) { array_push($errors, "FloorNumber is required"); }
  if (empty($numberOfRooms)) { array_push($errors, "numberOfRooms is required"); }
  if (empty($rent)) { array_push($errors, "rent is required"); }
  if (empty($preferance)) { array_push($errors, "preferance is required"); }

  if(count($errors)==0){
//update the user with landlord id
    $updateRegistration = "UPDATE users SET landlordid= '$landlordid' WHERE email='$landlordid' ";
    $conn->query( $updateRegistration);
    $insertValueForRenting ="INSERT INTO flats(landlordid, area, which_floor, number_of_rooms, rent, Preference)
 VALUES ('$landlordid', '$area', '$floorNumber', '$numberOfRooms', '$rent', '$preferance')";
 $conn->query($insertValueForRenting);
 header('Location: dashboard.php');
  }
  

?>
<!DOCTYPE html>
<html lang="en">
    <?php
include 'templates/dashboardheader.php';
?>

<section class="container grey-text">
  
<h5 class="center">Register for renting flat </h5>
        
<article class="card-body">
  <!-- Registration Form start -->
          <form action="register_for_landlord.php" method="POST">
            <div class="form-row">             
            <!-- landlord Email -->
            <div class="form-group col-md-6">
              <label>User Email</label>
              <input type="email" name="landlordid"class="form-control" placeholder="example@gmail.com" required/>
              </div>
               <div class="form-group col-md-6">
            <!-- Preferance -->
                <label>Preferance</label>
                <select id="status" name="preferance" class="form-control">
                  <option>Single</option>
                  <option selected="">Married</option>                  
                </select>
              </div>
            </div>
        
            
            <label> Description </label>
            <div class="form-row">
            <!-- form-group start -->              
            <div class="form-group col-md-6">             
            <!-- flat area -->
                <input type="text" class="form-control" placeholder="Area sqft" name="area" required/>
                </div>
                <div class="form-group col-md-6">
            <!-- flat rent -->
                <input type="text" class="form-control" placeholder="Rent" name="rent" required/>
                </div>
              </div>
            <div class="form-row">
            <!-- form-group start -->              
            <div class="form-group col-md-6">             
            <!-- which floor -->
                <input type="text" class="form-control" placeholder="Floor Number" name="floorNumber" required/>
                </div>
                <div class="form-group col-md-6">
            <!-- Number of rooms -->
                <input type="text" class="form-control" placeholder="Number Of Rooms" name="numberOfRooms" required/>
                </div>
              </div>
             
            <!-- form-group end./ / -->
            <div class="form-group">
              <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
                Submit
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