<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Discount's List</center>
    	<a href="discount.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="discount.php" name="add discount" value="ADD DISCOUNT"></a> </h3>
  </div>
<div class="panel-body">
<br/><br/>
<table class="table-format">
<tr>
<td class="thead">ID </td>
<td class="thead">Percentage</td>
<td class="thead">Discount Date</td>
</tr>

 <?php 
 $query = "select * from discount";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $row['DIS_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PERC_D" style="width:200px;" value="<?php echo $row['PERC_D']; ?>" required></td>
<td class="tdata"><input  type="text" class="txt-format" name="Date" style="width:200px;" value="<?php echo $row['Date']; ?>"></td>
<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['DIS_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['DIS_ID']; ?>">Edit</button></td>
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
    
    $q1 = "delete from discount where DIS_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='dis.php';</script>";
		}
		else
		{
		echo "id".$row['DIS_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$DIS_ID=$_POST['change'];	
$PERC_D=$_POST['PERC_D'];
$Date=$_POST['Date'];
$q4="update discount set PERC_D='$PERC_D', Date='$Date' where DIS_ID='$DIS_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='cat.php';</script>";
		}
		else
		{
		echo "id".$row['DIS_ID']." not updated</br>"; 

		}

}
?>