<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Payment's List</center>
    	<a href="payment.php"> 

    		<input class="btn btn-primary btn-sm" text-align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="pay.php" name="addpayment" value="Payment"></a> </h3>
  </div>
<div class="panel-body">
<br/><br/>
<table class="table-format">
<tr>
<td class="thead">ID</td>
<td class="thead">PRODUCTS</td>
<td class="thead">TROLLEY ID</td>
<td class="thead">MODE OF PAYMENT</td>
<td class="thead">DATE</td>
<td class="thead">AMOUNT</td>
</tr>

 <?php 
 $query = "select * from payment";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" >                           
<tr>

<td class="tdata"><?php echo $row['PAY_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_ID" style="width: 80px;" value="<?php echo $row['PRO_ID']; ?>" required></td>
<td class="tdata"><input  type="text" class="txt-format" name="Trolley_id" value="<?php echo $row['Trolley_id']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="PAY_MODE" value="<?php echo $row['PAY_MODE']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="PAY_date" style="width: 100px;" value="<?php echo $row['PAY_date']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="Total_AMT" style="width: 100px;" value="<?php echo $row['Total_AMT']; ?>"></td>


<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['PAY_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['PAY_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>

<!-- ADD NEW REVIEWS-->
<?php 

if(isset($_POST['delete']))
{
    $del_id = $_POST['delete'];
    
    $q1 = "delete from payment where PAY_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='pay.php';</script>";
		}
		else
		{
		echo "id".$row['PAY_ID']." not deleted</br>"; 

		}
}
?>
<?php
if(isset($_POST['change']))
{
$PAY_ID=$_POST['change'];	
$PRO_ID=$_POST['PRO_ID'];
$Trolley_id=$_POST['Trolley_id'];
$PAY_MODE=$_POST['PAY_MODE'];
$PAY_date=$_POST['PAY_date'];
$Total_AMT=$_POST['Total_AMT'];
$q4="update payment set PAY_ID='$PAY_ID',PRO_ID='$PRO_ID',Trolley_id='$Trolley_id',PAY_MODE='$PAY_MODE',PAY_date='$PAY_date',Total_AMT='$Total_AMT' where PAY_ID='$PAY_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='pay.php';</script>";
		}
		else
		{
		echo "id".$row['PAY_ID']." not updated</br>"; 

		}

}
?>