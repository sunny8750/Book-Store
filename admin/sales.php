<?php
include "A_Header.php";
include "footer.php";
?>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="stylesheet" type="text/css" href="A_Design.css">
	<div class="header">
		<h2>Sales</h2>
	</div>
	<div>
	<a href="sale.php"> <input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: -120px; padding-bottom: : 0px;"  type="button" name="addsales" value="VIEW LIST"></a>	
</div>
	<form method="post" action="sales.php">
		
		<div class="input-group">
			<label>Product Name<span style="color:red;">*</label>
				<select name="PRO_ID" class="txt-form">
			<?php
			$query="select * from product ";

           $r=mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($r))
{
?>
	<option value="<?php echo $row['PRO_ID'];?>"><?php echo $row['PRO_NAME'];?></option>
<?php
}
?></select>
		</div>
		<div class="input-group">
			<label>Total Amount<span style="color:red;">*</label>
			<input type="number" name="AMT" value="">
		</div>
		<div class="input-group">
			<label>Date Of Sales</label>
			<input type="date" name="D_Date" value="">
		</div>
	<div class="input-group">
			<br/>
			<button style="background-color:green;width: 150px;" class="btn" name="btnsave">Submit</button>
			<button type="Reset" style="background-color:red;width: 150px;" class="btn" >Reset</button>
		</div>
	</form>
</body>
</html>
<?php 
 if(isset($_POST['btnsave']))
 {	
	$PRO_ID=$_POST['PRO_ID'];
	$AMT=$_POST['AMT'];
	$D_Date=$_POST['D_Date'];
	
	$query="insert into sales(PRO_ID,AMT,D_Date) values('$PRO_ID','$AMT','$D_Date')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('sales added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('sales failed to added')</script>";
  	}
}
  ?>