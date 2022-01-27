
<?php

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if (empty($email)|| empty($password)){
        echo "";
    }
    else{
        if (is_dir("user/".$email)) {
 echo "already ";
        }
        else{
            mkdir("user/".$email);
            mkdir("user/".$email."/".$password);
            echo "sucess";

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
         <input type="submit" value="subbmit" name="submit"/>
        </form>
    </body>
    </html>