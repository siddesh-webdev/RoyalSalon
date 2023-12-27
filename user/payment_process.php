<?php
session_start();
include('db.php');
if(isset($_POST['amt']) && isset($_POST['name']) && isset($_POST['uid'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $uid=$_POST['uid'];
   echo "<script>alert('ok')</script>";
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
 
    mysqli_query($cn,"insert into trans(added_on,name,style,amount,pay_status) values('$added_on','$name','$uid',$amt,'$payment_status')");
    $_SESSION['OID']=mysqli_insert_id($cn);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($cn,"update trans set pay_status='complete',payment_id=$payment_id where id='".$_SESSION['OID']."'");
}
?>