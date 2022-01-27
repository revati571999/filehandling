<?php 
include("cap.php");
 if(isset($_POST['sub'])){
   $email=$_POST['email'];
   $uname=$_POST['uname'];
   $password=$_POST['password'];
   $gender=@$_POST['gender'];
   $age=$_POST['age'];
   $tmp=$_FILES['att']['tmp_name'];
 
   if(!empty($email) && !empty($uname) && !empty($password) && !empty($gender) && !empty($age) && !empty($tmp))
   {
    if($_POST['cap']==$_POST['capsum'])
    {

    
    $fn=$_FILES['att']['name'];
     $ext=pathinfo($fn,PATHINFO_EXTENSION);
     $fname="image-".time()."-".rand().".$ext";
     if($ext=="jpg" || $ext=="png" || $ext=="jpeg"){
     if(is_dir("users/".$email)){
      $errMsg="Email is alredy exists";
     }
     else {
      $fo=fopen("users/$email/details.txt","r");
      $un=fgets($fo);
      if($un==$uname){
        $errMsg="User Name is alredy exists";
      }
      else {
          mkdir("users/$email");
          if(move_uploaded_file($tmp,"users/$email/$fname"))
          {
            $password=substr(sha1($password),0,10);
          file_put_contents("users/$email/details.txt","$uname \n $password \n $gender \n $age \n $fname");
          header("location:dashboard.php?uid=$email");
          }
          else {
            rmdir("users/$email");
            $errMsg="Uploading Error";
          }
      }
     }
    }
    else {
      $errMsg="Only Jpg and Png image supported";
    }
   }
   else {
    $errMsg="Enter valid captcha";
    }
}
   else {
     $errMsg="Plz fill the fields";
   }
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>register Page</title>
  </head>
  <body>
    <main>
        <header class="jumbotron">
            <h1 class="text-center">Register  Panel</h1>
        </header>
        <section class="container">
          <?php 
          if(!empty($errMsg)){
            ?>
      <div class="alert alert-danger"> <?php echo $errMsg;?></div>
            <?php
          }
          ?>
        <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="form-group">
    <label >Username</label>
    <input type="text" name="uname"class="form-control"  placeholder="Username" >
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  <div class="form-group">
    <label >Gender</label>
    <input type="radio"  name="gender" value="male"> Male
    <input type="radio"  name="gender" value="female"> Female
  </div>

 <div class="form-group">
    <label >Age</label>
    <input type="number" class="form-control" name="age" placeholder="Age">
  </div>
  <div class="form-group">
    <label >Image</label>
    <input type="file" class="form-control" name="att" >
  </div>
  <div class="form-group">
    <label >Capcha : <?php echo $pat;?></label>
    <input type="text" class="form-control" name="cap" >
    <input type="hidden" class="form-control" name="capsum" value="<?php echo $sum;?>">

  </div>
  <button type="submit" name="sub" class="btn btn-primary">Reister</button>
   
</form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>