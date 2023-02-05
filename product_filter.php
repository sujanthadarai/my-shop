<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta charset="utf-8" name="viewport" content="width=device-width" content="height=device-height", initial-scale=1.0>
<title>Untitled Document</title>
	<link rel="stylesheet" href="https:cdn.jsdelivr.net/npm/bootstrap@5.0.0-betal/dist/css/bootstrap.min.css" media="all" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Filter data by price </h4>

                    </div>
                    <div class="card-body">
                        <form  action="" method="GET">



                        <div class="row">
                            <div class="row-md-4">
                                <label for="">Start Price</label>
                                <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price']; }else{echo "100";} ?>" class="form-control">
                            </div>
                            <label for="">End price</label>
                                <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price']; }else{echo "900";} ?>" class="form-control">
                            </div>
                            <label for="">click me</label></br>
                                <button type="submit" class="btn btn-primary px 4">Filter</button>
                            </div>
                        </div>
                        
                    </form>
                 </div>
      
             </div>
        </div>
	     <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">

                    


                <?php
 
                 $con=mysqli_connect("localhost","root","","myshop");

                 if(isset($_GET['start_price']) && isset($_GET['end_price']))
                 {
                   $startprice=$_GET['start_price'];
                   $endprice=$_GET['end_price'];

                   $query ="SELECT * FROM products WHERE Product_price BETWEEN $startprice AND $endprice";
                   
                 }
                 else
                 {
                    $query ="SELECT * FROM products";
                 }

                
                 $query_run = mysqli_query($con,$query);

                 if(mysqli_num_rows($query_run)>0)
                 {
                    foreach($query_run as $items)

                    {
                        ?>
                      
                     <div class="col-md-4">
                    
                      <h5><?php  echo $items['product_title'] ?></h5>
                      <h6><?php  echo $items['product_price'] ?></h6>
                      
                     </div>
                     <?php

                    }
                }
                    else{
                        echo "No Record Found";
                    }
                 

                ?>
                </div>
                </div>
            </div>
         </div>
     </div>
 </div>
	
	<script scr="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script scr="https:cdn.jsdelivr.net/npm/bootstrap@5.0.0-betal/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
