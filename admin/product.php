<?php
include "A_Header.php";
include "footer.php";
?>

	<link rel="stylesheet" type="text/css" href="style1.css">
		<link rel="stylesheet" type="text/css" href="A_Design.css"/>
	

	<div class="header">
		<h2>Upload Products</h2>
	</div>
	<div>
	<a href="pro.php"> <input class="btn btn-primary btn-sm" align="right" style="float: right;margin-top: -120px; padding-bottom: : 0px;"  type="button" name="addproduct" value="VIEW LIST"></a>	
</div>
		<form method="post" action="product.php" enctype="multipart/form-data">
			<div class="input-group">
			<label>Product Name<span style="color:red;">*</label>
			<input type="text" name="PRO_NAME" value="">
		</div>
		<div class="input-group">
			<label>Catalogue Name<span style="color:red;">*</label>
				<select name="CAT_ID" class="txt-form">
			<?php
			$query="select * from catalogue ";

           $r=mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($r))
{
?>
	<option value="<?php echo $row['CAT_ID'];?>"><?php echo $row['CAT_NAME'];?></option>
<?php
}
?></select>
		</div>
			<div class="input-group">
			<label>Author</label>
			<input type="text" name="Author" value="">
		</div>
			<div class="input-group">
			<label>Publisher</label>
			<input type="text" name="Publisher" value="">
		</div>
			<!-- <div class="input-group">
			<label>Product Size</label>
			<input type="number" name="PRO_SIZE">
		</div> -->
			<div class="input-group">
			<label>Product Price<span style="color:red;">*</label>
			<input type="text" name="PRO_PRICE" >
		</div>
			<div class="input-group">
			<label>Product Qty</label>
			<input type="text" name="PRO_Qty">
		</div>
		
			
		<div class="input-group">
			<label>Discount<span style="color:red;">*</label>
				<select name="DIS_ID" class="txt-form">
			<?php
			$query="select * from discount";

           $r=mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($r))
{
?>
	<option value="<?php echo $row['DIS_ID'];?>"><?php echo $row['PERC_D'];?></option>
<?php
}
?></select>
		</div>

			<div>
			<label>Product Image1<span style="color:red;">*</label>
			<input type="file" name="PRO_IMAGE1" />
		</div>
			<div>
			<label>Product Image2<span style="color:red;">*</span></label>
			<input type="file" name="PRO_IMAGE2" />
		</div>
	<div class="input-group">
			<br/>
			<button type="submit" style="background-color:green;width: 150px;" class="btn" name="btnsave">Submit</button>
			<button type="Reset" style="background-color:red;width: 150px;" class="btn" >Reset</button>
		</div>


	</form>

<?php 
 if(isset($_POST['btnsave']))
 {	
	$PRO_NAME=$_POST['PRO_NAME'];
	$CAT_ID=$_POST['CAT_ID'];
	$Author=$_POST['Author'];
	$Publisher=$_POST['Publisher'];
	$PRO_PRICE=$_POST['PRO_PRICE'];
	$PRO_Qty=$_POST['PRO_Qty'];

	$DIS_ID=$_POST['DIS_ID'];
    $p="Product/";
	$p1="Product/";
	$p=$p.basename($_FILES["PRO_IMAGE1"]["name"]);
     move_uploaded_file($_FILES["PRO_IMAGE1"]["tmp_name"],$p);

	$p1=$p1.basename($_FILES["PRO_IMAGE2"]["name"]);
	move_uploaded_file($_FILES["PRO_IMAGE2"]["tmp_name"],$p1);
	
	
	$query="insert into product(PRO_NAME,CAT_ID,Author,Publisher,PRO_PRICE,PRO_Qty,DIS_ID,PRO_IMAGE1,PRO_IMAGE2) values('$PRO_NAME','$CAT_ID','$Author','$Publisher','$PRO_PRICE','$PRO_Qty','$DIS_ID','"."Product/" . $_FILES["PRO_IMAGE1"]["name"]."','"."Product/" . $_FILES["PRO_IMAGE2"]["name"]."')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('product added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('product failed to added')</script>";
  	}
}
  ?>
