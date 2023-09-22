<?php
include "A_User.php";
include "paras.php";
?>

	<link rel="stylesheet" type="text/css" href="style2.css">
		<link rel="stylesheet" type="text/css" href="A_Design1.css"/>
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
		<h2>Review And Ratings</h2>
	</div>

	<form method="post" action="#">
		<div class="input-group">
			<label>Product Name<span style="color:red;">*</label>
				<select name="PRO_ID">
			<?php
			$query="select * from product ";

           $r=mysqli_query($con,$query);
  while($row=mysqli_fetch_assoc($r))
{
?>
	<option value="<?php echo $row['PRO_ID'];?>"><?php echo $row['PRO_NAME'];?></option>
<?php
}
?></select>
		</div>

		<div class="row">
                <div class="col-sm-12 form-group">
                <label>How do you rate your overall experience?</label>
                <p>
                    <label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="bad" >
                    Bad
                    </label></p>

                    <p><label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="average" >
                    Average
                    </label></p>

                    <p><label class="radio-inline">
                    <input type="radio" name="experience" id="radio_experience" value="good" >
                    Good
                    </label></p>
                </p>
                </div>
           		<div class="input-group">
			<label>Message:</label>
			<textarea cols='50' rows='10' name="R_MSG"></textarea>
		</div>
<div class="input-group">
			<label>Date</label>
			<input type="date" name="Date">
		</div>

   	<button type="submit" style="background-color:green;width: 100px;" class="btn" name="btnsave">Submit</button>
   		<button type="Reset" style="background-color:red;width: 100px;" class="btn" name="btnsave">Reset</button>
	</form>
</body>
</html>
<?php 
 if(isset($_POST['btnsave']))
 {	
	$PRO_ID=$_POST['PRO_ID'];
	$R_MSG=$_POST['R_MSG'];
	$experience=$_POST['experience'];
	$Date=$_POST['Date'];

	$query="insert into review(PRO_ID,R_MSG,RATING,Date)values('$PRO_ID','$R_MSG','$experience','$Date')";
  	if(mysqli_query($con,$query))
  	{
  		echo "<script>alert('Rewiew added')</script>";
  	}
  	else
  	{
  		echo "<script>alert('Review failed to added')</script>";
  	}
}
  ?>