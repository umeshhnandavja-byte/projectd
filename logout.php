<?php
    session_start();
    $_SESSION['userlogged']=false;
    $_SESSION['user']='';
    session_destroy();
    header("Location: /projectd/login");
?>