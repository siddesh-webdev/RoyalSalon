<?php
session_start();
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Booking Status</h1>
<table class="table">
<thead>
<tr>
<th>Name</th>
<th>Servicename</th>
<th>Style</th>
<th>Date</th>
<th>Time</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php
include("connect.php");
$u=$_SESSION["username"];
$rs=mysqli_query($cn,"select * from booking where customername='$u'");
 
while($a=mysqli_fetch_array($rs)) {

extract($a);
if($status=="decline"){
echo "<tr><td>$customername</td><td>$typeofservice</td><td>$style</td><td>$bookingdate</td><td>$time</td><td>Your appointment is $status</td><td><a class='btn btn-info' href=bookf.php>Postpone</a></td></tr>";
} 
else
echo "<tr><td>$customername</td><td>$typeofservice</td><td>$style</td><td>$bookingdate</td><td>$time</td><td>Your appointment is $status</td><td></td></tr>";
}
?>
</tbody>
</table>

<?php

include("footer.php"); 
?>