<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Registration Report</h1>
<table class="table">
<thead>
<tr>
<th>USERNAME</th>
<th>EMAIL</th>
<th>CONTACT</th>
<th>ADDRESS</th>
<th>PASSWORD</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$rs=mysqli_query($cn,"select * from registration");
while($a=mysqli_fetch_array($rs)) {
extract($a);
echo "<tr><td>$name</td><td>$email</td><td>$contact</td><td>$address</td><td>$password</td></tr>";
} ?>

</tbody>

</table>
<div class="text-center">
<button onclick="window.print()" class="btn btn-primary">Print</button>
</div>

<?php

include("footer.php"); 
?>