<?php
session_start();
?>
<?php
    if(isset($_SESSION['id']))
    {
    	session_destroy();
    	echo "<script>alert('Logout Sucessfuly');window.location='login.php';</script>";
    }
    	?>