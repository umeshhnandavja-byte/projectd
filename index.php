<?php
    session_start();

    $conn = new mysqli("localhost" , "root" , "", "projectd");

    if($conn->connect_error){
    	die('Connection Error');
	}

    $users = $conn->query("SELECT * FROM signup");
    $fund = $conn->query("SELECT * FROM newfund");
    $result = mysqli_query($conn, "SELECT SUM(amountraised) AS total FROM newfund");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="letter-d.png">
    <title>Project D</title>
</head>
<body>
    <nav class="menubar">
        <a class="webname">Page</a>
        <?php
        if($_SESSION["userlogged"]){
            $pphoto = $_SESSION['photo'];
            $image="uploads/".$pphoto;
            echo"
            <div id='profile'><a href='profile/profile.php'><img src='$image' height=32px width=32px></a></div>
            <div id='logout'>logout</div>";
        }
        else{
            echo"
        <a>sign up</a>
        <a>log in</a>";
        }
        ?>
    </nav>

    <nav class="navbar">
        <ul class="open">
            <li><a href="/projectd" class="homenav">Home <img src="/projectd/home.png"></a></li>
            <li><a href="/projectd/newfund/newfund1.php">Apply <img src="/projectd/apply.png"></a></li>
            <li><a href="/projectd/about" class="aboutnav">About <img src="/projectd/information-button.png"></a></li>
            <li><a href="" class="servicesnav">Services<img src="/projectd/services.png"></a></li>

            <?php
                if(!$_SESSION['userlogged']){
                    echo"<li><a href='/projectd/login/login.php' class='loginnav'>Login<img src='/projectd/log-in.png'></a></li>";
                }
                else{

                }
            ?>
        </ul>
    </nav>
    
    <div class="counter">
        <div class="users"><p>Total Users</p><label><br><h2><?php echo $users->num_rows;?></h2></label></div>
        <div class="org"><p>No of Oraganizations</p><br><h2><?php echo $fund->num_rows;?></h2></div>
        <div class="fundsc"><p>Funds Raised</p><br><h2>&#8377; <?php echo $sum;?></h2></div>
        <div class="active"><p>No of Donations</p><br><h2><?php?></h2></div>
    </div>

    </div>
    
    <iframe src="/projectd/funds/funds.html" class="funds" style="background-color: #7AAACE;margin-left: 100px;margin-top: 100px;border-radius: 40px;" height="1000px" width="90%" title="Funds"></iframe>
    
    <div id='footer'>
        <a href='about'>About</a> <a href='terms'>Terms&Conditions</a> <a href='privacy'>PrivacyPolicy </a><br><br><label>&copy2026@Projectd</label>
    </div>
</body>
</html>