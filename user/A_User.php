<?php
session_start();
?>
<?php
include "footer.php";
include "paras.php";
?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="A_Design1.css"/>
	<title></title>
 <style type="text/css">

body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
 </style>
 <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>   
</head>
<body>

	<!--<div class="f_DIV1" style="height:60px;">-->
        <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <?php 
  $query1="select * from catalogue";
  $r=mysqli_query($con,$query1);
  while($row=mysqli_fetch_assoc($r))
  {
   ?>
   <!-- <<a href="">home</a> -->
  <a href="check_catalogue.php?id=<?php echo $row['CAT_ID']; ?>" ><?php echo $row['CAT_NAME']; ?></a>
  <?php 
    }
   ?>
</div>
		<ul width="100%">
            <li><span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776;</span>
</li>
		<!--	<li style="width: 290px; height:40px;"><p style="background-color:black;color:white;font-family: cookie"><b><i>OnlineApparelStore.com</b></i></p></li>-->
		
</ul>
<ul>
  <div class="f_DIV1" style="height:60px;">

<?php
    if(isset($_SESSION['Smobile']))
    {?>

        <li><a href="index.php" class="menu-btn">Home</a></li>
        <li><a href="cart.php" class="menu-btn">Show Cart</a></li>
        <li><a href="Refund.php" class="menu-btn">Refund</a></li>
        <li><a href="review1.php" class="menu-btn">Review</a></li>
        <li><a href="cont.php" class="menu-btn">Contact Us</a></li>
        <li><a href="logout.php" class="menu-btn">Logout</a></li>


            
    <?php
    }
    else
    {?>

         <li><a href="index.php" class="menu-btn">Home</a></li>
         <li><a href="register.php" class="menu-btn">Register</a></li>
         <li><a href="login.php" class="menu-btn">Login</a></li>
 <?php
    }  
    ?>
   


<li>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="#" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="apparel/images/shop.jpeg">
    </div>

    <div class="container">
      <label for="C_MOBILE"><b>Customer's Mobile No.</b></label>
      <input type="text" placeholder="Enter Customer Mobile No." name="C_MOBILE" required>

      <label for="PASS"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="PASS" required>
        
      <button type="submit" name="btnsave">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="PASS">Forgot <a href="#">password?</a></span>
    </div>
  </form>

  
</div></li>
   </ul>
 </li>
<!-- <li><a href="register.php" class="btn_des">Register</a></li>
<li><a href="mlogin.php" class="btn_des">Login</a></li> -->
</div>
		<!--<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
    float: right;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}
.btnsearch{
    background-color: white;
    color: black;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
</style>
<form class="example" action="#" style="margin:auto;max-width:300px">
  <input type="search" placeholder="Search.." name="search"/>
  <input class="btnsearch" type="submit" value="&#128269"/>
</form>-->
<!--	<img src="app.jpg" height="800px" width="100%" />-->
    
</body>
</html>