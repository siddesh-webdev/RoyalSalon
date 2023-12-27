 <?php
include("header.php");
$fl="haircut";
if(isset($_GET["name"]))
$fl=$_GET["name"];
?>
<h1 align=center>Our service's</h1>
<div class="row">
<div class="col-sm-offset-2">
<?php

include("connect.php");

$rs=mysqli_query($cn, "select * from service where typeofservicename='$fl'");
$i=0;
while($a=mysqli_fetch_array($rs)) 
{
$id=$a["typeofservicename"];

$fl=$a["typeofstyle"];

$pr=$a["typeofserviceprice"];
$im=$a["images"];
$id=$a["serviceid"];

echo "<div class='col-md-3'>"; 
echo "<div class=\"thumbnail\">";
echo "<a href=\"images/$im\" target=\"_blank\">";

echo" <img src=\"images/$im\" class=\"img-responsive\" width=100% height=80%>";

echo "<div class=\"caption\">";

echo"<b>$fl style<br>Price : $pr<br></div></b><a class=\"btn btn-primary\" href=book.php?serviceid=$id&typeofservicename=$id&typeofserviceprice=$pr&typeofstyle=$fl>Book Now</a></div></div>";

$i++;

if($i==3)
{
echo "</div>";

echo "</div><div class=\"row\"><div class=col-sm-offset-2>";

$i=0;
}
}

?>

</div>

<?php

include("footer.php");

?>