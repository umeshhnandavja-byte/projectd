<?php
    session_start();
    echo $_SESSION["user"];
    $username = $_SESSION["user"];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <link rel="icon" href="/projectd/letter-d.png">
    <link rel="stylesheet" href="/projectd/main.css">
    <link rel="stylesheet" href="newfund.css">
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

    <form action="newfund.php" method="POST" enctype="multipart/form-data">
        <div id="container">
            <?php
            if($_SESSION["userlogged"]){
                echo "
            <h1>Apply For Funds</h1>
            <p1>Upload Image</p1><br>
            <input type='file' accept='image/*' name='photo' required><br><br>
            <p1>Enter Your Organisation</p1><br>
            <input id='tbox' type='text' placeholder='YourOrganisation' class='organisation' name='organisation' required><br><br>
            <p1>Enter PhoneNumber</p1><br>
            <input id='tbox' type='text' placeholder='PhoneNumber' class='phonenumber' required name='phonenumber'><br><br>
            <p1>Enter Email</p1><br>
            <input id='tbox' type='email' placeholder='Email' class='email' name='email' required><br><br> 
            <p1>Select a Category</p1><br>
            <select name='category'>
                <option value='Health'>Health</option>
                <option value='Education'>Education</option>
                <option value='Others'>Others</option>
            </select><br><br>
            <p1>Description</p1><br>
            <textarea id='des' class='description' name='description' style='width: 250px;height: 150px' required>Tell About Your Organisation</textarea><br><br>
            <p1>Upload files in<br>a single document(MAX=20MB)</p1><br>
            <input type='file' name='doc' required><br><br>
            <p1>Amount Need To<br>be Raised in &#8377;</p1><br>
            <input id='tbox' type='number' name='amount' class='amount' min=1 required><br><br>
            <input type='checkbox' autocomplete='off' required>I Agree To <a href='/projectd/terms'>Terms & Conditions</a><br>
            <input type='checkbox' autocomplete='off' required>I Agree To <a href='/projectd/privacy'>Privacy Policy</a><br><br>
            <button id='s'><a href='/projectd/login/login.html'>Login</a></button> <button id='s'>Apply</button><br>";
            }
            else{
                echo "Please Login Before Applying";
            }
            ?>
        </div>
    </form>
    <script src="register.js"></script>
</body>
</html>