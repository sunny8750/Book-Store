<?php 
include "paras.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
=  <div class="panel-body">
<h2>Choose and Delete Selected Links</h2><p align="right"></p>
<td>
<table class="table table-bordered table-hover" width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td bgcolor="#FFFFFF">&nbsp;</td>
<td colspan="8" bgcolor="#FFFFFF"><strong>Delete multiple links</strong>
</tr>
<tr>
<td align="center" bgcolor="#FFFFFF"><strong>C_ID </strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>PASS</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>C_PASS</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>C_MOBILE</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>C_FNAME</strong></td>
<td align="center" bgcolor="#FFFFFF"><strong>C_SNAME</strong></td>
</tr>

 <?php 
 $query = "select * from regs";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>
<td bgcolor="#FFFFFF"><?php echo $row['C_ID']; ?></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="PASS" value="<?php echo $row['PASS']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="C_PASS" value="<?php echo $row['C_PASS']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="C_MOBILE" value="<?php echo $row['C_MOBILE']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="C_FNAME" value="<?php echo $row['C_FNAME']; ?>"></td>
<td bgcolor="#FFFFFF"><input class="form-control" type="text" class="txt" name="C_SNAME" value="<?php echo $row['C_SNAME']; ?>"></td>

<td><button  name="delete" type="submit" value="<?php echo $row['C_ID']; ?>">delete</button></td>
<td><button name="change" type="submit" value="<?php echo $row['C_ID']; ?>">edit</button></td>
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
<!-- ADD NEW CUSTOMERS-->

<?php 

if(isset($_POST['delete']))
{
    $del_id= $_POST['delete'];
    
    $q1 = "delete from payment where C_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='pay.php';</script>";
		}
		else
		{
		echo "id".$row['C_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$C_ID=$_POST['change'];	
$PASS=$_POST['PASS'];
$C_PASS=$_POST['C_PASS'];
$C_MOBILE=$_POST['C_MOBILE'];
$C_FNAME=$_POST['C_FNAME'];
$C_SNAME=$_POST['C_SNAME'];
$q4="update regs set PASS='$PASS', C_PASS='$C_PASS',C_MOBILE='$C_MOBILE',C_FNAME='C_FNAME',C_SNAME='$C_SNAME' where C_ID='$C_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='reg.php';</script>";
		}
		else
		{
		echo "id".$row['C_ID']." not updated</br>"; 

		}

}
?>