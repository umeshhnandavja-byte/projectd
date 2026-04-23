<?php

$organisation = $_POST['organisation'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];

$conn = new mysqli("localhost" , "root" , "", "projectd");

if($conn->connect_error){
    die('Connection Error');
}
else{
    $stmt = $conn->prepare("INSERT INTO newfund(organisation,phonenumber,email) VALUES (?,?,?)");
    if($stmt === false){
        die('Preparation Failed');
    }

    $stmt->bind_param("sss", $organisation, $phonenumber, $email);
    
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