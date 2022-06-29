<?php
    session_start();
    if(!isset($_SESSION["projectName"])) {
        header("Location: q1.php");
        exit();
    }
?>