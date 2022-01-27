<!DOCTYPE html>
<html>
<body>
    <h2>gallery</h2>
    <?php
    $sc=scandir("images");
    foreach ($sc as $c) {
        if($c!="."&& $c!=".."){
        echo $c."<img src='images/$c' width=300 height=300/>";
    }
}
?>
</body>
</html>