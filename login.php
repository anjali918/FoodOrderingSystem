<?php
session_start();
include('connect.php');
include('function.inc.php');
$username="";
$password="";
if(isset($_POST['submit'])){
	$email=($_POST['Email']);
	$password=($_POST['Password']);
	$sql="select * from user_info where Email='$email' and Password='$password'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['IS_LOGIN']='yes';
        $_SESSION['email']=$row['Email'];
        $_SESSION['userid']=$row['id'];
		redirect('index.php');
	}else{
	echo "<script> alert('Invalid Username Or Password');</script>";
    redirect('login.php');
	}
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login and Registration</title>
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
    <header>
        <a href="#" class="logo"><i class='bx bxs-home'></i>Yummy Tummy</a>
        <ul class="navlist">
            <li><a href="index.php" >Home</a></li>
           
            <li><a href="login.php" class="active">Login</a></li>
           
        </ul>
        <div class="nav-icons">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>

        </div>
    </header>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <div class="social-icons">
                    <img src="login/fb.png">
                    <img src="login/tw.png">
                    <img src="login/gp.png">
                </div>
                <form id="login" class="input-group" method="Post">
                    <input type="text" class="input-field" name="Email" placeholder="Email" required>
                    <input type="text" class="input-field" name="Password" placeholder="Enter Password" required>
                   
                    <button type="submit" name="submit" class="submit-btn">Log in</button>
                </form>
                <form id="register" class="input-group" method="Post" action="register.php" >
                    <input type="text" class="input-field"  name="fname" placeholder="FirstName "required>
                    <input type="text" class="input-field" name="lname" placeholder="LastName" required>
                    <input type="email" class="input-field" name="email" placeholder="Email" required>
                    <input type="password" class="input-field" name="password" placeholder="Enter Password" required>
                   
                    <button type="submit" class="submit-btn" name="regSubmit">Register</button>
                </form>
            </div>
        </div>
        <script>
            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");
            function register(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "110px";
            }
            function login(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }
        </script>
    </body>
</html>