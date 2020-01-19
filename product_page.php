
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="author" content="sourav singh">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width ,initial-scale=1 shrink-to-fit=no">
	<title>PRODUCT PAGE</title>
	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "ef53c186-9a63-4a5c-9dc1-f3d6b254dcee",
    });
  });
</script>

</head>
<body>
	
<!-- new nav bar -->

	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><h3><i>Eat Street</i></h3></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  	<ul>
  		<span></span>
  		<span></span>
  	</ul>
    <ul class="navbar-nav mr-auto">
    	
    
      <li style="width: 300px; margin-right:15px; "><input type="text" class="form-control" id="search" name=""></li>
    	<li style=" margin-right:10px;"><input type="submit" class="btn btn-primary" id="serach_btn" name="" value="Search"></li>
      
    </ul>

    <ul class="navbar-nav ml-auto">
      
    	  <li class="nav-item">
        <a class="nav-link" href="index.html"><i class="fa fa-home">&nbsp;</i>Home</a>
      </li>
      
    	
      <!-- <li class="nav-item" style="margin-right:5px; ">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart">&nbsp;</i>Cart</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="session_out.php">Log Out</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" value=""><?php echo "Welcome  ".$data;?></a>
      </li> 
      
    </ul>
  </div> 
</nav>
<?php
require 'config.php';
$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);
?>

<div class="container">
	<div class="row">
		<?php

		while ($row=mysqli_fetch_array($result)) {
		?>

	<div class="col-lg-4 mt-3 mb-3">
		<div class="card-deck">
			<div class="card border-info p-2">
				<img src="<?= $row['product_image']?>"  class="card-img-top" height="200">
				<h5 class="card-title">Product :<?= $row['product_name'];?></h5>
				<h3>Price : <?= number_format($row['product_price']);?></h3>
				<a href="cart.php?id=<?=$row['id'];?>" 
					class="btn btn-danger btn-xs" style="width: 120px;">Add To Cart</a><br>
				<a href="order1.php?id=<?=$row['id'];?>" 
					class="btn btn-danger btn-block btn-lg">Buy Now</a>
					
			</div>
		</div>
		


	</div>

	<?php

       }
	?>

		
	</div>
</div>

	

</body>
</html>

<?php

}

?>