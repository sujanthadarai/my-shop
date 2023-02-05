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
	<img src="images/loveme.gif" style="float:left">
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
		<span>-Total Items: <?php items();  ?> -Total Price:<?php total_price(); ?> - <a href="index.php" style="color: #D9B20D">Back to Shopping</a>
			
			
			&nbsp;<?php
			if(!isset($_SESSION['customer_email'])){
			echo "<a href='checkout.php' style='color: #D7521F;'>Login</a>";
			}
			else{
				echo "<a href='logout.php' style='color: #D7521F;'>Logout</a>";
			}
				?>
			
			
			</span>	
		
		</div>
		
		</div>	
		
		<div id="products_box"><br>
			
		
		<form action="cart.php" method="post" enctype="multipart/form-data">
			
			<table width="740" align="center" >
				
				<tr align="center" >
				<td><b>Remove</b></td>
					<td><b>Product</b></td>
					<td><b>Quantity</b></td>
					<td><b>Total price</b></td>
				</tr>
				
				<?php
				
				$ip_add=getRealIpAddr();

	$total =0;
	$sel_price ="select * from cart where ip_add='$ip_add'";
	$run_price=mysqli_query($con,$sel_price);
	while($record=mysqli_fetch_array($run_price)){
 	 $pro_id =$record['p_id'];
		
		$pro_price="select * from products where product_id='$pro_id'";
		
		$run_pro_price=mysqli_query($db,$pro_price);
		while ($p_price=mysqli_fetch_array($run_pro_price)){
			
			
			$product_price =array($p_price['product_price']);
			$product_title=$p_price['product_title'];
			$product_image=$p_price['product_img1'];
			$only_price =$p_price['product_price'];
			
			$value =array_sum($product_price);
			$total +=$value;
		
	
	

	?>			
			<tr>
				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
				<td><?php echo $product_title; ?><br><img src="admin_area/product_images/<?php echo $product_image; ?>" height="80" width="80" </td>
				<td><input type="text" name="qty" value="1" size="3"/></td>
				
				<?php
			if(isset($_POST['update']))
			{
				$qty=$_POST['qty'];
				$insert_qty="update cart set qty='$qty' where ip_add='$ip_add'";
				$run_qty=mysqli_query($con,$insert_qty);
				$total =$total*$qty;
				
			}
			
			?>
				<td><?php echo"$". $only_price; ?></td>
				
				</tr>
				
				<?php }} ?>
				
				<tr>
				<td colspan="3" align="right"><b>Sub Total:</b></td>
				<td><b><?php echo"$". $total; ?></b></td>
				
				
				</tr>
				<tr align="center">
					<tr></tr>
				<td colspan="2"><input type="submit" name="update" value="update Cart"/></td>
				
				<td><input type="submit" name="continue" value="Continue Shopping"/></td>
				
				<td><button><a href="checkout.php" style="text-decoration: none; color: #000000;">Checkout</button></a></td>
				</tr>
				
				
			</table>
			
			
			</form>
				
		<?php
		function updatecart(){
			global $con;
		if(isset($_POST['update']))
		{
		foreach($_POST["remove"] as $remove_id)
		{	
		$delete_products ="delete from cart where p_id='$remove_id'";
			$run_delete= mysqli_query($con,$delete_products);
			if($run_delete)
			{
				echo"<script>window.open('cart.php','_self')</script>";
			}
		
		
		}
			
			
		}
		
		if(isset($_POST['continue']))
			{
			echo "<script>window.open('index.php','_self')</script>";	
				
		}
		}
		echo @$up_cart =updatecart();
		?>
		
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
                                <img src="images/play-store.png">
                                <img src="images/app-store.png">
								
		           
		<div class="footer-section  links">
			
		<div class="footer-col-2">
                            <a href="/"><img src="images/download111.png"></a>
		

							<div class="footer-content">

   
   <p>Our Purpose Is To Sustainably Make The Pleasure And 
								Benefit To Elecronic Accessible To The Many</p>
  
<!--Footer's social icon-->
   <ul class="socials"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <li><a href=""><i class="fa fa-facebook"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="#"><i class="fa fa-youtube"></i></a></li>
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
	
		
<h2 style="padding:20px; text-align: center">&copy; 2021 - By www.onlinesawan.com</h2>
	
	
	
	
</body>
</html>