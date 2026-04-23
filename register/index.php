<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="/projectd/letter-d.png">
    <link rel="stylesheet" href="/projectd/main.css">
    <link rel="stylesheet" href="register.css">
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

    <form onsubmit="return validate()" action="register.php" method="POST" enctype="multipart/form-data">
        <div id="container">
            <h1>Sign Up</h1>
            <p1>Upload Image</p1><br>
            <input type="file" accept="image/*" name="photo" required><br><br>
            <p1>Enter Your Name</p1><br>
            <input id="tbox" type="text" placeholder="YourName" class="ename" name="ename" required><br><br>
            <p1>Enter Username</p1><br>
            <input id="tbox" type="text" placeholder="Username" class="username" required name="username"><br><br>
            <p1>Enter Email</p1><br>
            <input id="tbox" type="email" placeholder="Email" class="email" name="email" required><br><br> 
            <p1>Enter Password</p1><br>
            <input type="password" id="pass" placeholder="Password" class="password" name="password" required><br><br>
            <p1>Confirm Password</p1><br>
            <input type="password" id="cpass" placeholder="Confirm Password" class="password" required><br><br>
            <input type="checkbox" onclick="my()" autocomplete="off"><p1>Show Password</p1><br><br>

            <input type='checkbox' autocomplete='off' required>I Agree To <a href='/projectd/terms'>Terms & Conditions</a><br>
            <input type='checkbox' autocomplete='off' required>I Agree To <a href='/projectd/privacy'>Privacy Policy</a><br><br>
            <button id="s" onclick="window.location.href='/projectd/login'">Login</button> <button id="s" type="submit">Sign Up</button><br>
        </div>
    </form>
    <script src="register.js"></script>
</body>
</html>