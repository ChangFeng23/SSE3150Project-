<?php
session_start();
if(isset($_POST['View'])){
    $value = $_POST['QuestionId'];
    $_SESSION['id'] = $value;
    header('location: View.php');
}

if(isset($_POST['Logout'])){
    header('location: login.php');
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>    
    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<form class="form" method = "post" name="view">
<h1 class="login-title">View question</h1> 
    <p><input type="text" class="login-input" name="QuestionId" placeholder="QuestionId(1-64)" autofocus="true"></p>
    <p><input type="submit"  class="login-button" name="View" value="View"></p>
    <p><input type="submit"  class="login-button" name="Logout" value="Logout"></p>
    </form>

</body>
</html>