<?php
session_start();
include("includes/db.php");
include("functions/function.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Shop</title>
	<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>

<body>
	<!--main containwe starts-->
<div class="main_wrapper">

<!--Header starts-->	
<div class="header_wrapper">
	<a href="index.php"> <img src="images/shopin.jpg" style="float: left"></a>
	<img src="images/loveme.gif" style="float: left">
</div>	
	<!--Header Ends-->
	<!--naviagtion bar starts-->
<div id="navbar">
	<ul id="menu">
	<li><a href="index.php" style='color:black;'>Home</a></li>
		<li><a href="all_products.php" style='color:black;'>All products</a></li>
		<li><a href="my_account.php" style='color:black;'>My account</a></li>
		<li><a href="user_register.php" style='color:black;'>Sign UP</a></li>
		<li><a href="cart.php" style='color:black;'>Shopping Cart</a></li>
		<li><a href="contact.php" style='color:black;'>Contact Us</a></li>
	
	</ul>
	<div id="form">
	<form method="get"action="results.php" enctype="multipart/form-data">
		<input type="text" name="user_query" placeholder="search a product"/>
		<input type="submit" name="search"/>
		
		</form>
	</div>
	
	</div>
	<!--naviagtion bar end-->
<div class="content_wrapper">
	
	<div id="left_sidebar">
	<div id="sidebar_titile">Categories</div>
		
	<ul id="cats">
		
		<?php getCats();?>
		
		</ul>
		<div id="sidebar_titile">Brands</div>
		
		<ul id="cats">
			
			
	<?php getBrands() ?>
			
		</ul>
	</div>
	<div id="right_content">
	
		<?php 
	cart();
		?>
		
	<div id="headline">
		
		<div id="headline_content">
		<?php
		if(!isset($_SESSION['customer_email']))
		{
			echo "<b>Welcome Guest!</b><b style='yellow'>Your Shopping Cart: </b>";
		}
			else{
				echo "<b>Welcome:" . "<span style='color:skyblue'>" . $_SESSION['customer_email'] . "</span>". "</b>" .  "<b style='yellow'>Your Shopping Cart: </b>";;
			}
			?>
		<span>-Total Items: <?php items();  ?> -Total Price:<?php total_price(); ?> - <a href="cart.php" style="color: #D9B20D">Go to cart</a>
			
			<?php
			if(!isset($_SESSION['customer_email'])){
			echo "<a href='checkout.php' style='color: #D7521F;'>Login</a>";
			}
			else{
				echo "<a href='logout.php' style='color: #D7521F;'>Logout</a>";
			}
				?>
			</span>	
		
		</div>
		
		</div>	<?php

$c_name=$ns='';
if(isset($_POST['register'])){

	$c_name =trim($_POST['c_name']);
	$nc="/^[A-Za-z]*$/";
	if(preg_match ("$nc",$c_name))
			{
				$ns="ok";
				
			}
	else{
		$ns="check";
	}
	
	$c_email =$_POST['c_email'];
	$c_pass =$_POST['c_pass'];
	$c_country =$_POST['c_country'];
	$c_city =$_POST['c_city'];
	$c_contact =$_POST['c_contact'];
	$c_address =$_POST['c_address'];
	$c_image =$_FILES['c_image']['name'];
	$c_image_tmp =$_FILES['c_image']['tmp_name'];
	
	$c_ip =getRealIpAddr();
	
	$insert_customer ="insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) value('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
	
	$run_customer =mysqli_query($con,$insert_customer);
	
	move_uploaded_file($c_image_tmp,"customer/customer_photos/$c_image");
	
	$sel_cart="select * from cart where ip_add='$c_ip'";
	
	$run_cart=mysqli_query($con,$sel_cart);
	
	$check_cart =mysqli_num_rows($run_cart);

	

          
	$c_contact = '000-0000-0000';

if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $c_contact)) {
  echo "error";
}	  
		
		
	
	
	if($check_cart>0){
		
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('Account Created Sucessfully,Thank you')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		
	}
	else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('Account Created Sucessfully,Thank you')</script>";
		
		echo "<script>window.open('index.php,'_self')</script>";
		
		
	}
	$c_name =$_POST['c_name'];
	if(!preg_match ("/^[a-zA-Z]*$/",$c_name))
			{
				echo"Wrong";
			}
	
	
}






?>

		
		<div>
			
		<form action="customer_register.php" name="myform"  onsubmit="return validation()" method="post" enctype="multipart/form-data" />
			<table width="750"height="550" align="center">
			
			<tr align="center">
				
				<td colspan="5"><h2>Create an Account</h2></td>
				</tr>
			<tr>
				<td align="right"><b>Customer Name:</b></td>
				<td><input type="text" name="c_name" value="<?php echo $c_name; ?>" /></td>
				<span><?php echo $ns;?> </span>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Email:</b></td>
				<td><input type="text" name="c_email" required /></td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Password:</b></td>
				<td><input type="password" name="c_pass" required /></td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Country:</b></td>
				<td>
					<select name="c_country">
					
					<option>Select your  country</option>
					    <option>India</option>
						<option>America</option>
						<option>India</option>
						<option>Gorkha</option>
						<option>China</option>
						<option>Pakistan</option>
						<option>United Arab Emirates</option>
						<option>United states</option>
						<option>Nepal</option>
						<option>United Kingdom</option>
						<option>Saudi Arabia</option>
					</select>
					
					</td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer City:</b></td>
				<td><input type="text" name="c_city" required /></td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Mobile no:</b></td>
				<td><input type="text" name="c_contact" required /></td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Address:</b></td>
				<td><input type="text" name="c_address" required /></td>
				</tr>
				
				<tr>
				<td align="right"><b>Customer Image:</b></td>
				<td><input type="file" name="c_image" required /></td>
				</tr>
				
				
				<tr align="center">
				<td colspan="5"><input type="submit" name="register" value="submit"/></td>
				
				</tr>

			</table>
			


       

			
		
			
		</div>
		
	
	
	</div>
	
	</div>

	

<!-- footer -->

<div class="footer">
	
		<div class="footer-section about">
		
                        <div class="footer-col-1">
                            <h3 style="padding:5px; text-align: left">Download Our App</h3>
                            <p style="padding:5px; text-align: left">Download App On Andriod and ios monile phone.</p>
                            <div class="app-logo">
							<a href="https://play.google.com/store/apps?hl=en&gl=US"><img src="images/play-store.png"></a>
							<a href="https://www.apple.com/app-store/"> <img src="images/app-store.png"></a>
								
		           
		<div class="footer-section  links">
			
		<div class="footer-col-2">
                            <a href="/"><img src="images/download111.png"></a>
		

							<div class="footer-content">

   
   <p>Our Purpose Is To Sustainably Make The Pleasure And 
								Benefit To Elecronic Accessible To The Many</p>
  
<!--Footer's social icon-->
   <ul class="socials"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <li><a href="https://www.facebook.com/sujan.thadarai"><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
      <li><a href=""><i class="fa fa-youtube"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
    

 <!-- 
   <div class="footer-menu">
      <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Contact</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Articles</a></li>
      </ul>
   </div>

    -->
		</div>
	
		
<h2 style="padding:20px; text-align: center">&copy; 2021 - By www.onlinedoken.com</h2>
	
		
	
	
	
</body>
</html>

