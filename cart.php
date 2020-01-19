<?php
session_start();

if(isset($_SESSION["logged_in"]))
{


$data=$_SESSION["logged_in"]["fullname"];





require 'config.php';

if (isset($_GET["id"]))
 {
	
	$id=$_GET["id"];
	//$cart_id=$_GET["id"];


	$sql="SELECT * FROM product WHERE id='$id'";

	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);


	$pname=$row["product_name"];
	$pprice=$row["product_price"];
	$del_charge=50;
	$total_price=$pprice + $del_charge;
	$pimage=$row["product_image"];

	//for cart table insertion

	$sql1="INSERT INTO cart(cart_pro_name,cart_pro_price,cart_pro_image) VALUES('$pname','$pprice','$pimage')";

      $result1=mysqli_query($conn,$sql1);


    $sql1="SELECT * FROM  cart ";

	$result1=mysqli_query($conn,$sql1);

      $row1=mysqli_fetch_array($result1);
      

      $product_name=$row1["cart_pro_name"];
      $product_price=$row1["cart_pro_price"];
      $product_image=$row1["cart_pro_image"];
      $total_price=$product_price+ $del_charge;


 
}
else
{
	echo "No product found";
}



?>



<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="author" content="sourav singh">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width ,initial-scale=1 shrink-to-fit=no">
	<title>Cart Page</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><h3><i>Eat Street</i></h3></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="product_page.php">Home</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="session_out.php">Log Out</a>
      </li>
      <br><br> 
       <li class="nav-item">
        <a class="nav-link" href="#" value=""><?php echo "  ".$data;?></a>
      </li>   
    </ul>
  </div> 
</nav>
<div class="container">
	<div class="row justify-content center">
		<div class="col-md-12 mb-5">
			<h2 class="text-center p-2 text-primary">Products In Your Cart</h2>
			

			<?php
			while($row1=mysqli_fetch_array($result1))
			{

			?>
			<h3>Product Details : </h3>
			<table class="table table-bordered" width="500px">
				<tr>
					<th>Product Name : </th>
					<td><?= $row1["cart_pro_name"];?></td>
					<td rowspan="4" class="text-center"><img src="<?= $row1["cart_pro_image"];?>
					" width="300" height="250px;">
					</td>
					
				</tr>

				<tr>
					<th>Product Price : </th>
					<td>Rs . <?= number_format( $row1["cart_pro_price"])?>/-</td>
					
				</tr>

				<tr>
					<th>Delivery Charge : </th>
					<td>Rs. <?= number_format($del_charge)?>/-</td>
					
				</tr>

				<tr>
					<th>Total Price : </th>
					<td>Rs. <?= number_format($total_price)?>/-</td>
					
				</tr>
			</table>
<?php

       }
	?>





</div>
</div>
</div>
</body>
</html>




?>


<?php

}

?>