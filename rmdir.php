




<?php

if(file_exists("revati.txt"))
{
    
    $fo=fopen("abc.txt","r");
    echo fread($fo,filesize('revati.txt'));
}
else{
    $fo=fopen("abc.txt","w");
    fwrite($fo,"hhhhh");
    echo"created";
}


?>