<?php
session_start();

if(isset($_SESSION["logged_in"]))
{


$data=$_SESSION["logged_in"]["fullname"];


require 'config.php';

if (isset($_GET["id"]))
 {
	
	$id=$_GET["id"];

	$sql="SELECT * FROM product WHERE id='$id'";

	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);

	$pname=$row["product_name"];
	$pprice=$row["product_price"];
	$del_charge=50;
	$total_price=$pprice + $del_charge;
	$pimage=$row["product_image"];
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
	<title>complete your order</title>

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
			<h2 class="text-center p-2 text-primary">Fill the details to complete order</h2>
			<h3>Product Details : </h3>
			<table class="table table-bordered" width="500px">
				<tr>
					<th>Product Name : </th>
					<td><?= $pname?></td>
					<td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="300">
					</td>
					
				</tr>

				<tr>
					<th>Product Price : </th>
					<td>Rs . <?= number_format($pprice)?>/-</td>
					
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
			<h4>Enter Your Details</h4>
			<form action="pay.php" method="post" accept-charset="utf-8">
				<input type="hidden" name="product_name" value="<?= $pname; ?>">
				<input type="hidden" name="product_price" value="<?= $total_price; ?>">

				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
				</div>


				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" class="form-control" placeholder="Enter Your address" required>
				</div>
				<div class="form-group">
					<label>Pincode</label>
					<input type="text" name="pincode" class="form-control" placeholder="Enter Your address" required>
				</div>


				<div class="form-group">
					<label>Contact</label>
					<input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone" required>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" 
					class="btn btn-danger btn-lg" value="Click to pay Rs. <?= number_format($total_price)?>/-">
				</div>
			</form>
		</div>
	</div>
</div>


</body>
</html>

<?php

}	


?>