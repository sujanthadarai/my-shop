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
	<b><h3 align="center">Insert New Category</h3></b><br>
		<input type="text" name="cat_title" />
		<input type="submit" name="insert_cat" value="Insert Category" />
	</form>
	<?php 
	include("includes/db.php");
	 if(isset($_POST['insert_cat'])){
		 $cat_title =$_POST['cat_title'];
		 
		 $insert_cat="insert into categories (cat_title) values ('$cat_title')";
		 
		 $run_cat= mysqli_query($con,$insert_cat);
		 
		 if($run_cat){
			 echo "<script>alert ('New Category Has Been Inserted')</script>";
			 echo "<script>window.open('index.php?view_cats','_self')</script>";
		 }
	 }
	
	?>
</body>
</html>