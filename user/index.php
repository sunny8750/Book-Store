<?php 
include "paras.php";
include "A_User.php";
include "draw.php";

?>
<style>
	.card{
		background-color:#8c8f8cdd;
		color:white;
	}
	a{
		text-decoration:none;
	}
	img{
        padding-top:5px;
	}
</style>
<form method="POST">

<div class="input-group">
			
			<input type="text" name="PRO_NAME" style="width: 1000px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
				<button type="submit" style="background-color:green;width: 150px;border-radius: 10px;"  name="btnsearch">Search</button>
		</div>
		<!-- <div class="input-group">
			
			<input type="text" name="PRO_NAME1" style="width: 350px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
			<input type="text" name="PRO_NAME2" style="width: 350px;margin-left: 2%;border-radius: 10px;" placeholder=" Product Name" value=""/>
				<button type="submit" style="background-color:green;width: 150px;border-radius: 10px;"  name="btncompare">Compare</button>
		</div> -->

<?php 
$query="select * from product";
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
		$query="select * from product where PRO_NAME='$PRO_NAME'";

	}
}

$r=mysqli_query($con,$query);
echo '<table width="100%">';
$i = 0; ?>

<?php
while($row=mysqli_fetch_assoc($r))
{
	 if ($i==0){
            echo '<tr>';
        }
	?>


		<td style="text-align: center;">
			
				<a href="view.php?id2=<?php echo $row['PRO_ID'];?>">
				<div class="card">
			<input type="hidden" name="PRO_ID" value="<?php echo $row['PRO_ID']?>"/>
						<img src="<?php echo '../admin/'.$row['PRO_IMAGE1']?>" height="200" width="170"/><br/>
						
						<p name="P_size"><?php echo $row['PRO_NAME']?></p>
						 <p name="P_size"><?php echo $row['Publisher']?></p>
						 <p name="P_size">Price :-<?php echo $row['PRO_PRICE']?></p>
						</div>	
</a>

<hr/>
		</td>


<?php
if ($i>2){
            $i=0;
            echo '</tr>';
        };  
        $i++; 
?>

<?php 

}
?>