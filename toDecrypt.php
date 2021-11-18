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

unlink('decode.txt'); 
//Decryption triple DES
require_once 'Crypt_openssl.php';
$hash='CE51E06875F7D964';
$crypt_openssl = new CryptOpenssl($hash);
$data=$last_line;
$result = $crypt_openssl->Decrypt($data);

CheckResult($result);

function CheckResult($result) {
  if ($result == "" || $result == false) {
      throw new Exception("{{ Invalid Data }}");
  }
}

//DES End here
$servername="localhost";
$username="root";
$password="";
$db="userdb";
$con=mysqli_connect($servername,$username,$password,$db);

$query="select * from usertb where Username='$result'";
$result=mysqli_query($con,$query);
?>
<br>
<?php
while($row = $result->fetch_assoc()) {
  //echo  "Name: " . $row["Name"]. "<br>"."Username: " . $row["Username"]. "<br>". "Email:". $row["Email"]. "<br>". "Phone Number:". $row["PhoneNumber"]. "<br>". "Social Link #1:". $row["SocialLink1"]. "<br>". "Social Link #2:". $row["SocialLink2"]. "<br>". "Other Information:". $row["OtherInfo"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner's Profile</title>





    <style>
  .profile-pic{
    background: darkgrey;
    color: #eeeeee;
    border-radius: 40%;
    height: 100px;
    width: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 2.1rem;
    -webkit-box-shadow: 0 5px 10px rgb(105 105 105);
    box-shadow: 0 5px 10px rgb(105 105 105);
  }

  .ProfileInfo{
    border: 5px outset red;
  background-color: lightblue;
  text-align: center;

  }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  
  <style>
body {
    background: rgb(105, 105, 105)
}
.card {
    border: none;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer
}

.card:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 100%;
    background-color: #DCDCDC;
    transform: scaleY(1);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 40px;
    height: 100%;
    background-color: #A9A9A9;
    transform: scaleY(0);
    transition: all 0.5s;
    transform-origin: bottom
}

.card:hover::after {
    transform: scaleY(1)
}

.fonts {
    font-size: 11px
}

.social-list {
    display: flex;
    list-style: none;
    justify-content: center;
    padding: 0
}

.social-list li {
    padding: 10px;
    color: #808080;
    font-size: 19px
}

.buttons button:nth-child(1) {
    border: 1px solid #808080 !important;
    color: #808080;
    height: 40px
}

.buttons button:nth-child(1):hover {
    border: 1px solid #808080 !important;
    color: #fff;
    height: 40px;
    background-color: #808080
}

.buttons button:nth-child(2) {
    border: 1px solid #808080 !important;
    color: #808080;
    height: 40px
}

.buttons button:nth-child(2):hover {
    border: 1px solid #808080 !important;
    color: #fff;
    height: 40px;
    background-color: #808080
}
.buttons button:nth-child(3) {
    border: 1px solid #808080 !important;
    color: #808080;
    height: 40px
}

.buttons button:nth-child(3):hover {
    border: 1px solid #808080 !important;
    color: #fff;
    height: 40px;
    background-color: #808080
}


.buttons button:nth-child(4) {
    border: 1px solid #808080 !important;
    background-color: #808080;
    color: #fff;
    height: 40px
}


.form-control:focus {
    box-shadow: none;
    border-color: #808080
}

.profile-button {
    background: rgb(169, 169, 169);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #808080;
}

.profile-button:focus {
    background: #808080;
    box-shadow: none
}

.profile-button:active {
    background: #808080;
    box-shadow: none
}

.back:hover {
    color: #808080;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #808080;
    color: #fff;
    cursor: pointer;
    border: solid 1px #808080
}

#Div1{
            display: none;
        } 
#Div2 {
            display: none;
        }
#Div3 {
            display: none;
        }
  </style>
</head>
<body>
<?php
function getProfilePicture($name){
  $name_slice = explode(' ',$name);
    $name_slice = array_filter($name_slice);
    $initials = '';
  $initials .= (isset($name_slice[0][0]))?strtoupper($name_slice[0][0]):'';
  $initials .= (isset($name_slice[count($name_slice)-1][0]))?strtoupper($name_slice[count($name_slice)-1][0]):'';
  return '<div class="profile-pic">'.$initials.'</div>';
}
?>

<div class="container mt-5">
  <div class="row d-flex justify-content-center">
      <div class="col-md-13">
          <div class="card p-3 py-4">
              <div class="text-center"><center> <?php echo getProfilePicture($row['Name']);?> </center></div>
              <div class="text-center mt-3"> 
                  <h5 class="mt-2 mb-0"><?php echo $row['Name'];?></h5> 
                  <div class="container">
                    <div class="main-body">
                          <div class="row gutters-sm"  style="width:900px; margin:0 auto;">
                            <div class="col-md-15">
                              <div class="card mb-3">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">  Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $row['Name'];?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $row['Username']; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $row['Email']; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $row['PhoneNumber']; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Social Link #1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="<?php echo $row['SocialLink1'];?>" target="_blank"><?php echo $row['SocialLink1'];?></a>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Social Link #2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <a href="<?php echo $row['SocialLink2'];?>"  target="_blank" ><?php echo $row['SocialLink2'];?></a>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Other Information</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $row['OtherInfo'];?>
                                    </div>
                                  </div>
                                  <hr>

                                </div>
                              </div>
                
                
                            </div>
                          </div>
                
                        </div>
                    </div>
                    
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <div class="buttons">   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-outline-secondary px-5" id="Button1" data-toggle="collapse" data-target="#content1" onclick="goBack()">Go Back</button>
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-outline-secondary px-5"  onclick= "location.href='logout.php'" type="submit" value="Log Out">Log Out</button> </div>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
function goBack() {
  window.history.back();
}
</script>
<?php

}
?>

