<?php
include("header.php");
 ?>
<h1 align=center style="font-family:verdana;">Feedback Report</h1>
<table class="table">
<thead>
<tr>

<th>USERNAME</th>
<th>RATING</th>
<th>TITLE</th>
<th>COMMENTS</th>
</tr>
</thead>
<tbody>
<?php
include("connect.php");
$rs=mysqli_query($cn,"select * from userrating");
while($a=mysqli_fetch_array($rs)) {
extract($a);
echo "<tr><td>$username</td><td>$rating</td><td>$title</td><td>$comment</td></tr>";
} ?>

</tbody>

</table>
<div class="text-center">
<button onclick="window.print()" class="btn btn-primary">Print</button>
</div>

<?php

include("footer.php"); 
?>