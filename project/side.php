

<?php 
// session values to get email and user name
error_reporting(0);
$email=$_SESSION['sid'];
$user=$_SESSION['sid'];

$fo=fopen("users/".$email."/details.txt","r");
$uname=trim(fgets($fo)); // Name
fgets($fo); //password
$gender=trim(fgets($fo)); // gender
$age=trim(fgets($fo)); //age
$img=trim(fgets($fo)); // ProfileName
$imgpath="users/$email/$img";
?>

<div class="card" style="width: 18rem;">
<!-- print image -->
  <img src="<?php echo $imgpath ;?>" height="250px" width="100%" class="card-img-top" alt="Profile Photo">
  <div class="card-body">
    <!-- print username -->
    <h5 class="card-title"><?php echo $user;?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <!-- print details -->
    <li class="list-group-item">Name : <?php echo $uname;?></li>
    <li class="list-group-item">Age : <?php echo $age;?></li>
    <li class="list-group-item">Gender : <?php echo $gender;?></li>
  </ul>
  <div class="card-body">
    <a href="?con=changeimage" class="card-link">Change Image</a>
  </div>
</div>
<div>
  
</div>