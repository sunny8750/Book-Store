<?php
include "A_Header.php";
include "footer.php";
?>
<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="style1.css">

</head>
<body>
	<div class="header">
		<h2>Admin's catalogue</h2>
	</div>
<div>
<a href="cat.php"> 
	<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top:-120px; padding-bottom: : 0px;"  type="button" name="addcatalogue" value="VIEW LIST">
</a>	
</div>
	<form method="POST" action="#">

		<div class="input-group">
			<label>Catalogue Name<span style="color:red;">*</span></label>
			<input type="text" name="CAT_NAME"/>
		</div>
		<div class="input-group">
			<br/>
			<label>Catalogue Description<span style="color:red;">*</span></label>
			<textarea name="CAT_DESC" cols="46" rows="7" style="border-radius:10px;"></textarea>
		</div>
		<div class="input-group">
			<br/>
			<button type="submit" style="background-color:green;width: 150px;" class="btn" name="btnsave">Submit</button>
			<button type="Reset" style="background-color:red;width: 150px;" class="btn" >Reset</button>
		</div>
	</form>
</body>
</html>

 <?php 
 if(isset($_POST['btnsave']))
  {//	print_r($_POST);echo "<br><br><br><br>" ;exit;
	$CAT_NAME=$_POST['CAT_NAME'];
	$CAT_DESC=$_POST['CAT_DESC'];
  	
	$query="INSERT INTO catalogue (CAT_NAME,CAT_DESC) VALUES ('$CAT_NAME','$CAT_DESC')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('catalogue added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('catalogue failed to added')</script>";
  	}
}
  ?>