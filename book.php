<?php
$apikey="";
session_start();
include("header.php");
$id=0;
$price=0;
$fl="";
$im="";
$status="";
$unm=$_SESSION["username"];

if(isset($_GET["typeofservicename"]))
{
$id=$_GET["serviceid"];
$price=$_GET["typeofserviceprice"];
//$im=$_GET["images"];
}

include("connect.php");
 $rs=mysqli_query($cn,"select * from service where serviceid=$id");
 if($a=mysqli_fetch_array($rs))
 {
 $fl=$a["typeofstyle"];
 $im=$a["images"];
 $ty=$a["typeofservicename"];
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


</head>
<body>

 <h1 align="center">Appointment Details</h1>
 <div class="col-sm-8 col-sm-offset-2"> 
 <form action="paymentindex.php" id=frmreg method="post" name="myForm" enctype="multipart/form-data">
<div class="input-group">
<?php
echo "<center><img src=\"../images/$im\" width=200 height=200></center></div>";
?>
<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
 <input ng-model="address" id="srv" type="text" class="form-control" name="srv" placeholder="service" value="<?php echo $ty; ?>" required readonly>

</div>
<br>
<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span> 
 <input ng-model="address" id="sty" type="text" class="form-control" name="sty" placeholder="style" value="<?php echo $fl; ?>" required readonly>
</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

<input ng-model="address" id="price" type="text" class="form-control" name="price" placeholder="Price" value="<?php echo $price; ?>" required readonly>

</div>


<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $unm ?>"required readonly>
  </div>
  <div class="form-group">
    <label for="pn">Phone No:</label>
    <input type="contact" class="form-control" id="pn" name="pn"  placeholder="Contact" required oninvalid="this.setCustomValidity('Please enter valid mobile no.')" oninput="this.setCustomValidity('')"pattern="\d{10}">
  </div>
 
  <div class="form-group">
    <label for="date">Date:</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div>
  <div class="form-group">
    <label for="time">Prefer slot:</label>
    <input type="time" class="form-control" id="time" name="time" required>
     
  </div>
 

<div class="form-group">
    <label for="Certificate">Upload Vaccine Certificate:</label>
    <input type="file" class="form-control" id="file" name="file1" required>
  </div>


<br>

<button type="submit" class="btn btn-primary" id="btnsub" name="btnsub" value="pay with razorpay" onclick="pay_now()">book appointment</button>

<button type="reset" class="btn btn-danger" id="btnres" name="btnres" >Reset</button>


</form>

</div>


</body>
<?php

include("footer.php");
if(isset($_POST['btnsub'])) {
extract($_POST);
$fn=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];

$ptr1=fopen($tnm,"r");
$ptr2=fopen("../images/$fn","w");

$data=fread($ptr1,$s);
fwrite($ptr2,$data);

fclose($ptr1);

fclose($ptr2);

$unm=$_SESSION['username'];
include("connect.php");
$q="insert into booking(bookingdate,customername,typeofservice,style,contact,time,file,status) values('$date','$name','$srv','$sty','$pn','$time','$fn','$status')";
mysqli_query($cn,$q); 
mysqli_close($cn);
echo"<script>alert('booking successful');window.location='paymentindex.php?typeofserviceprice=$price'</script>";
 
}

?>
