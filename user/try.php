<?php
$apikey="rzp_test_p4KZPExcgLZrZX";
session_start();
include("header.php");
$unm=$_SESSION["username"];
$price=0;
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<form action="" method="POST">

<script 
src="https://checkout.razorpay.com/v1/checkout.js"
data-key="<?php echo $apikey;?>" // Enter the Test API Key ID generated from Dashboard Settings + API Keys
 data-amount="<?php echo $_POST['price']*100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or 299.35
 data-currency="INR"//You can accept international payments by changing the currency code. Contact ou
 data-id="order_CgmcjRh9tiz1P7"//Replace with the order id generated by you in the backend. 
data-buttontext="Pay with Razorpay"

data-name="Royal Salon"

data-description="<?php echo $_POST['sty'];?>"

data-image="https://example.com/your_logo.jpg"

data-prefill.name="<?php echo $_POST['name'];?>"
data-prefill.email=""
data-prefill.contact="<?php echo $_POST['pn'];?>"
data-prefill.color="#F37254"

></script>
<input type="hidden" custom="hidden element" name="hidden">
</form>
<style type="text/javascript">
$(document).ready(function(){

$('.razorpay-payment-button').click();

});
</style>