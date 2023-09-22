<?php 

include "paras.php";
include "A_User.php";

$mobile=$_SESSION['Smobile'];
$id3=$_GET['id2'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<?php 
$query="select * from product where PRO_ID=$id3";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($result))
{
?>
<div style="background-color:silver;width: %;display: grid; grid-template-columns: auto;float: center;margin: 50px; border-radius: 20px;padding: 20px" align="center">
	<div  style="font-size: 20px ; padding:0; margin:0;text-align: center;"><img height="200" width="250" src="<?php echo '../admin/'.$row['PRO_IMAGE1']; ?>"></div><br>
		<form accept="#" method="POST">
		<table text-align="center">
			<tr style="height: 50px">
				<td>Product Name</td><td><?php echo $row['PRO_NAME'] ?></td>
			</tr>
			<tr style="height: 50px">
				<td>Author</td><td><?php echo $row['Author'] ?></td>
			</tr>
			
			<tr style="height: 50px">
				<td>Product Price</td><td><input type="text" style="background-color: silver;border:none;" name="PRO_PRICE" id="price" value="<?php echo $row['PRO_PRICE'] ?>" readonly></td>
			</tr>
			<tr style="height: 50px">
				<td>Product Quantity</td>
				<td>
					<select style="background-color:silver;height:50px;border:2px solid grey;" name="txtq" id="item" onchange="ChangeValue();">
						<option value="0">select quantity</option>
					<?php 
						for($i=1;$i<=5;$i++)
							{ ?>

						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php 
					$dis=$row['DIS_ID'];
					$q="select * from discount where DIS_ID='$dis'";
					$r=mysqli_query($con,$q);
					$row1=mysqli_fetch_assoc($r);
					$discount=$row1['PERC_D'];
                    
							} 
		
					?>
					<script type="text/javascript">
						function ChangeValue()
						{
							var disc=document.getElementById('disc').value;
							var r=document.getElementById('price').value;
							var p=document.getElementById('item').value;
							var t=document.getElementById('total').value=r*p;
							document.getElementById('distotal').value=t-(t*disc/100);

						}
					</script>
				</td>
			</tr>
			<tr style="height: 50px">
				<td>TOTAL:</td><td><input style="background-color: silver;border:none;" type="text" name="txttotal" id="total" value="<?php echo $row['PRO_PRICE'] ?>" readonly ></td>
			</tr>
			<tr style="height: 50px"><td>Discount:</td><td><input style="background-color: silver;border:none;" type="text" id="disc" name="discount" value="<?php echo $discount ?>" readonly></td></tr>
			<tr style="height: 50px"><td>After Discount total price:</td><td><input style="background-color: silver;border:none;" type="text" id="distotal" name="distotal" value="" readonly></td></tr>
			<tr style="height: 50px">
				<td colspan="2"><button type="submit" name="btnsave" value="<?php echo $row['PRO_ID'];?>">ADD TO TROLLEY</button></td>
				
			</tr>
		</table>
		</form>
</div>	
<?php  
}
?> 

</body>
</html>

<?php
if(isset($_POST['btnsave']))
{
	$id=$_POST['btnsave'];
	$price=$_POST['PRO_PRICE'];
	$quantity=$_POST['txtq'];
	$tamt=$_POST['distotal'];
	$date=date("Y-m-d");

	$r=mysqli_query($con,"INSERT INTO `trolley`(PRO_ID, C_MOBILE, PRO_PRICE, PRO_QUANTITY, Total_AMT, T_Date,T_STATUS) VALUES ('$id3','$mobile','$price','$quantity','$tamt','$date','no')");
	if(!$r)
	{
		// echo $id."<br>".$mobile."<br>".$price."<br>".$quantity."<br>".$tamt."<br>".$date;exit;
		echo "<script>alert('Failed');window.location='Home.php';</script>";
	}
	else
	{

		$id=$con->insert_id;
		$_SESSION["id"]=$id;
		
		echo "<script>alert('Item is added in Trolley');window.location='cart.php'</script>";
	}
}

?>

<!-- -->