<?php
include("header.php");
$pid=$_GET["serviceid"];
include("connect.php");
$q="select * from service where serviceid=$pid";
$rs=mysqli_query($cn,$q);
$nm="";
$ad="";
$i="";
$r="";
if($a=mysqli_fetch_array($rs))
{
$nm=$a['typeofservicename'];
$ad=$a['typeofstyle'];
$r=$a['typeofserviceprice'];
$i=$a['images'];

}
?>
<h1 align=center style="font-family:verdana">Update Service Details Here</h1>
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
<form id=frmreg method="post" name="myForm" enctype="multipart/form-data">
<input type=hidden name=txtpid value="<?php echo $pid; ?>">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span>
   <select name="service" class="form-control" oninvalid="this.setCustom Validity('Please select type')" oninput="this.setCustom Validity('')" required>
<option><?php echo $nm; ?></option>
<option value="haircut">haircut</option>
<option value="shaving">shaving</option>
<option value="massage">massage</option>
</select>
  </div>
<br>
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span>
   <input ng-model="style" name="style" class="form-control" oninvalid="this.setCustom Validity('Please enter style')" oninput="this.setCustom Validity('')" required value="<?php echo $ad; ?>">
  </div>
<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
<img src="images/<?php echo $i;?>" width=100 height=100><br>
    <input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select image" pattern="\D+" oninvalid="this.setCustom Validity('Please select image')" oninput="this.setCustom Validity('')" required>
  </div>
<br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
    <input ng-model="contact" id="price" type="text" class="form-control" name="price" placeholder="Price" oninvalid="this.setCustom Validity('Please enter price')" oninput="this.setCustom Validity('')" required value="<?php echo $r;?>">
  </div>
<br>
        <button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">Update</button>
        <button type="reset" class="btn btn-danger" id="btnres">Reset</button>
</form>
</div>
</div>
<div>
<h1>SERVICES</h1>
<table class=table>
<thead>
<tr>
<th>ServiceID</th><th>Servicename</th><th>style</th><th>Image</th><th>Price</th><th>Actions</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$q="select * from service";
$rs=mysqli_query($cn,$q);
while($a=mysqli_fetch_array($rs))
{
$ty=$a['serviceid'];
$nm=$a['typeofservicename'];
$i=$a['images'];
$pid=$a['typeofstyle'];
$r=$a['typeofserviceprice'];
echo "<tr>";
echo "<td>$ty</td><td>$nm</td><td>$pid</td><td><img src=../images/$i width=100 height=100></td><td>$r</td><td><a class='btn btn-danger' href=del.php?typeofstyle=$nm>Delete</a> <a class='btn btn-info' href=up.php?serviceid=$nm>Update</a>  
</td>";
echo "</tr>";
}
?>
</tbody>
</table>
</div>

<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
$cid=$_POST["txtpid"];
$fl=$_POST['style'];
$ty=$_POST['name'];
$pr=$_POST['price'];
//code for image uploading
$fn1=$_FILES['file1']['name'];
$s=$_FILES['file1']['size'];
$tnm=$_FILES['file1']['tmp_name'];
$ptr1=fopen($tnm,"r");
$ptr2=fopen("images/$fn1","w");
$data=fread($ptr1,$s);
fwrite($ptr2,$data);
fclose($ptr1);
fclose($ptr2);
//end of image uploading
include("connect.php");
$q="update service set typeofservicename='$ty',typeofstyle='$fl',typeofserviceprice='$pr',images='$fn1' where serviceid=$cid";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Service Updated Successfully');window.location='manageservice.php'</script>";
}
?>