<?php

$name=$_POST['name'];
$uname=$_POST['username'];
$em=$_POST['email'];
$pass=$_POST['password'];



require_once 'Crypt_openssl.php';

$hash='CE51E06875F7D964';

$crypt_openssl = new CryptOpenssl($hash);
$data=$uname;

$result = $crypt_openssl->Encrypt($data);

CheckResult($result);


function CheckResult($result) {
  if ($result == "" || $result == false) {
      throw new Exception("{{ Invalid Data }}");
  }
}


$spaces="



";


$file_to_write = 'encode.txt';

$uniqueCode=$result;

$content_to_write =$spaces.$uniqueCode;
echo $content_to_write;

$dir =$uname;

if( is_dir($dir) === false )
{
    mkdir($dir);
    chdir("G:/xampp/htdocs/Digital Watermarking Tool/$dir");
    mkdir('Encryption');
    $file = fopen('Encryption/' .$file_to_write,"w");
    fwrite($file, $content_to_write);
    fclose($file);

    chdir("G:/xampp/htdocs/Digital Watermarking Tool");
    $srcfile = 'G:/xampp/htdocs/Digital Watermarking Tool/copyScript.php';
    $destfile = $dir.'/Encryption/copyScript.php';
    copy($srcfile, $destfile);


   
    chdir("G:/xampp/htdocs/Digital Watermarking Tool/$dir");
    mkdir('Decryption');

    chdir("G:/xampp/htdocs/Digital Watermarking Tool");
    $srcfile = 'G:/xampp/htdocs/Digital Watermarking Tool/decryption.php';
    $destfile = $dir.'/Decryption/decryption.php';
    copy($srcfile, $destfile);

}





$servername="localhost";
$username="root";
$password="";
$db="userdb";
$con=mysqli_connect($servername,$username,$password,$db);

$query="select * from usertb where Username='$uname'";
if($result=mysqli_query($con,$query)){
    if(mysqli_num_rows($result)>0){ echo '<script>alert("Username Already Exists")</script>';}
    else{
      $q="insert into usertb(Name,Username,Email,Password) values ('$name','$uname','$em','$pass')";
      if($r=mysqli_query($con,$q)){
        echo "<script type='text/javascript'>alert('Account created successfully, Please Sign In.');location='Sign_In.php';</script>";  
      }
  
  }
  
  }




?>