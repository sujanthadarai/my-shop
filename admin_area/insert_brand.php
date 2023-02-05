<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
	form{margin: 15;}
	</style>
</head>

<body>
	<form action="" align="center" method="post">
	<b><h3 align="center"> Insert New Brand</h3></b><br>
		<input type="text" name="brand_title" />
		<input type="submit" name="insert_brand" value="Insert Brand" />
	</form>
	<?php 
	include("includes/db.php");
	 if(isset($_POST['insert_brand'])){
		 $brand_title =$_POST['brand_title'];
		 
		 $insert_brand="insert into brands (brand_title) values ('$brand_title')";
		 
		 $run_brand= mysqli_query($con,$insert_brand);
		 
		 if($run_brand){
			 echo "<script>alert ('New Brand Has Been Inserted')</script>";
			 echo "<script>window.open('index.php?view_brands','_self')</script>";
		 }
	 }
	
	?>
</body>
</html>