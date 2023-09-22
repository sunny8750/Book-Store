<?php 

include "paras.php";
include "A_User.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<?php 
$query="select * from product";
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_assoc($result))
{
?>
<a href="view.php?id2=<?php echo $row['PRO_ID'];?>">
		<div style="background-color:silver;width:30%;display: grid; grid-template-columns: auto;float: left;margin: 10px;" >

		<div  style="font-size: 20px ; padding:0; margin:0;text-align: center;"><img src="<?php echo 'apparel/images/'.$row['PRO_IMAGE1']; ?>"></div><br>

		<div  style="font-size: 20px ; padding:0; margin:0;text-align: center;"><h3><?php echo $row['PRO_NAME'] ?></h3></div><br>



		<div style="font-size: 20px ; padding:0; margin:0;text-align: center;">Company:<?php echo $row['PRO_BRAND']?></div><br>

		<div style="font-size: 20px ; padding:0; margin:0;text-align: center;">Price:<?php echo $row['PRO_PRICE']?></div><br>
	</div>	
</a>
<?php  
}
?> 

</body>
</html>


