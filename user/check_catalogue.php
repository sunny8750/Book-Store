<?php 
include "paras.php";
include "A_User.php";
$id=$_GET['id'];
?>
<form method="POST">
	<br>
<div class="input-group">
			<input type="text" name="PRO_NAME" style="width: 1000px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
				<button type="submit" style="background-color:green;width: 150px;border-radius: 10px;"  name="btnsearch">Search</button>
		</div><br><br>
<!-- <div class="input-group">
			<input type="text" name="PRO_NAME1" style="width: 350px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
			<input type="text" name="PRO_NAME2" style="width: 350px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
				<button type="submit" style="background-color:green;width: 150px;border-radius: 10px;"  name="btncompare">Compare</button>
		</div> -->

<?php 
$query="select * from product where CAT_ID='$id'";
if(isset($_POST['btnsearch']))
{
$PRO_NAME=$_POST['PRO_NAME'];
	if($PRO_NAME==null)
	{
		global $query;
	
	}
	else
	{
		global $query;
		$query="select * from product where CAT_ID='$id' and PRO_NAME='$PRO_NAME'";

	}
}

$r=mysqli_query($con,$query);
echo '<table width="">';
$i = 0; ?>
<?php
while($row=mysqli_fetch_assoc($r))
{
	 if ($i==0){
            echo '<tr>';
        }
	?>


	<form method="POST">

		<td style="text-align: center;">
			
				<a href="view.php?id2=<?php echo $row['PRO_ID'];?>">
			<input type="hidden" name="PRO_ID" value="<?php echo $row['PRO_ID']?>"/>
						<img src="<?php echo '../admin/'.$row['PRO_IMAGE1']?>" height="150" width="130"/><br/>
						<label name="P_size"><?php echo $row['PRO_NAME']?></label><br/><br/>
						<label name="P_size"><?php echo $row['Publisher']?></label><br/><br/>
						Price :<label name="P_size"><?php echo $row['PRO_PRICE']?></label><br/><br/>
							
</a>

<br/><br/><br/><br/>
</td>
</td>


<?php
if ($i>2){
            $i=0;
            echo '</tr>';
        };  
        $i++; 
?>

</form>
<?php 

}
?>