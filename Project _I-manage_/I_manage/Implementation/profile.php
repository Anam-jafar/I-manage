<?php
// include the database
include 'config/database_connect.php';
session_start();
$email= $_SESSION['email'];

$userProfile="SELECT user_name, dob, gender, marital_status, email, city, subdistrict, contact, landlordid,houseKeeperid, cateringServiceid
FROM users 
WHERE email='$email'";
$result = $conn -> query($userProfile);
$row = $result -> fetch_assoc();
$landlordCheck= $row['email']===$row['landlordid'] ? '1' : '0';
$housekeeperidCheck= $row['email']===$row['houseKeeperid'] ? '1' : '0';
$cateringServiceidCheck= $row['email']===$row['cateringServiceid'] ? '1' : '0';
if(isset($_POST['submit'])){
if($landlordCheck==1){
    $deleteRow="DELETE FROM flats WHERE landlordid ='$email'";
    $run1= $conn -> query($deleteRow);
    $updateUser1= "UPDATE users SET landlordid=null WHERE email='$email'";
    $run2= $conn ->query($updateUser1);
}
if($housekeeperidCheck==1){
    $deleteRow="DELETE FROM housekeeper WHERE houseKeeperid ='$email'";
    $run1= $conn -> query($deleteRow);
    $updateUser1= "UPDATE users SET houseKeeperid=null WHERE email='$email'";
    $run2= $conn ->query($updateUser1);
}
if($cateringServiceidCheck==1){
    $delrow="DELETE FROM cateringmenu WHERE cateringServiceid= '$email' ";
    $deleteRow="DELETE FROM cateringservice WHERE cateringServiceid ='$email'";
    $run1= $conn -> query($deleteRow);
    $updateUser1= "UPDATE users SET cateringServiceid =null WHERE email='$email'";
    $run2= $conn ->query($updateUser1);
}

header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'templates/dashboardheader.php'
?>
<br>
<br>

<div class="form-group col-md-6">
<ul>
    <li> <h5 class="form-control"> Name : <?php echo $row['user_name'] ?></h5></li>
     <li> <h5 class="form-control"> Date of Birth : <?php echo $row['dob'] ?></h5></li>
      <li> <h5 class="form-control"> Gender : <?php echo $row['gender'] ?></h5></li>
       <li> <h5 class="form-control"> Marital Status :<?php echo $row['marital_status'] ?></h5></li>
        <li> <h5 class="form-control"> Email : <?php echo $row['email'] ?></h5></li>
         <li> <h5 class="form-control"> City : <?php echo $row['city'] ?></h5></li>
          <li> <h5 class="form-control">Subdistrict : <?php echo $row['subdistrict'] ?></h5></li>
          <li> <h5 class="form-control">Contact : <?php echo $row['contact'] ?></h5></li>
          <li> <h5 class="form-control">Service : <?php 
          if($landlordCheck==1) echo'Landlord';
          elseif($cateringServiceidCheck==1) echo 'Catering';
          elseif($housekeeperidCheck==1) echo 'Housekeeper';
           else echo'None'; 
          ?></h5></li>
</ul>
<form action="profile.php" method="POST">
    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
                Dismiss Service
              </button>
</form>
</div>
<br><br><br><br><br><br><br><br>
<?php
include 'templates/footer.php'
?>
    
</body>
</html>
