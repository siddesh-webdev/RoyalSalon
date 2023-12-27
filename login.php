<?php
session_start();
include("header.php");
?>

<h1 align=center style="font-family:verdana;">Login Here</h1>

<div class="col-sm-8 col-sm-offset-2">

<?php

if(isset($_POST['btnsub']))

{ 

$unm=$_POST['unm'];

$pass=$_POST['pass'];
include("connect.php");
$q="select * from registration where name='$unm' and  password='$pass'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$_SESSION['username'] = $unm;
 echo "<script>window.location='user/index.php'</script>";
 }

else

echo "<center><b><font color=red>Incorrect username or password</font></b></center>";
mysqli_close($cn);

} ?>

<form id=frmreg method="post" name="myForm">

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

<input ng-model="unm" id="unm" type="text" class="form-control" name="unm" placeholder="UserName" required pattern="\D+" oninvalid="this.setCustomValidity('Please enter valid Username')" oninput="this.setCustomValidity('')">

</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

<input ng-model="pass" id="pass" type="password" class="form-control" name="pass" placeholder="Password" required>

</div>
 <div class="row">
 <div class="col-sm-3">
     
      <label><input type="checkbox" name="remember" style="font-family:verdana;"> Remember me</label>
    </div>

<div class="col-sm-3 col-sm-offset-6">
<a href=forget.php>Forget Password?</a>
</div>
</div>


<center>

<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>

<button type="reset" class="btn btn-danger" id="btnres">Reset</button>
<br>
<br>
<p>Dont have account...?</p>
<a href=signup.php style="font-family:verdana;"><i class="fa fa-user-plus" aria-hidden="true"></i>Sign up</a>

</center>



</form>

</div>

<?php

include("footer.php");

?>
  
  
  


