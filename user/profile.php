<?php
session_start();
include("header.php");
include("connect.php");
$u=$_SESSION["username"];
$rs=mysqli_query($cn,"select * from registration where name='$u'");
$n="";
$p="";
$c="";
$ad="";
$e="";
$sq="";
$sa="";
if($a=mysqli_fetch_array($rs))
{
extract($a);
}
?>
<h1 align=center>MY PROFILE</h1>
<div class="col-sm-8 col-sm-offset-2">
<form id=frmreg method="post" name="frmreg">
  <div class="form-group" >
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="nm" name="nm" placeholder="Name" required value="<?php echo $name;?>">
  </div>
	<div class="form-group">
    <label for="address">Address:</label>
    <textarea class="form-control" id="address" name="address" placeholder="Address" required value="">
<?php echo $address;?>
</textarea>
  </div>
 <div class="form-group">
    <label for="contact">Contact:</label>
    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required value="<?php echo $contact;?>">
  </div>

<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php echo $email;?>">
  </div>


  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required value="<?php echo $password;?>">
  </div>

    <div class="form-group">
    <label for="que">Question:</label>
    <select class="form-control" id="que" name="que" required>
    <option><?php echo $securityque;?></option>
 	<option value="What is your favorite color">What is your favorite color</option>
	<option value="What is your favorite fruit">What is your favorite fruit</option>
</select> 
</div>
<div class="form-group">
    <label for="ans">Answer:</label>
    <input type="text" class="form-control" id="ans" name="ans" placeholder="Answer" required value="<?php echo $securityans;?>">
  </div>

  
  
<center>
  <button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">Update Account</button>

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
$q="update registration set name='$nm',password='$pwd',contact='$contact',address='$address',email='$email',securityque='$que',securityans='$ans' where name='$nm'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Profile Updated Successfully');window.location='index.php'</script>";
}
?>

