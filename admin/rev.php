<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Review's list</center>
    	<a href="rating.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="rating.php" name="addrating" value="ADD RATINGS"></a> </h3>
  </div>
<div class="panel-body">
<br/><br/>
<table class="table-format">
<tr>
<td class="thead">S.NO</td>
<td class="thead">ID</td>
<td class="thead">Review</td>
<td class="thead">Rating</td>
<td class="thead">DATE</td>
</tr>

 <?php 
 $query = "select * from review";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $row['RR_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_ID" style="width: 80px;" value="<?php echo $row['PRO_ID']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="R_MSG" value="<?php echo $row['R_MSG']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="RATING" value="<?php echo $row['RATING']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="Date" style="width: 100px;" value="<?php echo $row['Date']; ?>"></td>


<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['RR_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['RR_ID']; ?>">Edit</button></td>
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
    
    $q1 = "delete from review where RR_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='rev.php';</script>";
		}
		else
		{
		echo "id".$row['RR_ID']." not deleted</br>"; 

		}
}
?>
<?php
if(isset($_POST['change']))
{
$RR_ID=$_POST['change'];	
$PRO_ID=$_POST['PRO_ID'];
$R_MSG=$_POST['R_MSG'];
$RATING=$_POST['RATING'];
$Date=$_POST['Date'];
$q4="update review set PRO_ID='$PRO_ID',R_MSG='$R_MSG',RATING='$RATING',Date='$Date' where RR_ID='$RR_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='rev.php';</script>";
		}
		else
		{
		echo "id".$row['RR_ID']." not updated</br>"; 

		}

}
?>