<?php
session_start();

$Y=$_SESSION['X'];
echo $Y;
?>

<?php

$servername="localhost";
$username="root";
$password="";
$db="userdb";
$con=mysqli_connect($servername,$username,$password,$db);
if(isset($_REQUEST['submit']))

{

$ph=$_POST['phno'];
$SocialLink1=$_POST['SocialLink1'];
$SocialLink2=$_POST['SocialLink2'];
$oth=$_POST['others'];

$q= "UPDATE usertb SET PhoneNumber='$ph', SocialLink1='$SocialLink1', SocialLink2='$SocialLink2', OtherInfo='$oth' WHERE Username='$Y'";
if($r=mysqli_query($con,$q)){

}
echo '<script>location.reload();</script>';
}

?>
<?php

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>