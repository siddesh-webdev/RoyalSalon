<!DOCTYPE html>
<html lang="en">
<head>
  <title>Royal Salon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
?>
<h1 align=center>Admin Login Here</h1>
<div class="col-sm-8 col-sm-offset-2">
<?php

if(isset($_POST['btnsub']))

{ 

$unm=$_POST['unm'];
$pass=$_POST['pass'];
include("connect.php");
$q="select * from adminlogin where username='$unm' and password='$pass'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$_SESSION['adminname']=$unm;
echo"<script>window.location='index1.php'</script>";
}
else
echo "<center><b><font color=red>Incorrect username or password</font></b></center>";
mysqli_close($cn);
}
?>
<form id=frmreg method="post" name="myForm">
<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

<input ng-model="unm" id="unm" type="text" class="form-control" name="unm" placeholder="UserName" required>

</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

<input ng-model="pass" id="pass" type="password" class="form-control" name="pass" placeholder="Password" required>

</div>

<br>

<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>

<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>

</div>

<?php

include("footer.php");

?>


