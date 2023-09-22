<?php
include "paras.php";
include "A_User.php";
?>

<br/><br/>
<div id="section5" style="margin-left: 10%;">


<br/>
<hr style="margin-right:110px;" />

<?php
$query="select t.Trolley_id,t.PRO_ID,t.Total_AMT,t.PRO_QUANTITY,p.PRO_ID,p.PRO_NAME,p.PRO_IMAGE1,p.PRO_IMAGE2,p.PRO_PRICE from  trolley t join  product p on t.PRO_ID=p.PRO_ID";
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
			<input type="hidden" name="Trolley_id" value="<?php echo $row['Trolley_id']?>"/>
			<input type="hidden" name="PRO_ID" value="<?php echo $row['PRO_ID']?>"/>
						<img src="<?php echo '../admin/'.$row['PRO_IMAGE1']?>" height="150" width="130"/><br>
						Book Price :- <label name="P_size"><?php echo $row['PRO_PRICE']?></label><br/><br/>
						Qty :- <label name="P_size"><?php echo $row['PRO_QUANTITY']?></label><br/><br/>
						With Discount  :- <label name="P_size"><?php echo $row['Total_AMT']?></label><br/><br/>
							


<a href="payment.php?Trolley_id=<?php echo $row['Trolley_id']; ?>&PRO_ID=<?php echo $row['PRO_ID'];?>&Total_AMT=<?php echo $row['Total_AMT'];?>">
			Buy Now			
			</a>

<button   name="btndelete" style="background-color: red;" value="<?php echo $row['Trolley_id'];?>">
			Remove
	</button>


<br/><br/><br/><br/>
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
<?php
if(isset($_POST['btnbuy']))
{
		$s=$_POST['btndelete'];

}

?>

<?php
if(isset($_POST['btndelete']))
{
		$s=$_POST['btndelete'];

$q="delete from trolley where Trolley_id='".$s."' ";
if(mysqli_query($con,$q))
{
	
	echo "<script>alert('Record Deleted');window.location='cart.php'</script>";
}
else
{
	echo "<script>alert('Could not Delete');window.location='cart.php'</script>";
}

}

?>
