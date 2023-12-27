<?php
session_start();
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: grey;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  width:40%;
  height:380px;
  border-radius:25px;
  margin-top:70px;
}

/* Full-width input fields */
/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}


</style>
</head>
<body>

<?php
include("connect.php");
 $UID=$_SESSION['username'];
$rs2=mysqli_query($cn, "select * from booking where customername='$UID'");
 if($a=mysqli_fetch_array($rs2))
 {
 $fl=$a["contact"];
 $im=$a["images"];
 $ty=$a["typeofservicename"];
 }
$rs=mysqli_query($cn, "select * from service where  ='$UID'");
if(isset($_GET["typeofservicename"]))
{
$price=$_GET["typeofserviceprice"];
}
?>
<div class="container">
  <h3>Payment Form</h3>

<form>
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="name" type="textbox" class="form-control" name="name" placeholder="Enter Your Full Name" required onvalid="this.setCustomValid('Please Enter Your Full Name')" oninput="this.setCustomValiodity(") value="<?php echo $unm; ?>" />
    </div>
<br>
<div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
      <input id="uid" type="textbox" class="form-control" name="uid" placeholder="Enter Your UID" required onvalid="this.setCustomValid('Please Enter Your UID')" oninput="this.setCustomValiodity(") pattern="[0-9]{9}" value="<?php echo $UID; ?>" />
    </div>
<br>
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-inr"></i></span>
      <input id="amt" type="textbox" class="form-control" name="amt" placeholder="Enter amount" required onvalid="this.setCustomValid('Please Enter Id')" oninput="this.setCustomValiodity(")  value="<?php echo $amt;?>" />
    </div>
<br>

<div class="input-group">
      
      <input id="tf" type="hidden" class="form-control" name="tf" placeholder="Enter amount" required onvalid="this.setCustomValid('Please Enter Id')" oninput="this.setCustomValiodity(")  value="<?php echo $price;?>" />
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
        var tf=jQuery('#tf').val();
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name+"&uid="+uid+"&tf="+tf,
               success:function(result){
                   var options = {
                        "key": "rzp_test_p4KZPExcgLZrZX", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Acme Corp",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
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
<?php
}
}


?>
</body>
</html>
 <?php
session_start();
include('db.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['uid'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $uid=$_POST['uid'];
    $tf=$_POST['tf'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    $remamt=$tf-$amt;
$_SESSION['remamt']=$remamt;
    mysqli_query($cn,"insert into payment(added_on,name,uid,installmentno,amount,remainingamt,payment_status) values('$added_on','$name',$uid,'1','$amt','$remamt','$payment_status')");
    $_SESSION['OID']=mysqli_insert_id($cn);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($cn,"update payment set payment_status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}