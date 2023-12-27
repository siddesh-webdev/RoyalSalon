<?php
include("header.php");
?>
<h1 align=center style="font-family:verdana;">Sign Up</h1>
<div class="col-sm-8 col-sm-offset-2">
<form id=frmreg method="post" name="frmreg">
  <div class="form-group" >
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="nm" name="nm" placeholder="Name" required pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid Name')" oninput="this.setCustomValidity('')">
  </div>
	<div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control" id="address" name="address" placeholder="Address" required oninvalid="this.setCustomValidity('Please enter address')" oninput="this.setCustomValidity('')">
</textarea>
  </div>
 <div class="form-group">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required oninvalid="this.setCustomValidity('Please enter valid mobile no.')" oninput="this.setCustomValidity('')"pattern="\d{10}">
  </div>

<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Please enter valid email')" oninput="this.setCustomValidity('')">
  </div>


  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
  </div>

    <div class="form-group">
    <label for="que">Question:</label>
    <select class="form-control" id="que" name="que" required>
    <option>--Choose the Question--</option>
 	<option value="What is your favorite color">What is your favorite color</option>
	<option value="What is your favorite fruit">What is your favorite fruit</option>
</select> 
</div>
<div class="form-group">
    <label for="ans">Answer:</label>
    <input type="text" class="form-control" id="ans" name="ans" placeholder="Answer" required>
  </div>

  
  
<center>
  <button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">Create Account</button>

  <button type="reset" class="btn btn-danger" id="btnres" name="btnres">Reset</button>
</center>
<br>
</form>
</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
include("connect.php");
$q="insert into registration values('$nm','$pwd','$contact','$address','$email','$que','$ans')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Registration successful');window.location='login.php'</script>";
}
?>

