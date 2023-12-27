<?php
include("header.php");
?>
<h1 align=center>BOOK APPOINTMENT</h1>
<center><p>make a appointment with our hairstylist</p></center>
<form action="" method="post" id="bform" name="bform">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="pn">Phone No:</label>
    <input type="number" class="form-control" id="pn" name="pn">
  </div>
  <div class="form-group">
    <label for="srv">Select type of service:</label>
    <select class="form-control" id="srv" name="srv">
    <option>--select service--</option>
    <option value=hairstyle>Haircut</option>
    <option value=shaving>Shaving</option>
    <option value=massage>Massage</option>
    <option value=h+s>Haircut+Shaving</option>
    <option value=h+m>Haircut+Massage</option>
    <option value=h+s+m>Haircut+Shaving+Massage</option>
     <option value=s+m>Shaving+Massage</option>  </select>
   </div>

    <div class="form-group">
    <label for="style">Enter style name :</label>
    <input type="text" class="form-control" id="style" name="style">
  </div>
  <div class="form-group">
    <label for="date">Date:</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <div class="form-group">
    <label for="time">Prefer time:</label>
    <input type="time" class="form-control" id="time" name="time">
  </div>
<div class="form-group">
    <label for="Certificate">Upload Vaccine Certificate:</label>
    <input type="file" class="form-control" id="file" name="file">
  </div>
    <div class="form-group">
    <label for="Extra">Extra Service:</label>
    <input type="file" class="form-control" id="ex" name="ex">
  </div>
    
  <center><button type="submit" class="btn btn-primary" name="btnsub" id="="btnsub"">Book Appointment</button></center>
</form>
<?php
include("footer.php");
if(isset($_POST['btnsub']))
{
extract($_POST);
include("connect.php");
$q="insert into booking values('$date','$name','$srv','$style','$pn','$time','$file','$bookingno','$status')";

mysqli_query($cn,$q);
mysqli_close($cn);
echo"<script>alert('Booking successful');window.location='header.php'</script>";
}
?>


