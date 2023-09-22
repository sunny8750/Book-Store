<?php 
include "paras.php";
include "A_User.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<title></title>
</head>
<body>
<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title ">Review's list<a href="review1.php"> <input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;"  type="button" onclick="review1.php" name="addreviews" value="ADD REVIEWS"></a> </h3>
  </div>
  <div class="panel-body">
<h2>Choose and Delete Selected Links</h2><p align="right"></p>
<td>
<table class="table table-bordered table-hover" width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF"><strong>Delete multiple links</strong>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"><strong>RR_ID </strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>CAT_ID</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>R_MSG</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>RATING</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>DATE</strong></td>
</tr>

 <?php 
 $query = "select * from review";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>
<td bgcolor="#FFFFFF"><?php echo $row['RR_ID']; ?></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="CAT_ID" value="<?php echo $row['CAT_ID']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="R_MSG" value="<?php echo $row['R_MSG']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="RATING" value="<?php echo $row['RATING']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="DATE" value="<?php echo $row['Date']; ?>"></td>

<td><button  name="delete" type="submit" value="<?php echo $row['RR_ID']; ?>">delete</button></td>
<td><button name="change" type="submit" value="<?php echo $row['RR_ID']; ?>">edit</button></td>
</tr>
</form>
<?php
}
?>

</table>

<!--modal-->
<!--addapparelshopping-->
</body>
</html>
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
$CAT_ID=$_POST['CAT_ID'];
$R_MSG=$_POST['R_MSG'];
$RATING=$_POST['RATING'];
$Date=$_POST['Date'];
$q4="update review set CAT_ID='$CAT_ID',R_MSG='$R_MSG',RATING='$RATING',Date='$Date' where RR_ID='$RR_ID'" ;
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