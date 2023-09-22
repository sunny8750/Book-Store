<?php
include "A_Header.php";
include "footer.php";
?>
	<link rel="stylesheet" type="text/css" href="style1.css">
		<div class="header">
		<h2>Create Discount</h2>
	</div>
	<div>
<a href="dis.php"> <input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: -120px; padding-bottom: : 0px;"  type="button" name="adddiscount" value="VIEW LIST"></a>	
</div>

	<form method="post" action="discount.php">

		<div class="input-group">
			<label>Discount Percentage<span style="color:red;">*</label>
			<input type="text" name="PERC_D" value="">
		</div>
			<label>Discount Date</label>
		<div class="input-group">
			<input type="date" name="date" value="">
		</div>
		<div class="input-group">
			<button type="submit" style="background-color:green;width: 150px;" class="btn" name="btnsave">Create</button>
			<button type="Reset" style="background-color:red;width: 150px;" class="btn" name="btnsave">Reset</button>
		</div>
	</form>
</body>
</html>
<?php 
 if(isset($_POST['btnsave']))
 {
	$PERC_D=$_POST['PERC_D'];
	$Date=$_POST['date'];
	
	$query="insert into discount(PERC_D,Date) values('$PERC_D','$Date')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('Discount added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('Discount failed to added')</script>";
  	}
}
  ?>