<?php
include "paras.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATION FORM</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>REGISTRATION FORM</h2>
	</div>
	
	<form method="POST" action="#">

<div class="input-group">
			<label>Customer's First Name<span style="color:red;">*</label>
			<input type="text" name="C_FNAME" required>
		</div>
		<div class="input-group">
			<label>Customer's Last Name<span style="color:red;">*</label>
			<input type="text" name="C_SNAME">
		</div>
		<div class="input-group">
			<label>Customer's Mobile No.<span style="color:red;">*</label>
			<input type="text" name="C_MOBILE">
		</div>
		<div class="input-group">
			<label>Password<span style="color:red;">*</label>
			<input type="password" name="PASS">
		</div>
		<div class="input-group">
			<label>Confirm Password<span style="color:red;">*</label>
			<input type="password" name="C_PASS">
		</div>
		<div class="input-group">
			<label>Address<span style="color:red;">*</label>
			<textarea name="ADDRESS" height=6000 width=40px></textarea>
		</div>
		
		<div class="input-group">
			<button type="submit" style="background-color:green;" class="btn" name="btnsave">Submit</button>
			<button type="submit" style="background-color:red;" class="btn" name="btnsave">Reset</button>
		</div>
	</form>
	<marquee><p><b>Sales Offered 50% OFF</b></p></marquee>
</body>
</html>
<?php 
 if(isset($_POST['btnsave']))
 {	
	$C_FNAME=$_POST['C_FNAME'];
	$C_SNAME=$_POST['C_SNAME'];
    $C_MOBILE=$_POST['C_MOBILE'];
    $PASS=$_POST['PASS'];
	$C_PASS=$_POST['C_PASS'];
	$ADDRESS=$_POST['ADDRESS'];
	
	$query=mysqli_query($con,"INSERT INTO `regs`(`PASS`, `C_MOBILE`, `C_FNAME`, `C_SNAME`, `ADDRESS`) VALUES ('$PASS','$C_MOBILE','$C_FNAME','$C_SNAME','$ADDRESS')");
  	if($query==true)
  	{
  		echo "<script>alert('user added')</script>";
		  header('Location: login.php');
  	}
  	else
  	{
  		echo "<script>alert('users failed to added')</script>";
  	}
}
  ?>