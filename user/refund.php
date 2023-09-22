<?php 
include "paras.php";
include "A_User.php";
?>
<link href="A_Design1.css" type="text/css" rel="stylesheet">
<link href="style2.css" type="text/css" rel="stylesheet">
	<style>
		.header {
			background: #003366;
		}
		button[name=To Pay_btn] {
			background: #003366;
		}

		.txt-form
{
		width: 340px;
		 height: 30px;
		 border-radius: 5px;
}
	</style>

	<div class="header">
		<h2>Payment</h2>
	</div>
	
 <form name="form" method="POST" >      

<div class="input-group">
			<label>Payment ID<span style="color:red;">*</label>
			<select name="PAY_ID" style="width:95%;height:40px;">
				<option value="">--- Select ---</option>
				<?php

				$mob=$_SESSION['Smobile'];
				 $query = "select p.PAY_ID,p.Trolley_id,t.Trolley_id,t.C_MOBILE from payment p join trolley t on p.Trolley_id=t.Trolley_id where t.C_MOBILE='$mob'";
 $res=mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($res))
{
					   echo "<option value='".$row['PAY_ID']."'>".$row['PAY_ID']."</option>";
					}
			?>
			
			</select>
		</div>
		<div class="input-group">
			<label>Reason<span style="color:red;">*</label>
			<input  type="text" class="txt-format"  placeholder="Reason"  name="R_RSN" style="width: 350px;height: 80px;">
		</div>
		<div class="input-group">
		<button name="btnsave" type="submit" class="btnedit" style="height: 40px;">Refund</button>
		</div>
		
		

	</td>


<td class="tdata"></td>

<td></td>
</tr>
</form>



 <?php 
 if(isset($_POST['btnsave']))
 {	

	$PAY_ID=$_POST['PAY_ID'];
	$R_RSN=$_POST['R_RSN'];

	$DATE=date('Y-m-d');
	$C_MOBILE=$_SESSION['Smobile'];
	
	$query="insert into refund(PAY_ID,R_RSN,DATE,C_MOBILE) values('$PAY_ID','$R_RSN','$DATE','$C_MOBILE')";
  	if(mysqli_query($con,$query))
  	{
  		
  		echo "<script>alert('Product Refunded');window.location='A_User.php';</script>";
  	}
  	else
  	{
  		echo "<script>alert('Could not completed')</script>";
  	}
}

  ?>