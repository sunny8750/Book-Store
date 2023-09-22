<?php
 session_start();
 include "paras.php";
include "footer.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="A_Design.css"/>
	<title></title>
	<style>
		.menu-btn{
			font-size:"18px";
		}
		.ul{
			width:100% !important;
		}
	</style>
</head>

 <body style="background-color:#0A3B67;">

	<div class="f_DIV1" style="float:left;display:inline; ">
		
			<p class="header-txt"><b>OnlineBookStore.com</b></p>
			
<ul class="ul">
<?php
    if(isset($_SESSION['id']))
    {?>
     
<li><a href="dashboard.php" style="color:white;" class="menu-btn">Dashboard</a></li>
<!-- <li><a href="About.php" class="menu-btn">About Us</a></li>      -->
<li><a href="catalogue.php" class="menu-btn">Catalogue</a></li>
<li><a href="Product.php" class="menu-btn">Product</a></li>
<li><a href="Discount.php" class="menu-btn">Discount</a></li>
<li><a href="Delivery.php" class="menu-btn">Delivery</a></li>
<li><a href="payment.php" class="menu-btn">Payment</a></li>
<li><a href="refund.php" class="menu-btn">Refund</a></li>
<li><a href="rating.php" class="menu-btn">Ratings</a></li>
<li><a href="logout.php" class="menu-btn" >Logout</a></li>
     
<?php
}
?>	

</ul>
</div>
<br/><br/><br/><br/>
	</form>
</body>
</html>