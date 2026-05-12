<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 

session_start();
$username = $_SESSION["user"];
$photoname = $_FILES["photo"]["name"];
$ext = pathinfo($photoname, PATHINFO_EXTENSION);
$allow = array("jpg","jpeg","gif","png");
$organisation = $_POST['organisation'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$category = $_POST['category'];
$description = $_POST['description'];
$filename = $_FILES['doc']['name'];
$amount = $_POST['amount'];
$tempfname = $_FILES['doc']['tmp_name'];
$fext = pathinfo($filename, PATHINFO_EXTENSION);
$fuploadname = $organisation.".".$fext;
$ftarget = "../funds/fuploads/files/".$fuploadname;
$tempname = $_FILES['photo']['tmp_name'];
$uploadname = $organisation.".".$ext;
$target = "../funds/fuploads/photos/".$uploadname;

$conn = new mysqli("localhost" , "root" , "", "projectd");

$stmt = $conn->prepare("SELECT id FROM newfund WHERE organisation = ?");
$stmt->bind_param("s", $_POST["organisation"]);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
        echo "Organisation Name Already Taken Try Other Name";
    } else {

if(in_array($ext, $allow)){
    if(move_uploaded_file($tempname, $target)){
        if(move_uploaded_file($tempfname, $ftarget)){
if($conn->connect_error){
    die('Connection Error');
}
else{
    $stmt = $conn->prepare("INSERT INTO newfund(photo,username,organisation,phonenumber,email,category,description,filename,amount) VALUES (?,?,?,?,?,?,?,?,?)");
    if($stmt === false){
        die('Preparation Failed');
    }

    $stmt->bind_param("ssssssssi",$uploadname,$username ,$organisation, $phonenumber, $email,$category,$description,$fuploadname,$amount);
    
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
        echo "File Not Uploaded";
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
