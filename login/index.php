<?php
    session_start();
    $conn = mysqli_connect("localhost" , "root" , "", "projectd");

    if($conn === false){
        die("ERROR: " . mysqli_connect_error()); 
    }
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="/projectd/letter-d.png">
        <link rel="stylesheet" href="/projectd/main.css">
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

        <form action="index.php" method="post">
        <div id="container">
            <?php
                if(isset($_POST["login"])){

                $username = $_POST["username"];
                $password = $_POST["password"];
                
                session_start();
                $_SESSION["userlogged"] = true;

                $users = mysqli_query($conn,"SELECT * FROM signup WHERE username = '$username'");

                $user = mysqli_fetch_array($users, MYSQLI_ASSOC);

                if($user){
                    if(password_verify($password,$user["password"])){
                        echo "<div>Login Sucessful!</div>";
                        $_SESSION["user"] = $username;
                        $_SESSION["photo"] = $user["photo"];
                    }
                    else{
                        echo "<div>Wrong Password</div>";
                    }
                }
                else{
                    echo"<div>Username Does Not Exist</div>";
                }
                }
            ?>
            <?php
            if(!$_SESSION['userlogged']){
	        echo "<h1>Login</h1>
            <p1>Enter Username</p1><br>
            <input id='tbox' type='text' placeholder='Username' class='username' name='username' required><br><br>
            <p1>Enter Password</p1><br>
            <input type='password' id='pass' placeholder='Password' class='password' name='password' required><br><br>
            <input type='checkbox' onclick='my()' autocomplete='off'><p1>Show Password</p1><br><br>
            <button id='su'><a href='/projectd/register'>Register</a></button> <button id='s' name='login'>Login</button>";
        }
        ?>
        </div>
        </form>
        <script src="login.js"></script>
    </body>
</html>