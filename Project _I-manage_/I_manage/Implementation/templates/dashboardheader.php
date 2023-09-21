<?php
include'config/database_connect.php';
session_start();
$email= $_SESSION['email'];
?>
<head>
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

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
                <li><a href="profile.php" class="btn brand z-depth-0"><?php echo $email ?></a></li>
                <li><a href="index.php" class="btn brand z-depth-0">Log out</a></li>
            </ul>
        </div>
    </nav>

    
