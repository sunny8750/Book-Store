<?php
include "A_Header.php";
include "paras.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
</head>
<body>
	<div class="panel panel-default ">
  <div class="panel-heading">
    <h3 class="panel-title">STATICS</h3>
  </div>
  <div class="panel-body">
    <div class="col-sm-6">
    <a class="link" href="">	
      <div class="well">
        <h2><span aria-hidden="true"></span>
			<?php
			$query="select * from regs" ;
				$r=mysqli_query($con,$query);
				$count=mysqli_num_rows($r);
				 echo $count;
			?>
		</h2>
        <h5>USERS</h5>
      </div>
      </a>
    </div>

    <div class="col-sm-6">
    <a class="link" href="catalogue.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>
        	<?php $query="select * from catalogue" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>CATALOGUE</h5>
      </div>
  	</a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="delivery.php">
      <div class="well">
        <h2><span aria-hidden="true"></span>
        	<?php $query="select * from delivery" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>DELIVERY</h5>
      </div>
  </a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="discount.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>
        	<?php $query="select * from discount" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>DISCOUNTS</h5>
      </div>
  </a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="payment.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>
        	<?php $query="select * from payment" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>PAYMENTS</h5>
      </div>
  </a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="product.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>
        	<?php $query="select * from product" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>PRODUCTS</h5>
      </div>
  </a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="review.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>
        	<?php $query="select * from review" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
        <h5>REVIEWS</h5>
      </div>
  	</a>
    </div>
    <div class="col-sm-6">
    	<a class="link" href="Trolley.php">
      <div class="well">
        <h2><span  aria-hidden="true"></span>

        	<?php $query="select * from Trolley";
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
    </h2>
        <h5>TROLLEY</h5>
      </div>
  	</a>
    </div>
  	
    <div class="col-sm-6">
    	<a class="link" href="sales.php">
      <div class="well">
        <h2><span aria-hidden="true"></span>
        	<?php $query="select * from sales" ;
				$r=mysqli_query($con,$query);
				$count=0;
				while($row=mysqli_fetch_assoc($r))
				{

				$count++;
				}
				echo $count;
			?>
        </h2>
      </div>
  </a>
    </div>
 </div>
</div>
	</body>
</html>