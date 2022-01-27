<?php
if(isset($_POST['submit'])){
    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name'];
    $dest="upload/";
    print_r($tmp);
   
    foreach($tmp as $ind=>$t)
    {  
        $extension=pathinfo($fname[$ind],PATHINFO_EXTENSION);
        $fn="attach-".rand()."-".time().".$extension";
        if (move_uploaded_file($t,$dest.$fn)) {
            echo "file uploaded succesufully";
        }
        else{
           echo "uploading error";
        }

    }





}
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title>uploading file</title>

    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
    upload:<input type="file" name="att[]" multiple><br>
    <input type="submit" value="submit" name="submit">

</form>
    </body>
</html>