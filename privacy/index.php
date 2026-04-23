<html>
    <head>
        <link rel=stylesheet href='/projectd/main.css'>
        <link rel=stylesheet href='/projectd/about/about.css'>
        <link rel="icon" href="/projectd/letter-d.png">
        <title>Privacy</title>
    </head>
    <body>
         <nav class="menubar">
        <a class="webname">Page</a>
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

        <section>
        <h2>1. Information We Collect</h2>
        <p>When you use GiveHope, we collect information that you provide directly to us:</p>
        <ul>
            <li><strong>Account Data:</strong> Name, username, and email address provided during signup.</li>
            <li><strong>Transaction Data:</strong> Records of donations made, including the amount and the associated organisation.</li>
            <li><strong>Media:</strong> Photos and documents uploaded to our <code>fuploads</code> directory.</li>
        </ul>
    </section>

    <section>
        <h2>2. How We Use Your Information</h2>
        <p>Your data is used solely to provide and improve our services, specifically to:</p>
        <ul>
            <li>Maintain your user profile and donation history.</li>
            <li>Display accurate "Amount Raised" statistics for fundraisers.</li>
            <li>Contact you regarding transaction confirmations or account security.</li>
        </ul>
    </section>

    <div class="highlight">
        <strong>Note:</strong> We do not sell, rent, or trade your personal information to third parties for marketing purposes.
    </div>

    <section>
        <h2>3. Data Security</h2>
        <p>We implement technical measures to protect your data. However, please remember that no method of transmission over the internet or electronic storage is 100% secure. We encourage you to use strong, unique passwords.</p>
    </section>

    <section>
        <h2>4. Cookies</h2>
        <p>Our platform uses PHP Sessions to keep you logged in. These are temporary files that identify you to the server as you navigate the site.</p>
    </section>

    <section>
        <h2>5. Your Rights</h2>
        <p>You have the right to request access to the personal data we hold about you or to ask that we correct or delete your information. Contact the administrator for such requests.</p>
    </section>

    </div>

    <div id='footer'>
        <a href='/projectd/about'>About</a> <a href='/projectd/terms'>Terms&Conditions</a> <a href='/projectd/privacy'>PrivacyPolicy </a><br><br><label>&copy2026@GiveHope</label>
    </div>
</body>
</html>
