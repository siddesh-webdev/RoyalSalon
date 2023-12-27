<?php
session_start();
include("header.php");
?>

<h1 align=center>Recover Password</h1>

<div class="col-sm-8 col-sm-offset-2">
<form id=frmreg method="post" name="myForm">

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

<input ng-model="unm" id="unm" type="text" class="form-control" name="unm" placeholder="UserName" required>

</div>

<br>

<center>

<button type="submit" class="btn btn-primary" id="btnsub" name=btnsub>Submit</button>

<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</center>
</form>

<?php

if(isset($_POST['btnsub']))

{ 

$unm=$_POST['unm'];

include("connect.php");
$q="select * from registration where name='$unm'";
$result=mysqli_query($cn,$q);
if($a=mysqli_fetch_array($result))
{
$sq=$a["securityque"];
?> 
<form method=post>

<input type=hidden name=txtun class=form-control value="<?php echo $unm; ?>"><br>

<input type=text name=que  class=form-control value="<?php echo $sq; ?>"readonly><br>

<input type=text name=ans class=form-control value=""><br>

<input type=submit name=btns value="Submit">

</form>

<?php

}
mysqli_close($cn);
}
 ?>
<?php

if(isset($_POST["btns"]))

{
$un=$_POST["txtun"];

$sq=$_POST["que"];

$an=$_POST["ans"]; 
include("connect.php");
$q="select * from registration where name='$un' and securityque='$sq' and securityans='$an'";

$result=mysqli_query($cn,$q);

if($a=mysqli_fetch_array($result))
{

$securityans=$a["password"];

echo "<h2><font color=green><b>Your password is $securityans</b></font></h2>";
}
}
?>
</div>

<?php

include("footer.php");

?>
  
  
  


