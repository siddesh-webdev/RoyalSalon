<?php
session_start();
include("connect.php");
include("header.php");
 $name=$_SESSION['username'];
$price=0;
?>
<head>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>

<body>



<div class="container">
  <h3>Payment Form</h3>

<form method="post">
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="name" type="textbox" class="form-control" name="name" placeholder="Enter Your Full Name" required onvalid="this.setCustomValid('Please Enter Your Full Name')" oninput="this.setCustomValiodity(") value="<?php echo $name; ?>" />
    </div>
<br>
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
      <input id="uid" type="textbox" class="form-control" name="uid" placeholder="Enter Your UID" required onvalid="this.setCustomValid('Please Enter Your UID')" oninput="this.setCustomValiodity(") pattern="[0-9]{10}" value="<?php echo $_POST['sty']; ?>" />
    </div>
<br>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
      <input id="amt" type="textbox" class="form-control" name="amt" placeholder="Enter amount" required onvalid="this.setCustomValid('Please Enter Id')" oninput="this.setCustomValiodity(")  value="<?php echo $_POST['price']; ?>"  />
    </div>
<br>

<br>
    

    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>

<!--
    <input type="textbox" name="name" id="name" placeholder="Enter your name"/><br/><br/>
    <input type="textbox" name="uid" id="uid" placeholder="Enter your uid"/><br/><br/>
    <input type="textbox" name="amt" id="amt" placeholder="Enter amt"/><br/><br/>
    <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
</form>
-->
<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var uid=jQuery('#uid').val();
        var amt=jQuery('#amt').val();
    
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name+"&uid="+uid,
               success:function(result){
                   var options = {
                        "key": "", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Royal Salon",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id+"&amt="+amt+"&name="+name+"&uid="+uid,
                               success:function(result){
                                   alert('payment successful');
                                   window.location.href="index.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
    }
</script>
</form>
</body>
</html>
