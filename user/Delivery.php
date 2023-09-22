<?php
include "A_User.php";
include "footer.php";
?>
 
	<link rel="stylesheet" type="text/css" href="style2.css">
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
	<div class="header">
		<h2>Delivery Status</h2>
	</div>
	

	<form method="post" action="#">
  
		<div class="input-group">
			<label>Delivery Address</label>
			<textarea cols="50" rows="5" name="address">
				
			</textarea>
		</div>
		<div>
				<label>Delivery Date</label>
				<input type="text" name="DEL_date" value="<?php 
				$date=date_create(date('Y-m-d'));
date_add($date,date_interval_create_from_date_string("7 days"));
echo date_format($date,"Y/m/d");
				 

				?>"	 readonly >
		</div>

	<div class="input-group">
			<br/>
			<button type="submit" style="background-color:green;width: 250px;" class="btn" name="btnsave">Submit</button>
			
		</div>
	</form>
</body>
</html>

<?php 
 if(isset($_POST['btnsave']))
 {	
	
	$PAY_ID=$_SESSION['id'];
	$PRO_ID=$_SESSION['PRO_ID'];
	$DEL_date=$_POST['DEL_date'];
	$address=$_POST['address'];
	
	$query="insert into delivery(PAY_ID,PRO_ID,DEL_date,address) values('$PAY_ID','$PRO_ID','$DEL_date','address')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('Delivery added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('Delivery failed to added')</script>";
  	}
}
  ?>