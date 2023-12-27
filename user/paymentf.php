
 <?php
 session_start();
 include("header.php"); 
  $price=0;

if(isset($_GET["typeofserviceprice"]))
{
 $price=$_GET["typeofserviceprice"];
}
 include("connect.php");

?>

<h1 align=center>Payment Details</h1>

<div class="col-sm-8 col-sm-offset-2">

<form id=frmreg method="post" name="myForm">
<center>
<div class="input-group">

<p>Please select your service first! </p>
<a href="servicef.php" class="btn btn-info" role="button">Service</a>

</div>
</center>
<br>


<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
 <input ng-model="address" id="Flavour" type="text" class="form-control" name="price" placeholder="price" value="<?php echo $price; ?>" required readonly>
</div>
<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>

<select id=wt name=mode class="form control">

<option>--select payment mode--</option>

<option value="COD">Cash on Delivery</option> 
<option value="Credit Card">Credit Card</option>
<option value="Debit Card">Debit card</option>

</select>

</div>

<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
 <input id="num" type="text" class="form control" name="num" placeholder="0" value="0" required>

</div>

<br>

<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</ button>

<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>
</div>

<?php

include("footer.php");

if(isset($_POST['btnsub']))
{
 $unm=$_SESSION['username']; 
$wt=$_POST['mode'];
$am=$_POST['price'];
$add=$_POST['num'];
include("connect.php");
$dt=date("d-m-Y");
$q="insert into payment(odt,username,mode,price,cardnumber) values('$dt','$unm','$wt','$price','$add')"; 
mysqli_query($cn,$q);
mysqli_close($cn); 
echo"<script>alert('Thanks for your');</script>"; 
}

?>

