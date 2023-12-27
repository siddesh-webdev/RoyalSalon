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
$im=$a["images"];

$fl=$a["typeofstyle"];

$pr=$a["typeofserviceprice"];

echo "<center><div class='col-md-3'>"; 
echo "<div class=\"thumbnail\">";
echo "<a href=\"images/$im\" target=\"_blank\">";

echo" <img src=\"images/$im\" class=\"img-responsive\" width=100% height=80%>";

echo "<div class=\"caption\">";

echo"<b>  $fl Style<br>  Price : $pr<br><a class='btn btn-info' href=login.php>Book now</a></b></div></a></div></div>";

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
</center>

<?php

include("footer.php");

?>