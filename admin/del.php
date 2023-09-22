<?php 
include "paras.php";
include "A_Header.php";
?>

<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Delivery's List</center>
    	<a href="delivery.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="delivery.php" name="adddelivery" value="DELIVERY"></a> </h3>
  </div>

  <div class="panel-body">


<br/><br/>
<table class="table-format">

<tr>
<td class="thead">ID </td>
<td class="thead">PAYMENT </td>
<td class="thead">Product</td>
<td class="thead">Date</td>
<td class="thead">Address</td>
</tr>

 <?php 
 $query = "select * from delivery";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $row['DEL_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PAY_ID" style="width:80px;"  value="<?php echo $row['PAY_ID']; ?>" required></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_ID" style="width:80px;" value="<?php echo $row['PRO_ID']; ?>"></td>

<td class="tdata"><input  type="text" class="txt-format" name="DEL_date" style="width:100px;"  value="<?php echo $row['DEL_date']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="address" value="<?php echo $row['address']; ?>"></td>

<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['DEL_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['DEL_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>

<!-- ADD NEW DELIVERY-->

<?php 

if(isset($_POST['delete']))
{
    $del_id = $_POST['delete'];
    
    $q1 = "delete from delivery where DEL_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='del.php';</script>";
		}
		else
		{
		echo "id".$row['DEL_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$DEL_ID=$_POST['change'];	
$PAY_ID=$_POST['PAY_ID'];
$PRO_ID=$_POST['PRO_ID'];
$address=$_POST['address'];
$DEL_date=$_POST['DEL_date'];

$q4="update delivery set PAY_ID='$PAY_ID', PRO_ID='$PRO_ID',address='$address',DEL_date='$DEL_date' where DEL_ID='$DEL_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='del.php';</script>";
		}
		else
		{
		echo "id".$row['DEL_ID']." not updated</br>"; 

		}

}
?>