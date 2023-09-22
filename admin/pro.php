<?php 
include "paras.php";
include "A_Header.php";
?>
<link href="A_Design.css" type="text/css" rel="stylesheet">

<div class="panel panel-default">
  <div class="panel-heading main-color-bg" >
    <h3 class="panel-title" style="color: white;"><center>Product's list</center>
    	<a href="product.php"> 

    		<input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: 0px; padding-bottom: : 0px;background: #368792; color: white;height: 40px;border-radius: 10px;"  type="button" onclick="product.php" name="addproduct" value="ADD PRODUCTS"></a> </h3>
  </div>

  <div class="panel-body">


<br/><br/>
<table class="table-format">

<tr>
<td class="thead">S.No </td>
<td class="thead">NAME </td>
<td class="thead">AUTHOR</td>
<td class="thead">PUBLISHER</td>
<td class="thead">PRICE</td>
<td class="thead">DIS_ID</td>

</tr>

 <?php 
 $query = "select * from product";
 $res=mysqli_query($con,$query);
 $i =0;
while($row = mysqli_fetch_assoc($res))
{
	$i++
?>
 <form name="form" method="POST" action="#">                           
<tr>

<td class="tdata"><?php echo $i; ?></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_NAME" style="width:80px;" value="<?php echo $row['PRO_NAME']; ?>" required></td>
<td class="tdata"><input  type="text" class="txt-format" name="Author" style="width:80px;" value="<?php echo $row['Author']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="Publisher" style="width:80px;" value="<?php echo $row['Publisher']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="PRO_PRICE" style="width:80px;" value="<?php echo $row['PRO_PRICE']; ?>"></td>
<td class="tdata"><input  type="text" class="txt-format" name="DIS_ID" style="width:80px;" value="<?php echo $row['DIS_ID']; ?>"></td>


<td><button  name="delete" type="submit" class="btndelete" value="<?php echo $row['PRO_ID']; ?>">Delete</button></td>
<td><button name="change" type="submit" class="btnedit" value="<?php echo $row['PRO_ID']; ?>">Edit</button></td>
</tr>
</form>
<?php
}
?>

<!-- ADD NEW PRODUCTS-->

<?php 

if(isset($_POST['delete']))
{
    $del_id = $_POST['delete'];
    
    $q1 = "delete from product where PRO_ID='$del_id'";
    $result = mysqli_query($con,$q1);
 if($result!=null)
		{
		echo "<script>alert('Record deleted');window.location='pro.php';</script>";
		}
		else
		{
		echo "id".$row['PRO_ID']." not deleted</br>"; 

		}

}
?>
<?php
if(isset($_POST['change']))
{
$PRO_ID=$_POST['change'];	
$PRO_NAME=$_POST['PRO_NAME'];
$Author=$_POST['Author'];
$Publisher=$_POST['Publisher'];
$PRO_PRICE=$_POST['PRO_PRICE'];
$DIS_ID=$_POST['DIS_ID'];

$q4="update product set PRO_NAME='$PRO_NAME',Author='$Author',PRO_BRAND='$PRO_BRAND',PRO_SIZE='$PRO_SIZE',PRO_PRICE='$PRO_PRICE',,DIS_ID='$DIS_ID'where PRO_ID='$PRO_ID'" ;
	$r=mysqli_query($con,$q4);
	 	if($r!=null)
		{
		echo "<script>alert('Record Updated');window.location='pro.php';</script>";
		}
		else
		{
		echo "id".$row['PRO_ID']." not updated</br>"; 

		}

}
?>