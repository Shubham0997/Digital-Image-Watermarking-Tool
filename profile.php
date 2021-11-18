<?php
session_start();
?>
<?php
$s="localhost";
$u="root";
$p="";
$db="userdb";
$c=mysqli_connect($s,$u,$p,$db);
$Y=$_SESSION['X'];
if(isset($_SESSION['X']))
{
	$q="select * from usertb where Username='$Y'";
	$r=mysqli_query($c,$q);
	if($r){
			while($w=mysqli_fetch_array($r))
	{
				?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Y ?>'s Profile</title>





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
              <div class="text-center"><center> <?php echo getProfilePicture($w['Name']);?> </center></div>
              <div class="text-center mt-3"> 
                  <h5 class="mt-2 mb-0"><?php echo $w['Name'];?></h5> 
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
                                    <?php echo $w['Name'];?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Username</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $Y; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $w['Email']; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $w['PhoneNumber']; ?>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Social Link #1</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="<?php echo $w['SocialLink1'];?>" target="_blank"><?php echo $w['SocialLink1'];?></a>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Social Link #2</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                       <a href="<?php echo $w['SocialLink2'];?>"  target="_blank" ><?php echo $w['SocialLink2'];?></a>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Other Information</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                    <?php echo $w['OtherInfo'];?>
                                    </div>
                                  </div>
                                  <hr>

                                </div>
                              </div>
                
                
                            </div>
                          </div>
                
                        </div>
                    </div>
                    
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <div class="buttons">   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-outline-secondary px-5" id="Button1" onclick="switchVisible(this.id);" data-toggle="collapse" data-target="#content1">Edit Details</button>
                   <button id="Button2" class="btn btn-outline-secondary px-5" onclick="switchVisible(this.id);" data-toggle="collapse" data-target="#content1">Encode</button>
                    <button id="Button3" class="btn btn-outline-secondary px-5" onclick="switchVisible(this.id);" data-toggle="collapse" data-target="#content1">Decode</button>
                     &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button class="btn btn-outline-secondary px-5"  onclick= "location.href='logout.php'" type="submit" value="Log Out">Log Out</button> </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php
    }
}
}
?>

<!-- Profile setting Start-->
<div id="Div1">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="row d-flex justify-content-center">
        <div class="card p-5 py-4">
        <div class="col-md-21 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="updateProfile.php" method="POST"   class="register-form" id="register-form">
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" id="phno" name="phno" class="form-control" placeholder="Enter Phone Number" value=""></div>
                    <div class="col-md-12"><label class="labels">Social Link #1</label><input type="text" name="SocialLink1" id="SocialLink1" class="form-control" placeholder="Social Link #1" value=""></div>
                    <div class="col-md-12"><label class="labels">Social Link #2</label><input type="text" name="SocialLink2" id="SocialLink2" class="form-control" placeholder="Social Link #2" value=""></div>
                    <div class="col-md-12"><label class="labels">Other Information</label>  <textarea id="w3review" name="others" id="others" class="form-control" placeholder="Enter other Information" value="" name="w3review" rows="4" cols="50"></textarea></div>

                </div>


                <div class="mt-5 text-center" ><button class="btn btn-secondary profile-button" type="submit" form="register-form" name="submit" id="submit" class="form-submit">Save Profile</button></div>
            </div>
            </form>
        </div>
</div>
</div>
    </div>
</div>
</div>

<!-- Profile setting End-->

<!--To encode part starts -->
<div id="Div2">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="row d-flex justify-content-center">
            <div class="card p-5 py-4">
        <div class="col-md-15 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">To Encode : </h4>
                </div>
                <form action="runit.php" method="post" enctype="multipart/form-data">

                <div class="row mt-3">
                    <div class="col-md-12" ><label class="labels">Select image to upload:</label><input type="file" name="fileToUpload" id="fileToUpload" class="form-control" value=""></div>
                </div>

                <div class="mt-5 text-center"><button class="btn btn-secondary profile-button" type="submit" value="Upload Image" name="submit1">Encode</button></div>
            </form>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</div>
<!--To encode part ends-->


<!--To Decode part starts -->
<div id="Div3">
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="row d-flex justify-content-center">
            <div class="card p-5 py-4">
        <div class="col-md-15 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Check Owner : </h4>
                </div>
                <form action="toDecrypt.php" method="post" enctype="multipart/form-data">

                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Select image to upload:</label><input type="file" name="fileToUpload" id="fileToUpload" class="form-control" value=""></div>
                </div>

                <div class="mt-5 text-center" ><button class="btn btn-secondary profile-button" type="submit" value="Upload Image" name="submit2">Decode</button></div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--To decode part ends-->




<script> 
  function switchVisible(thatId) {

      if (thatId === 'Button1') {
          document.getElementById('Div1').style.display = 'block';
          document.getElementById('Div2').style.display = 'none';
          document.getElementById('Div3').style.display = 'none';
      }
      else if (thatId === 'Button2') {
          document.getElementById('Div1').style.display = 'none';
          document.getElementById('Div2').style.display = 'block';
          document.getElementById('Div3').style.display = 'none';
      }
      else if (thatId === 'Button3') {
          document.getElementById('Div1').style.display = 'none';
          document.getElementById('Div2').style.display = 'none';
          document.getElementById('Div3').style.display = 'block';
      }
  }
</script>





</body>
</html>