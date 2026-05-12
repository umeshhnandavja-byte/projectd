<?php

$photoname = $_FILES["photo"]["name"];
$ext = pathinfo($photoname, PATHINFO_EXTENSION);
$allow = array("jpg","jpeg","gif","png");
$name = $_POST['ename'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordhash = password_hash($password, PASSWORD_DEFAULT);
$tempname = $_FILES['photo']['tmp_name'];
$uploadname = $name.".".$ext;
$target = "../uploads/".$uploadname;

$conn = new mysqli("localhost" , "root" , "", "projectd");

$stmt = $conn->prepare("SELECT id FROM signup WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
        echo "UserName Already Taken Try Another UserName";
    } else {

if(in_array($ext, $allow)){
    if(move_uploaded_file($tempname, $target)){
    if($conn->connect_error){
    die('Connection Error');
}
else{
    $stmt = $conn->prepare("INSERT INTO signup(photo,name,username,email,password) VALUES (?,?,?,?,?)");
    if($stmt === false){
        die('Preparation Failed');
    }

    $stmt->bind_param("sssss", $uploadname, $name, $username, $email, $passwordhash);
    
    if($stmt->execute()){
        echo "Success";
    }
    else{
        echo "Failed";
    }

    $stmt->close();
    $conn->close();
}
    }
    else{
        echo "Photo Not Uploaded";
    }
}
else{
    echo "Photo Type Not Allowed";
}
}
?>