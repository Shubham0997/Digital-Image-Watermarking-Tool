<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In | Digital Image Watermarking</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="Username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="Username" id="Userame" placeholder="Userame"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>

                            <div class="form-group form-button">
                                <input type="submit" name="sel" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <?php
$s="localhost";
$u="root";
$p="";
$db="userdb";
$c=mysqli_connect($s,$u,$p,$db);
if(!$c)
{
	mysqli_error($c);
}
if(isset($_REQUEST['sel']))
{
	$n=$_POST['Username'];
	$m=$_POST['password'];
	$q="select * from usertb where Username='$n' AND Password='$m'";
	$r=mysqli_query($c,$q);
	$rowcount=mysqli_num_rows($r);
	if($rowcount>0)
	{
	$_SESSION['X']=$n;
	header('location:profile.php');
	}
	else{
		echo '<script>alert("Username or Password incorrect")</script>';
		}
}
	?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>