<html>
    <head>
        <link rel=stylesheet href='/projectd/main.css'>
        <link rel=stylesheet href='/projectd/about/about.css'>
        <link rel="icon" href="/projectd/letter-d.png">
        <title>Terms</title>
    </head>
    <body>
         <nav class="menubar">
        <a class="webname">GiveHope</a>
        <?php
        session_start();
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

    <div id="aboutus" class="about-section">
    
    <h1>Terms and Conditions</h1>
    <p class="last-updated">Last Updated: October 2023</p>

    <section>
        <h2>1. Acceptance of Terms</h2>
        <p>By accessing and using this fundraising platform ("GiveHope"), you agree to be bound by these Terms and Conditions. If you do not agree, please discontinue use immediately.</p>
    </section>

    <section>
        <h2>2. Donation Policy</h2>
        <p>All donations made through GiveHope are voluntary and <strong>non-refundable</strong>. Once a transaction is completed and updated in your profile, the funds are allocated to the respective organization.</p>
    </section>

    <section>
        <h2>3. Use of Funds</h2>
        <p>While we strive to host legitimate organizations, GiveHope acts as a facilitator. Donors are encouraged to perform their own due diligence before contributing. GiveHope is not responsible for the ultimate usage of funds by the organization once transferred.</p>
    </section>

    <section>
        <h2>4. User Accounts</h2>
        <p>You are responsible for maintaining the security of your account and password. You agree to notify us immediately of any unauthorized use of your account.</p>
    </section>

    <section>
        <h2>5. Limitation of Liability</h2>
        <p>GiveHope shall not be liable for any direct, indirect, or incidental damages resulting from the use or inability to use the platform, including but not limited to failed transactions or data loss.</p>
    </section>

</div>

    <div id='footer'>
        <a href='/projectd/about'>About</a> <a href='/projectd/terms'>Terms&Conditions</a> <a href='/projectd/privacy'>PrivacyPolicy </a><br><br><label>&copy2026@GiveHope</label>
    </div>
</body>
</html>
