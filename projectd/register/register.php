<?php

$photo = $_POST['photo'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost" , "root" , "", "projectd");

if($conn->connect_error){
    die('Connection Error');
}
else{
    $stmt = $conn->prepare("INSERT INTO signup(photo,name,username,email,password) VALUES (?,?,?,?,?)");
    if($stmt === false){
        die('Preparation Failed');
    }

    $stmt->bind_param("bssss", $photo, $name, $username, $email, $password);
    
    if($stmt->execute()){
        echo "Success";
    }
    else{
        echo "Failed";
    }

    $stmt->close();
    $conn->close();
}
?>