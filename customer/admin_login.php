

<?php


@session_start();
include("includes/db.php");



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="login.css" media="all" />
</head>

<body>
<td colspan="4"><h2>Login or Register</h2></td>
		</tr>
	<tr>
		<td align="right"><b>Your Email:</td></b>
	<td><input type="text" name="c_email" value="" /></td>
	</tr>
	<tr>
		<td align="right"><b>Your Password:</b></td>
		<td><input type="password" name="c_pass" value=""/></td>
		
	</tr>
	
	<tr align="center"><td colspan="4"><a href="forget_pass.php">Forgot password</a></td></tr>
	<tr align="center">
		<td colspan="4">
	<input type="submit" name="c_login" value="Login"/>
		</td>
	</tr>
<table>
	
	</table>
	
	
	</form>



</div>

<?php

if(isset($_POST['c_login'])){
	
	$admin_email =$_POST['c_email'];
	$admin_pass =$_POST['c_pass'];
	
	$sel_admin="select * from customers where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	$run_admin=mysqli_query($con,$sel_admin);
	$check_admin=mysqli_num_rows($run_admin);
	
	if($check_admin==0){
		
		echo "<script>alert('Password or Email address is not correct,try again!')</script>";
		exit();
		
	}
	if($check_admin==1 ){
		$_SESSION['admin_email']=$admin_email;
		
		echo "<script>window.open('admin_area/index.php','_self')</script>";
	}
	
	else{
		$_SESSION['customer_email']=$customer_email;
		echo "<script>('You successully logged in,you can order now')</script>";
		
	}
	
}

?>