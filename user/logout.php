<?php
session_start();
?>
<?php
    if(isset($_SESSION['Smobile']))
    {
    	session_destroy();
    	echo "<script>alert('Logout Sucessfuly');window.location='login.php';</script>";
    }

    
    	?>