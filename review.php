<?php
include("header.php");
?>
<div class="row">
<div class="col-sm-7">
<hr/>
<div class="review-block">
<?php
include("connect.php");
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
<?php
include("footer.php");
?>