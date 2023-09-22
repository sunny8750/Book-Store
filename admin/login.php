<?php
include "paras.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
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
		<h2>LOGIN FORM</h2>
	</div>
	
	<form method="POST" action="#">


		<div class="input-group">
			<label>Admin ID<span style="color:red;">*</label>
			<input type="text" name="txtid" placeholder="Enter ID" required/>
		</div>
		<div class="input-group">
			<label>Password<span style="color:red;">*</label>
			<input type="password" name="txtpass" placeholder="Enter Password"/>
		</div>
		
		<div class="input-group">
			<button type="submit" style="background-color:green;" class="btn" name="btnsave">Submit</button>
			<button type="Reset" style="background-color:red;" class="btn" >Reset</button>
		</div>
	</form>
</body>
</html>
<?php
if(isset($_POST['btnsave']))
{
	$id=$_POST['txtid'];
	$pass=$_POST['txtpass'];
	$q="SELECT * from admin WHERE ADM_ID='$id' and PASS='$pass'";
	$r=mysqli_query($con,$q);
	$count=mysqli_num_rows($r);
	if($count==1)
	{
		$_SESSION['id']=$id;
		echo "<script>window.location='dashboard.php'</script>";
	}
	else
	{
		echo "<script>alert('Login Failed');window.location='login.php'</script>";
	}

}
?>