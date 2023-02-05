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
    <div class="container">
      <form method="post">
        <div class="title">Admin Login</div>
        <div class="input-box underline">
          <input type="text"  name="admin_email" placeholder="Enter Your Email" required />
          <div class="underline"></div>
        </div>
        <div class="input-box underline">
          <input type="password" name="admin_pass" placeholder="Enter Your Password" required />
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="login" value="Admin Login" />
        </div>
      </form>
       
    </div>
	
	
  </body>
</html>

<?php
if(isset($_POST['login'])){
	
	$user_email = $_POST['admin_email'];
	$user_pass = $_POST['admin_pass'];
	
	$sel_admin = "select * from admins where admin_email='$user_email' AND admin_pass='$user_pass'";
	
	$run_admin =mysqli_query($con, $sel_admin);
	
	$check_admin = mysqli_num_rows($run_admin);
	
	if($check_admin==1){
		$_SESSION['admin_email']=$user_email;
		echo "<script>window.open('index.php?logged_in=YOU SUCESSFULLY LOGGED IN!!!','_self')</script>";
		
	}
	
	else{
		echo "<script>alert('Admin Email or Password is incorrect,try again')</script>";
		
	}
	
}



?>