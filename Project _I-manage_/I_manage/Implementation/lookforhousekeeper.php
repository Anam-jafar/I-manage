<?php
// include the database
include 'config/database_connect.php';
$city=$subdistrict ='';
if(isset($_POST['submit'])){
   $city= $_POST['city'];
   $subdistrict= $_POST['subdistrict'];
}
$searchForHome="SELECT us.user_name,  hk.experience_years , hk.working_days_in_a_week, hk.wage_weekly, us.contact
FROM users AS us
     JOIN
     housekeeper AS hk
     ON us.houseKeeperid=hk.houseKeeperid

WHERE us.city='$city' AND us.subdistrict='$subdistrict'";
$results = $conn -> query($searchForHome);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>imanage</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

    <link
  href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  rel="stylesheet"
  id="bootstrap-css"
/>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
/>
        <!-- From Meterialize  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style type="text/css">
            
            .brand-text{
                color:#63a088 !important;
            }
            form{
                max-width:750px ;
                margin: 20px auto;
                padding: 20px;
            }
    </style>

</head>
<body class="gray lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="dashboard.php" class="brand-logo brand-text">I-manage</a>
            
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                 <form action="lookforhousekeeper.php" method="POST">
            
            <li><input type="text" name="city"
              class="form-control" placeholder="City" />
              </li>
            <li><input type="text" name="subdistrict"
              class="form-control" placeholder="Subdistrict" />
              </li>
                <li><button button type="submit" value="submit" name="submit" class="btn btn-primary btn-block">search</button></li>
               
            </ul>
        </div>
    </nav>
<!-- Header end -->
    </form>

    <table>
  <tr>
    <th>House Keeper</th>
    <th>Weekly Wage</th>
    <th>Experience-years</th>
    <th>Work(days per week)</th>
    <th>Contact</th>
    
  </tr>
  
  


<?php foreach($results as $result ){?>


<tr>
    <td> <?php echo $result['user_name']?></td>
    <td><?php echo $result['wage_weekly']?></td>
    <td><?php echo $result['experience_years']?></td>
    <td><?php echo $result['working_days_in_a_week']?></td>
    <td><?php echo $result['contact']?></td>
  </tr>

<?php } ?>
        
   
    <!-- Search Nevigation ends -->
<!-- Footer -->
<?php 
// include 'templates/footer.php';
?>
<!-- Footer end -->

</html>