<?php

    $r1=range(0,9);
    $r2=range(9,1);
    $r1rand=array_rand($r1);
    $r2rand=array_rand($r2);
    $pat=$r1rand."+".$r2rand."= ?";
    $sum=$r1rand+$r2rand;
    

?>