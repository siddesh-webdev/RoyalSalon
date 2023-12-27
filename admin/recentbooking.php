<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Recent Orders</h1><br>
<table class="table" style="font-family:verdana;">
<thead>

<tr>

<th>Booking ID</th>
<th>Customername</th>

<th>Servicename</th>
<th>Style</th>
<th>Contact</th>
<th>Time</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php

include("connect.php");
$rs=mysqli_query($cn,"select * from booking where status<>'Approved' and status<>'Decline'");
 
while($a=mysqli_fetch_array($rs)) {

extract($a);

echo "<tr><td>$bookingno</td><td>$customername</td><td>$typeofservice</td><td>$style</td><td>$contact</td><td>$time</td><td><a class='btn btn-info' href=approve.php?bookingno=$bookingno>Accept</a><a class='btn btn-danger' href=decline.php?bookingno=$bookingno>Decline</a></td></tr>";

} ?>

</tbody>

</table>

<?php

include("footer.php"); 
?>