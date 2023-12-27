<?php
include("header.php");
?>
 <h1 align=center style="font-family:verdana;">Appointment Details</h1>
 <div class="col-sm-8 col-sm-offset-2"> 
 <form id=frmreg method="post" name="myForm">
<center>
<div class="input-group">

<p>Select your service </p>
<a href="servicef.php" class="btn btn-info" role="button">Service</a>

</div>
</center>
<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
 <input ng-model="address" id="srv" type="text" class="form-control" name="srv" placeholder="service" readonly>

</div>
<br>
<div class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span> 
 <input ng-model="address" id="sty" type="text" class="form-control" name="sty" placeholder="style" readonly>
</div>

<br>

<div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

<input ng-model="address" id="price" type="text" class="form-control" name="price" placeholder="Price" readonly>

</div>


<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
  </div>
  <div class="form-group">
    <label for="pn">Phone No:</label>
    <input type="contact" class="form-control" id="pn" name="pn" placeholder="Contact" required>
  </div>
 
  <div class="form-group">
    <label for="date">Date:</label>
    <input type="date" class="form-control" id="date" name="date" required>
  </div>
  <div class="form-group">
    <label for="time">Prefer time:</label>
    <input type="time" class="form-control" id="time" name="time" required>
  </div>
<div class="form-group">
    <label for="Certificate">Upload Vaccine Certificate:</label>
    <input type="file" class="form-control" id="file" name="file" required>
  </div>


<center>
<button type="submit" class="btn btn-primary" id="btnsub" name="btnsub">book appointment</button>

<button type="reset" class="btn btn-danger" id="btnres" name="btnres" >Reset</button>
</center>
</form>

</div>
<?php

if(isset($_POST['btnsub']))
{
include("footer.php");
echo"<script>alert('Please select the service first');window.location='bookf.php'</script>";
}
?>
 
