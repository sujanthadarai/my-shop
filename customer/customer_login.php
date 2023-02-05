

<?php


@session_start();
include("includes/db.php");



?>
<div>

<form action="checkout.php" method="post" align="">
	<table width="500" height ="400" bgcolor="white"  >
		
		<tr align="center">

		<td colspan="4"><h2 >Login or Register</h2></td>
		</tr>
	<tr>
		<td align="right"><b>Your Email:</td></b>
	<td><input type="text" name="c_email" value="" /></td>
	</tr>
	<tr>
		<td align="right"><b>Your Password:</td></b>
		<td><input type="password" name="c_pass" value=""/></td>
		
	</tr>
	
	<tr align="center"  border="solid" ><td colspan="4"><a href="checkout.php?forget_pass">Forgot password</a></td></tr>
	<tr align="center">
		<td colspan="4">
	<input type="submit" name="c_login" value="Login"/>
		</td>
	</tr>
	
	</table>
	
	
	</form>

<?php
if(isset($_GET['forget_pass'])){
	echo "
	<div align='center'>
	<b>Enter your email below , we will send your password to your email</b></br>
	<form action='' method='post'>
	<input type='text' name='c_email' placeholder='Enter your email' required /></br>
	<input type='submit' name='forget_pass' value='Send Me Password'  />
	</div>
	
	";
	if(isset($_POST['forget_pass'])){
	$c_email =$_POST['c_email'];
	
	$sel_c ="select * from customers where customer_email='$c_email'";
		
	$run_c =mysqli_query($con,$sel_c);
		
	$check_c=mysqli_num_rows($run_c);
		
	$row_c=mysqli_fetch_array($run_c);
		
	$c_name = $row_c['customer_name'];
	
	$c_pass = $row_c['customer_pass'];
		
		
	if($check_c==0){
		
		echo "<script>alert('This email doesnot exist in our database, sorry!')</script>";
		exit();
	}
		else{
			$from ='sujanthadarai710@gmail.com';
			
			$subject ='Your Password';
			
			$message="
			<html>
			<h3>Dear $c_name</h3>
			<p>Your requested for your password at www.mysite.com</p>
			<b>Your Password is</b><span style='color:red;'>$c_pass</span>
			
			<h3>Thank you for using our website</h3>
			
			</html>
			
			";
			mail($c_email,$subject,$message,$form);
			
			echo "<script>alert('Password was sent to  your email,please check your inbox!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
}


?>

<h2 style="float: right; padding: 10px;"><a href="customer_register.php">New? Register Here</a></h2>


</form>
</div>

<?php

if(isset($_POST['c_login'])){
	
	$customer_email =$_POST['c_email'];
	$customer_pass =$_POST['c_pass'];
	
	$sel_customer="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer=mysqli_query($con,$sel_customer);
	$check_customer=mysqli_num_rows($run_customer);
	$get_ip=getRealIpAddr();
	$sel_cart="select * from cart where ip_add='$get_ip'";
	
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart =mysqli_num_rows($run_cart);
	
	if($check_customer==0){
		
		echo "<script>alert('Password or Email address is not correct,try again!')</script>";
		exit();
		
	}
	if($check_customer==1 AND $check_cart==0){
		$_SESSION['customer_email']=$customer_email;
		
		echo "<script>window.open('customer/my_account.php','_self')</script>";
	}
	
	else{
		$_SESSION['customer_email']=$customer_email;
		echo "<script>('You successully logged in,you can order now')</script>";
		include("payment_options.php");
	}
	
}

?>