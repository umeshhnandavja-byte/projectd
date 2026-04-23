<?php
    session_start();
    echo $_SESSION["user"];
    $username = $_SESSION["user"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="/projectd/letter-d.png">
    <link rel='stylesheet' href='/projectd/main.css'>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <nav class="navbar">
        <ul class="open">
            <li><a href="/projectd" class="homenav">Home <img src="/projectd/home.png"></a></li>
            <li><a href="/projectd/newfund">Apply <img src="/projectd/apply.png"></a></li>
            <li><a href="/projectd/about" class="aboutnav">About <img src="/projectd/information-button.png"></a></li>
            <?php
            if($_SESSION['user']=='admin'){
                echo "<li><a href='adminpanel' class='servicesnav'>AdminPanel<img src='/projectd/services.png'></a></li>";
            }
                if(!$_SESSION['userlogged']){
                    echo"<li><a href='/projectd/login' class='loginnav'>Login<img src='/projectd/log-in.png'></a></li>";
                }
                else{

                }
            ?>
        </ul>
    </nav>

    <?php
    if($_SESSION["userlogged"]){

        $conn = new mysqli("localhost" , "root" , "", "projectd");

        if($conn === false){
            die("ERROR: " . mysqli_connect_error()); 
        }

        $r = $conn->query("SELECT * FROM signup");
        $r1 = $conn->query("SELECT * FROM newfund WHERE username='$username'");
        $r2 = $conn->query("SELECT * FROM transactions WHERE username='$username'");

        $users = mysqli_query($conn,"SELECT * FROM signup WHERE username = '$username'");

        $user = mysqli_fetch_array($users, MYSQLI_ASSOC);


        $photoname = $user["photo"];
        $imagepath = "../uploads/".$photoname;

        echo "
        <a href='/projectd/logout.php'>logout</a>
        <div id='container'>
        <div id='pic'><img src='$imagepath' height=128px width=128px></div>
        <div id='info'>Name:".$user['name']."<br>Email:".$user['email']."</div><br><h1>Your Funds</h1>
        <div id='funds'>";
        while($row = $r1->fetch_assoc()){
				$photoname1 = $row["photo"];
				$imagepath1 = "../funds/fuploads/photos/".$photoname1;
                echo "<div id='orgbox'>
		            <div id='orgimg'><img src='$imagepath1' height=128px width=128px></div><h3 style=' margin-left=1000px;margin-top=-60px '>". $row["organisation"] ."</h3><p>". $row["description"] ."</p>
	                </div><br>";
		}
        echo"</div><h1>Your Transactions</h1><div id='transactions'>";
        while($row = $r2->fetch_assoc()){
                echo "<div id='orgbox'>
		            <h3 style=' margin-left=1000px;margin-top=-60px '>". $row["organisation"] ."</h3><p>Donated Amount: ". $row["amountraised"] ."</p>
	                </div><br>";
		}
        echo "</div></div>";
    }
    else{
        echo "Please Login";
    }
    ?>
</body>
</html>