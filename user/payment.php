<?php
include "A_User.php";
include "footer.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
		<link rel="stylesheet" type="text/css" href="A_Design1.css"/>
	<style>
		.header {
			background: #003366;
		}
		button[name=To Pay_btn] {
			background: #003366;
		}

		.txt-form
{
		width: 340px;
		 height: 30px;
		 border-radius: 5px;
}
	</style>
</head>
<body>
	<div class="header">
		<h2>Payment</h2>
	</div>
	<div>

</div>
	<form method="post">
		
		<div class="input-group">
			<label>Payment<span style="color:red;">*</label>
			<select name="PAY_MODE" class="txt-form">
				<option value="Credit">Credit Card</option>
				<option value="Credit">Debit Card</option>
				<option value="Credit">Cash On Delivery</option>
			</select>
		</div>
		
	<div class="input-group">
			<br/>
			<button type="submit" style="background-color:green;width: 250px;" class="btn" name="btnsave">Pay Now</button>
			
		</div>
      </form>
    </div>
  </div>		
			
		
	</form>
</body>
</html>
 <?php 
 if(isset($_POST['btnsave']))
 {	
	$PRO_ID=$_REQUEST['PRO_ID'];
	$Trolley_id=$_REQUEST['Trolley_id'];
	$PAY_MODE=$_POST['PAY_MODE'];
	$PAY_date=date('Y-m-d');
	$Total_AMT=$_REQUEST['Total_AMT'];
	
	$query="insert into payment(PRO_ID,Trolley_id,PAY_MODE,PAY_date,Total_AMT) values('$PRO_ID','$Trolley_id','$PAY_MODE','$PAY_date','$Total_AMT')";
  	if(mysqli_query($con,$query))
  	{
  		$pid=$con->insert_id;
  		$_SESSION['id']=$pid;
  		$_SESSION['PRO_ID']=$PRO_ID;
  		echo "<script>window.location='Delivery.php';</script>";
  	}
  	else
  	{
  		echo "<script>alert('Could not completed')</script>";
  	}
}

  ?>