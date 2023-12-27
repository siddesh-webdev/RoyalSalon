<?php
include("header.php");
?>
<h1 align=center style="font-family:verdana;">Manage Services</h1>

<div class="row">
 <div class="col-sm-8 col-sm-offset-2"><br>

<form id=frmreg method="post" name="myForm" enctype="multipart/form-data" align=center>
<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-filter"></i></span>
<select name="service" class="form-control">

<option>--select service--</option>
<option value="haircut">haircut</option>
<option value="shaving">shaving</option>
<option value="massage">massage</option>
</select>

</div>

<br>

<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-filter "></i></span>
<input ng-model="text" id="style" type="text" class="form-control" name="style" placeholder="type of style" required>
</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
<input ng-model="address" id="address" type="file" class="form-control" name="file1" placeholder="Select image" required>

</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
<input ng-model="contact" id="price" type="text" class="form-control" name="price" placeholder="Price" pattern="\d+" required>
</div>

<br>

<button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">Submit</button>
<button type="reset" class="btn btn-danger" id="btnres">Reset</button>

</form>
</div>
</div>
<div class="row" align=center>
 <h2>Services</h2>

<table class=table>

<thead>

<tr>

<th>ACTIONS</th>

<th>NAME</th><th>STYLE</th><th>PRICE</ th><th>IMAGE</th>

</tr>

</thead>

<tbody> <?php

include("connect.php");
 $q="select * from service";

$rs= mysqli_query($cn,$q); 
while($a =mysqli_fetch_array($rs))
{

extract($a);
echo "<tr>";
echo "<td> <a class='btn btn-info' href=up.php?serviceid=$serviceid>Update</a><br><br><br><br><a class='btn btn-danger' href=del.php?serviceid=$serviceid>Delete</a> </td><td>$typeofservicename</td><td>$typeofstyle</td>
<td>$typeofserviceprice </td><td><img src='../images/$images' width=100

height=100></td>";

echo "</tr>";

} 
?>
</tbody>
 </table>
</div>
</div>

</div>
<?php

include("footer.php");
if(isset($_POST['btnsub']))
{
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

include("connect.php");

$q="insert into service(typeofservicename,typeofstyle,typeofserviceprice,images) values('$service','$style',$price,'$fn')";

mysqli_query($cn,$q);

mysqli_close($cn);

echo"<script>alert('service Added Successfully');window.location='manageservice.php'</script>";

}
?>
</div>
</div>  
<?php
include("footer.php");
?>



