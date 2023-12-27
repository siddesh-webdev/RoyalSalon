<?php
$id=$_GET["serviceid"];
include("connect.php");
$q="delete from service where serviceid=$id";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Service deleted');window.location='manageservice.php';</script>";
?>