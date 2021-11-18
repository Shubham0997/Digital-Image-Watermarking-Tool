<?php
session_start();
?>
<?php
$username=$_SESSION['X'];

?>


<?php

$target_dir = $username.'/Decryption/Decryption';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $newfilename='Encoded.jpg';
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$username/Decryption/" .$newfilename)) {



  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
<?php

chdir("G:/xampp/htdocs/Digital Watermarking Tool/$username/Decryption");

include "G:/xampp/htdocs/Digital Watermarking Tool/$username/Decryption/decryption.php";


//Decryption triple DES
require_once 'Crypt_openssl.php';
$hash='CE51E06875F7D964';
$crypt_openssl = new CryptOpenssl($hash);
$data=$last_line;
$result = $crypt_openssl->Decrypt($data);



//DES End here
$servername="localhost";
$uname="root";
$password="";
$db="userdb";
$con=mysqli_connect($servername,$uname,$password,$db);

$query="select * from usertb where Username='$result'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){ echo '<script>alert("Image already has a copyright"); window.history.back();</script>';

  unlink('decode.txt');  
}
else{
  
rename('decode.txt','Encoded.jpg');


chdir("G:/xampp/htdocs/Digital Watermarking Tool");
$source=$username.'/Decryption/Encoded.jpg';
$destination=$username.'/Encryption/image.jpg';
if( !copy($source, $destination) ) { 
  echo "File can't be copied! \n"; 
} 
else { 
  echo "File has been copied! \n"; 
} 
chdir("G:/xampp/htdocs/Digital Watermarking Tool/$username/Decryption");
//echo $username; 
unlink('Encoded.jpg');  
chdir("G:/xampp/htdocs/Digital Watermarking Tool/$username/Encryption");
  
  
include "G:/xampp/htdocs/Digital Watermarking Tool/$username/Encryption/copyScript.php";

$image = $username.'/Encryption/Encoded.jpg';

$filepath = $image;  


header("Location: $filepath");


  unlink('image.jpg'); 

  }
  ?>
  
  
  <?php
  
  




  


?>





