
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal salon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
<style>
.navbar{font-family: "Lato", sans-serif}
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





