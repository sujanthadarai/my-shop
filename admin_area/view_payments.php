<!doctype html>
<html>
<head>
<meta  http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
	<style type="text/css">
		th,tr{border: 3px groove}
	</style>
</head>

<body>
	
	<table width="1093" align="center" bgcolor="gray">
	<tr align="center">
		<td colspan="7"><h2>View All Orders</h2></td>
		
		</tr>
		<tr align="center">
		    <th>Payment No</th>
			 <th>invoice No</th>
			<th>Amount Paid</th>
			 <th>Payment Method</th>
			<th>Ref No</th>
			<th>code</th>
			<th>Payment Date</th>
		</tr>
		<?php
		include("includes/db.php");
		$get_payments="select * from payments";
		$run_payments =mysqli_query($con, $get_payments);
		
		$i=0;
         while($row_payments=mysqli_fetch_array($run_payments)){
			 
			$payments_id = $row_payments['payment_id'];
			 $invoice = $row_payments['invoice_no'];
		     $amount = $row_payments['amount'];
			  $payment_m = $row_payments['payment_mode'];
			  $ref_no= $row_payments['ref_no'];
			   $code= $row_payments['code'];
			    $date= $row_payments['payment_date'];
			 

		$i++;
		
		?>
		 

<tr align="center">
		<td><?php echo $i; ?></td>
		
		<td bgcolor="#A6719B"><?php echo $invoice; ?></td>
	    <td><?php echo $amount; ?></td>
		<td><?php echo $payment_m; ?></td>
		<td><?php echo $ref_no; ?></td>
        <td><?php echo $code; ?></td>
	    <td><?php echo $date; ?></td>
		</tr>
		
	
		<?php } ?>
		
	</table>
	
</body>
</html>