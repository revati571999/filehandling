<?php
if(isset($_POST['submit'])){
    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name'];
    if(!empty($tmp)){
        $dest="upload/";
        if (move_uploaded_file($tmp,$dest.$fname)) {
            echo "file uploaded succesufully";
        }
        else{
           echo "uploading error";
        }
    }
        
else {
            echo "plz select file";
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
    upload:<input type="file" name="att"><br>
    <input type="submit" value="submit" name="submit">

</form>
    </body>
</html>