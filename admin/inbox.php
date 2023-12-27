<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">notification</h1>
<table class="table">
<thead>
<tr>
<th>NAME</th>
<th>EMAIL</th>
<th>CONTACT</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$rs=mysqli_query($cn,"select * from contact");
while($a=mysqli_fetch_array($rs)) {
extract($a);
echo "<tr><td>$name</td><td>$email</td><td>$message</td></tr>";
} ?>

</tbody>

</table>

<?php

include("footer.php"); 
?>