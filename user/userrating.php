<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SalonBook</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">HOME</a></li>
<li><a href="profile.php">PROFILE</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SERVICES
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="servicef.php?name=haircut">HAIRCUTS</a></li>
          <li><a href="servicef.php?name=shaving">SHAVING</a></li>
          <li><a href="servicef.php?name=massage">MASSAGE</a></li>
        </ul>
      </li>
      <li><a href="booking.php">BOOKING</a></li>
<li><a href="payment.php">PAYMENT</a></li>      
<li><a href="status.php">STATUS</a></li>
      
     <li><a href="userrating.php">GIVE REVIEWS</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<form id="ratingForm" method="POST">
<div class="form-group">
<h4>Rate this product</h4>
<button type="button" class="btn btn-default btn-sm rateButton" aria-label="Left Align" name="rt" onclick="changestar(0)">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(1)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(2)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(3)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align" onclick="changestar(4)"  name="rt">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<input type="hidden" class="form-control" id="rating" name="rating" value="0">
</div>
<div class="form-group">
<label for="usr">Title*</label>
<input type="text" class="form-control" id="title" name="title" required>
</div>
<div class="form-group">
<label for="comment">Comment*</label>
<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-info" id="saveReview" name=btnsub>Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
</div>
</form>
<script>
function changestar(i)
{
var rt=document.getElementsByClassName("rateButton");
var j;
for(j=0;j<=4;j++)
{
rt[j].className="btn btn-default btn-sm rateButton";
}
for(j=0;j<=i;j++)
{
rt[j].className="btn btn-warning btn-sm rateButton";
}

document.getElementById("rating").value=i+1;

}
</script>
<?php
session_start();
include("connect.php");
if(isset($_POST["btnsub"]))
{
  $u=$_SESSION['username'];
  $rate=$_POST["rating"];
  $title=$_POST["title"];
 $comment=$_POST["comment"];

$q="insert into userrating values('$u',$rate,'$title','$comment')";
mysqli_query($cn,$q);
mysqli_close($cn);
echo "<script>alert('Thank You for feedback');window.location='index.php'</script>";
}
?>
</div>
</div>
<div class="row">
<div class="col-sm-7">
<hr/>
<div class="review-block">
<?php
$ratinguery = "SELECT * FROM userrating";
$ratingResult = mysqli_query($cn, $ratinguery);
while($rating = mysqli_fetch_array($ratingResult)){
$user=$rating["username"];
$title=$rating["title"];
$cmt=$rating["comment"];
$rt=$rating["rating"];
?>
<div class="row">
<div class="col-sm-3">
<div class="review-block-name">By <a href="#"><?php echo $user; ?></a></div>

</div>
<div class="col-sm-9">
<div class="review-block-rate">
<?php
for ($i = 1; $i <= 5; $i++) {
$ratingClass = "btn-default btn-grey";
if($i <= $rating['rating']) {
$ratingClass = "btn-warning";
}
?>
<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
</button>
<?php } ?>
</div>
<div class="review-block-title"><?php echo $rating['title']; ?></div>
<div class="review-block-description"><?php echo $rating['comment']; ?></div>
</div>
</div>
<hr/>
<?php } ?>
</div>
</div>
</div>
</body>
</html>