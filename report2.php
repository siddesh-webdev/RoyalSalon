<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Services Report</h1>
<table class="table">
<thead>
<tr>
<th>No</th>
<th>SERVICE</th>
<th>STYLE</th>
<th>PRICE</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$rs=mysqli_query($cn,"select * from service");
while($a=mysqli_fetch_array($rs)) {
extract($a);
echo "<tr><td>$serviceid</td><td>$typeofservicename</td><td>$typeofstyle</td><td>$typeofserviceprice</td></tr>";
} ?>

</tbody>

</table>
<div class="text-center">
<button onclick="window.print()" class="btn btn-primary">Print</button>
</div>

<?php

include("footer.php"); 
?>