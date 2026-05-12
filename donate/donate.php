<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='donate.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    $conn = new mysqli("localhost" , "root" , "", "projectd");

    $r = $conn->query("SELECT * FROM newfund WHERE id ='$id'");

    $fund = mysqli_fetch_array($r, MYSQLI_ASSOC);

    $photoname = $fund["photo"];
    $imagepath = "../funds/fuploads/photos/".$photoname;

    $filename = $fund['filename'];
    $filepath = "../funds/fuploads/files/".$filename;
    if($_SESSION['userlogged']){
        if($conn === false){
            die("ERROR: " . mysqli_connect_error()); 
        }

        $username = $_SESSION['user'];

        

        $users = mysqli_query($conn,"SELECT * FROM signup WHERE username = '$username'");

        $user = mysqli_fetch_array($users, MYSQLI_ASSOC);
        
        if(isset($_POST['donate'])){
            $name = $user['name'];
            $username = $user['username'];
            $email = $user['email'];
            $organisation = $fund['organisation'];
            $amountraised = intval($_POST['raised']);

            $stmt = $conn->prepare("INSERT INTO transactions(name,username,email,organisation,amountraised) VALUES (?,?,?,?,?)");
            $stmt1 = $conn->prepare("UPDATE newfund SET amountraised = amountraised + ? WHERE organisation = ?");

            if($stmt === false){
                die('Preparation Failed');
            }

            $stmt->bind_param("ssssi",$name, $username , $email, $organisation, $amountraised);
            $stmt1->bind_param("is", $amountraised, $organisation);
    
            if($stmt->execute()&&$stmt1->execute()){
                echo "Donation Sucessful It will be ubdated in your Profile";
            }
            else{
                echo "Failed";
            }

            $stmt->close();
            $stmt1->close();
            $conn->close();
        }
    }
    $a = $fund['amount'];
    $ar = $fund['amountraised'];
    echo "<br>
    <div id='container'><div id='imgbox'><img src='$imagepath' height=512px width=512px></div><div id='info'>".$fund['organisation']."<br>".$fund['description']."<br>Email:".$fund['email']."<br>Phone Number:".$fund['phonenumber']."<br>Category:".$fund['category']."<br>Total Amount Needed:".$fund['amount']."<br>Amount Raised:".$fund['amountraised']."<br>Reamaining Amount Needed:".($fund['amount']-$fund['amountraised'])."<br><progress id='bar' value='$ar' max='$a'></progress><br>Created By:".$fund['username']."<br>"."</div><div id='fileinfo'><iframe src='$filepath' width='100%'></iframe></div><div id='form'>";
    if($_SESSION['userlogged']){
    echo "<form action='donate.php?id=$id' method='POST'><label>Amount You Want to Doante</label><br><br><input type='number' name='raised' min=1><br><br><button type=submit id='s' name='donate'>Donate</button></form>";
    }
    else{
        echo "Please Login Before Donating";
    }
    echo"</div></div>";
    ?>
    
</body>
</html>
