<?php
include("header.php");
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<center>
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images\zay.png" alt="Los Angeles" width=40% height=300px>
    </div>

    <div class="item">
      <img src="images\4.jpg" alt="Chicago"  width=40% height=300px>
    </div>

    <div class="item">
      <img src="images\1.png" alt="New York"  width=40% height=300px>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</center>
</div>
<hr size=10% color=black>
<h1 class="w3-wide" align=center>Welcome</h1>
<h4 align=center style="font-family:vardana"><i>who are we?</i></h4>
<div class="col-sm-8 col-sm-offset-2">
<p align=center>At Royalsalon we are a team of focused, passionate and engaging individuals who come together for a common goal of giving the best service to each customer who walks into our salon.</p>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="images\hairs.png">
        <img src="images\hairs.png" alt="Lights" style="width:100%">
        <div class="caption">
          <p>Haircuts...</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="images\cut.png">
        <img src="images\cut.png" alt="Nature" style="width:100%">
        <div class="caption">
          <p>Beard shave...</p>
        </div>
      </a>
    </div>
  </div>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="images\head.png">
        <img src="images\head.png" alt="Fjords" style="width:100%">
        <div class="caption">
          <p>Massage...</p>
        </div>
      </a>
    </div>
  </div>
</div>  
<?php
include("footer.php");
?>


