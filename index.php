<?php 
require_once 'Db_operations.php'; 

$db = new DB_operations(); 
$all_products=$db->get_all_products();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product Page</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="bredbids.css">
<style>

.center {
  margin: auto;
  width: 60%;
  border: 10px solid #c28be6;
  padding: 10px;
}

h1{
text-align:center;
border-width:7px;
 border-style:solid; 
 border-color:#ffcc2b; 
}

.center h1 a {
    color: #000;
    text-decoration: none;
}
img {
  border: 5px solid #555;
  max-width: 480px;
	width: 100%;
	height: auto;
        display: block;
        margin:20px auto;
}

#num{
align-self: center;
}

</style>
<script src=""></script>
</head>
<body>

<a href="#home"><img src="images/bredbids.jpg" alt="Bred Bids" class="logo"></a>

<!--DROPDOWN MENU-->
<div class="navbar">
	<a href="#home">Home </a>
	<a href="#products">Products </a>
	<a href="#about">About Us </a>
	<a href="#manage">Manage Order </a>
		<div class="dropdown">
			<button class="dropbtn">Account 
			<i class="fa fa-caret-down"></i>
		</button>
    <div class="dropdown-content">
		<a href="#login">Log In</a>
		<a href="#sign">Sign Up</a>
		<a href="#account">Manage Account</a>
		</div>
	</div> 
</div>

<h1 style="font-size:2vw;">Bred Bids </h1>

  <!--images for product page-->
  
<div class="center">
    <?php if(count($all_products) > 0){
        foreach ($all_products as $key => $product) { ?>
           <img src="images/<?php echo $product['image']; ?>" alt="purple jordans" width="100" height="100">
           <h1><a href="/groupproject/Product.php?id=<?php echo $product['id'];?>"><?php echo $product['product_name']; ?></a></h1>
        <?php }
    }else { ?>
    <h1>No Products Available</h1>
   <?php }?>

</div>


</body>
</html>