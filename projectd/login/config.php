<?php
    $conn = mysqli_connect("localhost" , "root" , "", "all");

    if($link === false){
         die("ERROR: " . mysqli_connect_error()); 
         }
?>