<?php
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
	
	<div id="headline">
		
		<div id="headline_content">
		<b>Welcome Guest!</b>
		<b style="color:blue;">shopping Cart:</b>	
		<span>- Item:-Price:</span>	
		
		</div>
		
		</div>	
		
		<div id="products_box">
			
		<?php
			$get_products="select * from products";	
			
		$run_products=mysqli_query($con,$get_products);
			while($row_products=mysqli_fetch_array($run_products)){
			    
			    $pro_id=$row_products['product_id'];
				$pro_title = $row_products['product_title'];
				$pro_cat = $row_products['cat_id'];
				$pro_brand = $row_products['brand_id'];
				$pro_desc = $row_products['product_desc'];
				$pro_price = $row_products['product_price'];
				$pro_image = $row_products['product_img1'];
			
				echo "
				<div id ='single_product'>
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180 >'</img><br>
				<b>price: $ $pro_price </b></p>
				
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
				</div>
				
				";
				
			}
		
	
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