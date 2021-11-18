<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="POST" >
               

               <div class="row form-group">
                   
                   <div class="col-md-12">
                     <label class="text-black" for="Username">Username</label> 
                     <input type="Username" name="Username" class="form-control" required>
                   </div>
                 </div>
 
                 <div class="row form-group">
                   
                   <div class="col-md-12">
                     <label class="text-black" for="Password">Password</label> 
                     <input type="Password" name="Password" class="form-control"required>
                   </div>
                 </div>
 
                 <div class="row form-group">
                   <div class="col-md-12">
                     <input type="Submit" name="sel" value="Sign In" class="btn btn-primary py-2 px-4 text-white">
                   </div>
                 </div>
 
     
               </form>


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
	$m=$_POST['Password'];
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
    
</body>
</html>