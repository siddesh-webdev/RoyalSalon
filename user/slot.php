<?php
session_start();
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Booking Status</h1>
<table class="table">
<thead>
<tr>
<th>slot number</th>
<th>date</th>
<th>status</th>
</tr>
</thead>

<tbody>

<?php
include("connect.php");
$u=$_SESSION["username"];
$rs=mysqli_query($cn,"select * from slot where customername='$u'");
 
while($a=mysqli_fetch_array($rs)) {

extract($a);

echo "<tr><td>$customername</td><td>$typeofservice</td><td>$style</td><td>$bookingdate</td><td>$time</td><td>Your appointment is $status</td><td><a class='btn btn-info' href=bookf.php>Postpone</a></td></tr>";

?>
</tbody>
</table>

<?php

include("footer.php"); 
?>