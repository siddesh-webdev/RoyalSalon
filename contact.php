<!DOCTYPE html>
<html lang="en">
<head>
<title>Royalsalon</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<style>
body {font-family: "Lato", sans-serif}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">RoyalSalon</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">HOME</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SERVICES
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="servicef.php?name=haircut">HAIRCUTS</a></li>
          <li><a href="servicef.php?name=shaving">SHAVING</a></li>
          <li><a href="servicef.php?name=massage">MASSAGE</a></li>
        </ul>
      </li>
     

      <li><a href="contact.php">CONTACT US</a></li>
      <li><a href="review.php">REVIEWS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>

<!-- The Contact Section -->
  <div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
    <h2 class="w3-wide w3-center">CONTACT</h2>
    <p class="w3-opacity w3-center"><i>Questions? Drop a note!</i></p>
    <div class="w3-row w3-padding-32">
      <div class="w3-col m6 w3-large w3-margin-bottom">
        <i class="fa fa-map-marker" style="width:30px"></i> Sadar Bazar, Satara<br>
        <i class="fa fa-phone" style="width:30px"></i> Phone: +9146809186<br>
        <i class="fa fa-envelope" style="width:30px"> </i> Email: royalsalon@gmail.com<br>
      </div>
      <div class="w3-col m6">
        <form method="post" id="frmc" name="frmc">
          <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" id="nm" name="nm" placeholder="Name" required name="Name" pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid Name')" oninput="this.setCustomValidity('')">
            </div>
            <div class="w3-half">
              <input class="w3-input w3-border" type="text" id="em" name="em" placeholder="Email" required name="Email" oninvalid="this.setCustomValidity('Please enter valid email')" oninput="this.setCustomValidity('')">
            </div>
          </div>
          <input class="w3-input w3-border" type="text" id="msg" name="msg" placeholder="Message" required name="Message">
          <button class="w3-button w3-black w3-section w3-right" id="btnsub" type="submit" name="btnsub">SEND</button>
        </form>
      </div>
    </div>
  
<?php

if(isset($_POST['btnsub']))
{
include("footer.php");
extract($_POST);
include("connect.php");
$q="insert into contact(name,email,message) values('$nm','$em','$msg')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('message send successful');window.location='contact.php'</script>";
}
?>
 



