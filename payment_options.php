<!DOCTYPE html>
<html>
	<head>
		<title>Payment Options</title>
		
	</head>
<body>
	<?php
	include("includes/db.php");

	
	
	?>

<div align="center" style="padding: 20px;">
	<h2>Payment Options for you</h2>
	
	
	<?php
	$ip =getRealIpAddr();
	
	$get_customer="select * from customers where customer_ip='$ip'";
	
	$run_customer =mysqli_query($con,$get_customer);
	
	$customer =mysqli_fetch_array($run_customer);
	
	$customer_id =$customer['customer_id'];
	
	?>

	<br><b ><br>Pay with</b><a href="../PaytmKit/TxnTest.php"><img src="images/pytm.png" width="500" height="100"></a><b>or <a href="order.php?c_id=<?php echo $customer_id;  ?>">Pay Offline</a></b><br><br><br>

	<b> If you selected "Pay Offline " option then please check your email or account to find the Invoice No for your order </b>




</div>