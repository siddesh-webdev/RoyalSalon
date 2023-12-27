<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Appointment Report</h1>
<table class="table">
<thead>
<tr>
<th>No</th>
<th>USERNAME</th>
<th>CONTACT</th>
<th>SERVICE</th>
<th>STYLE</th>
<th>DATE</th>
<th>TIME</th>
<th>STATUS</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$rs=mysqli_query($cn,"select * from booking");
while($a=mysqli_fetch_array($rs)) {
extract($a);
echo "<tr><td>$bookingno</td><td>$customername</td><td>$contact</td><td>$typeofservice</td><td>$style</td><td>$bookingdate</td><td>$time</td><td>$status</td></tr>";
} ?>

</tbody>

</table>
<div class="text-center">
<button onclick="window.print()" class="btn btn-primary">Print</button>
</div>

<?php

include("footer.php"); 
?>