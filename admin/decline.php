<?php
$id=$_GET["bookingno"];
include("connect.php");
$decline="decline";
$q="update booking set status='$decline' where bookingno='$id'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Appointment Decline');window.location='recentbooking.php';</script>";
?>