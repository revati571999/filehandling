<?php
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($email)){

        echo"required";
    }
    else{
        if(is_dir("user/".$email)){
            echo"already exist";
            
        }
        else{
            mkdir("user/".$email);
            $fo=fopen("user/".$email."/details.txt","w");
            fwrite($fo,$password."\n");
        }
    }
    }
    ?>
  <!DOCTYPE html>
<html>
    
<body>
        <form method="post">
         email : <input type="email" name="email"/> <br/>
       password : <input type="password" name="password"/><br/>
       <label for="quantity">Age:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="2">
         <input type="submit" value="submit" name="submit"/>
        </form>
    </body>
    </html>