<?php
    session_start();

    $conn = new mysqli("localhost" , "root" , "", "projectd");

    if($conn->connect_error){
    	die('Connection Error');
	}

    $users = $conn->query("SELECT * FROM signup");
    $fund = $conn->query("SELECT * FROM newfund");
    $trans = $conn->query("SELECT * FROM transactions");
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
    <title>GiveHope</title>
</head>
<body>
    <div class="menubar">
        <a class="webname" href='index.php'><img id='img1' src='/projectd/letter-d.png' height=32px width=32px></div></a>
        <?php
        if($_SESSION["userlogged"]){
            $pphoto = $_SESSION['photo'];
            $image="uploads/".$pphoto;
            echo"
            <div id='profile'><a href='profile'><img src='$image' height=32px width=32px></a></div>
            <a id='logout' href='logout.php'>logout</a>";
        }
        else{
            echo"";
        }
        ?>
    </div>

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
    
    <div class="counter">
        <div class="users"><p id='p'>Total Users</p><div id='c'><label><br><h1><?php echo $users->num_rows;?></h1></label></div></div>
        <div class="org"><p id='p'>No of Oraganizations</p><div id='c'><br><h1><?php echo $fund->num_rows;?></h1></div></div>
        <div class="fundsc"><p id='p'>Funds Raised</p><br><div id='c'><h2>&#8377; <?php echo $sum;?></h2></div></div>
        <div class="active"><p id='p'>No of Donations</p><div id='c'><br><h2><?php echo $trans->num_rows;?></h2></div></div>
    </div>

    </div>
    
    <iframe src="/projectd/funds/funds.html" class="funds" style="background-color: #7AAACE;margin-left: 100px;margin-top: 100px;border-radius: 40px;" height="1000px" width="90%" title="Funds"></iframe>
    
    <div id='footer'>
        <a href='about'>About</a> <a href='terms'>Terms&Conditions</a> <a href='privacy'>PrivacyPolicy </a><br><br><label>&copy2026@GiveHope</label>
    </div>
</body>
</html>