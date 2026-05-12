<?php
    session_start();
    session_destroy();
    header("Location: /projectd/login/login.php");
?>