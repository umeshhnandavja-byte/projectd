<html>
    <head>
        <link rel=stylesheet href='/projectd/main.css'>
        <link rel=stylesheet href='/projectd/about/about.css'>
        <link rel="icon" href="/projectd/letter-d.png">
        <tite>About Us</tite>
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

<div id='aboutus'>
   <div class="hero-section">
        <h1>Empowering Change Through Giving</h1>
        <p>ProjectD is a transparent platform designed to bridge the gap between compassionate donors and impactful causes.</p>
    </div>

    <section>
        <h2>Our Story</h2>
        <p>Founded in 2026, GiveHope started with a simple observation: many people want to help, but they don't always know where their money goes. We built this platform to provide a direct, verifiable connection between organizations in need and the community.</p>
    </section>

    <div class="mission-grid">
        <div class="card">
            <h3>Transparency</h3>
            <p>Every donation is tracked and updated in real-time. Donors can see exactly how much has been raised for every fund.</p>
        </div>
        <div class="card">
            <h3>Accessibility</h3>
            <p>We make it easy for anyone to create a fund or contribute to one, regardless of the size of the donation.</p>
        </div>
        <div class="card">
            <h3>Community</h3>
            <p>We believe in the power of collective action. Small contributions from many individuals create massive impact.</p>
        </div>
    </div>

    <section style="text-align: center;">
        <h2>Ready to make a difference?</h2>
        <p>Browse our active funds and find a cause that speaks to you.</p>
        <br>
</div>

    <div id='footer'>
        <a href='/projectd/about'>About</a> <a href='/projectd/terms'>Terms&Conditions</a> <a href='/projectd/privacy'>PrivacyPolicy </a><br><br><label>&copy2026@GiveHope</label>
    </div>
</body>
</html>
