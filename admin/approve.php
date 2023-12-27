<?php
$id=$_GET['bookingno'];
include("connect.php");
$approve="Approved";
$q="update booking set status='$approve' where bookingno='$id'";
mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Appointment Approved of $id');window.location='recentbooking.php'</script>";
?>