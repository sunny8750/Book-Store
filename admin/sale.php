<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Sales's list</center>
    	<a href="sales.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="sales.php" name="addsales" value="ADD SALES"></a> </h3>
  </div>
<div class="panel-body">
<br/><br/>
<table class="table-format">
<tr>
<td class="thead">S.NO</td>
<td class="thead">PRODUCT ID</td>
<td class="thead">AMOUNT</td>
<td class="thead">DATE OF SALES</td>
</tr>

 <?php 
 $query = "select * from sales";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $row['SALES_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_ID" value="<?php echo $row['PRO_ID']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="AMT" value="<?php echo $row['AMT']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="D_Date" value="<?php echo $row['D_Date']; ?>"></td>

<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['SALES_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['SALES_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>

<!-- ADD NEW SALES-->

<?php 

if(isset($_POST['delete']))
{
    $del_id = $_POST['delete'];
    
    $q1 = "delete from sales where SALES_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='sale.php';</script>";
		}
		else
		{
		echo "id".$row['SALES_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$SALES_ID=$_POST['change'];	
$CAT_ID=$_POST['CAT_ID'];
$T_AMT=$_POST['T_AMT'];
$Date=$_POST['Date'];
$q4="update sales set CAT_ID='$CAT_ID',T_AMT='$T_AMT',Date='$_Date' where SALES_ID='$SALES_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='sale.php';</script>";
		}
		else
		{
		echo "id".$row['SALES_ID']." not updated</br>"; 

		}

}
?>