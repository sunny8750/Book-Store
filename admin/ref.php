<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Refund's List</center>
    	<a href="refund.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="refund.php" name="add refund" value="Refund"></a> </h3>
  </div>
<div class="panel-body">
<br/><br/>
<table class="table-format">
<tr>
<td class="thead">ID </td>
<td class="thead">PAYMENT</td>
<td class="thead">REASON</td>
<td class="thead">DATE</td>
<td class="thead">MOBILE NO</td>
</tr>

<?php 
 $query = "select * from refund";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" >                           
<tr>

<td class="tdata"><?php echo $row['RP_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PAY_ID" style="width:200px;" value="<?php echo $row['PAY_ID']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="R_RSN" style="width:200px;" value="<?php echo $row['R_RSN']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="DATE" style="width:200px;" value="<?php echo $row['DATE']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="C_MOBILE	" style="width:200px;" value="<?php echo $row['C_MOBILE']; ?>"></td>
<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['RP_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['RP_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>
<!-- ADD NEW DISCOUNTS-->
<?php 

if(isset($_POST['delete']))
{
    $del_id = $_POST['delete'];
    
    $q1 = "delete from discount where RP_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='ref.php';</script>";
		}
		else
		{
		echo "id".$row['RP_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$RP_ID=$_POST['change'];	
$PAY_ID=$_POST['PAY_ID'];
$R_RSN=$_POST['R_RSN'];
$DATE=$_POST['DATE'];
$C_MOBILE=$_POST['C_MOBILE'];
$q4="update discount set PAY_ID='$PAY_ID', R_RSN='$R_RSN', DATE='$DATE', C_MOBILE='$C_MOBILE'where RP_ID='$RP_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='ref.php';</script>";
		}
		else
		{
		echo "id".$row['RP_ID']." not updated</br>"; 

		}

}
?>