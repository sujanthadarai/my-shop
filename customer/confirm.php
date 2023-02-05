<?php
session_start();
include("includes/db.php");
 if(isset($_GET['order_id'])){
	 
	 $order_id =$_GET['order_id'];
	 	 
	
 }

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>confirm payment</title>
</head>

<body bgcolor="white">
	
	<form action="confirm.php?update_id=<?php echo $order_id; ?> " method="post">
	<table width="800" height="600" align="center" border="2" bgcolor="#AF1114">
		
		<tr align="center">
		<td colspan="5"><h2>Please Confirm Your Payment</h2></td>
		</tr>
		
		<tr>
		<td align="right">Invoice No:</td>
			<td><input type="text" name="invoice_no" /></td>
		</tr>
		
		<tr>
		<td align="right">Amount Sent:</td>
			<td><input type="text" name="amount" /></td>
		</tr>
		
		<tr>
		<td align="right">Select Payment Mode:</td>
			<td>
			<select name="payment_method">
				<option>Select Payment </option>
				<option>Pay offline</option>
				<option>Bank Transfer</option>
				<option>cash on delivery</option>
				<option>Western Union</option>
				<option>Paypal</option>
				</select>
			</td>
		</tr>
		
		<tr>
		<td align="right">Transation/Reference ID:</td>
			<td><input type="text" name="tr" /></td>
		</tr>
		
		<tr>
		<td align="right">Easypaisa/UBLOMNI code</td>
			<td><input type="text" name="code" /></td>
		</tr>
		
		<tr>
		<td align="right">Payment Date:</td>
			<td><input type="text" name="date" /></td>
		</tr>
		
		<tr align="center">
		
			<td colspan="5"><input type="submit" name="confirm" value="confirm payment" /></td>
		</tr>
		
		
		</table>
	
	
	
	
	</form>
</body>
</html>

<?php
if(isset($_POST['confirm'])){
	
	$update_id =$_GET['update_id'];
	
	$_invoice =$_POST['invoice_no'];
	$amount =$_POST['amount'];
	$payment_method =$_POST['payment_method'];
	$ref_no =$_POST['tr'];
	$code =$_POST['code'];
	$date =$_POST['date'];
	
	$complete ='complete';
	
	
	$insert_payment ="insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$_invoice','$amount','$payment_method','$ref_no','$code','$date')";
	
	$run_payment =mysqli_query($con,$insert_payment);
	
	
	
	$update_order ="update customer_orders set order_status = 'Complete' where order_id ='$update_id'";
	
	$run_order = mysqli_query($con,$update_order);
	
	if($run_payment){
		
		echo "<h2 style='text-align:center; color:white;'>Payment received, your order will be completed within 24 hours</h2>";
			
	}
}

?>