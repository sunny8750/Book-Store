<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Catalogue's list</center>
    	<a href="catalogue.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="catalogue.php" name="addcatalogue" value="ADD CATALOGUE"></a> </h3>
  </div>

  <div class="panel-body">
<br/><br/>
<table class="table-format">

<tr>
<td class="thead">Sr. No. </td>
<td class="thead">Name</td>
<td class="thead"> Description</td>
</tr>

 <?php 
 $query = "select * from catalogue";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $row['CAT_ID']; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="CAT_NAME" style="width:200px;" value="<?php echo $row['CAT_NAME']; ?>" required></td>
<td class="tdata"><input  type="text" class="txt-format" name="CAT_DESC" style="width:500px;"value="<?php echo $row['CAT_DESC']; ?>"></td>
<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['CAT_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['CAT_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>


<!-- ADD NEW CATALOGUES-->

<?php 

if(isset($_POST['delete']))
{
    $id=$_POST['delete'];
    $q1 ="delete from catalogue where CAT_ID='$id'";
    $result=mysqli_query($con,$q1);
    if($result!=null)
		{
		
		echo "<script>alert('Record deleted');window.location='cat.php';</script>";
	}
		else
		{
		echo "id".$id." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$CAT_ID=$_POST['change'];	
$CAT_NAME=$_POST['CAT_NAME'];
$CAT_DESC=$_POST['CAT_DESC'];
$q4="update catalogue set CAT_NAME='$CAT_NAME', CAT_DESC='$CAT_DESC' where CAT_ID='$CAT_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='cat.php';</script>";
		}
		else
		{
		echo "id".$row['CAT_ID']." not updated</br>"; 

		}

}
?>