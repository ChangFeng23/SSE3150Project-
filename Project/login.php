<?php
require_once "pdo.php";
$atmp =0;
$total = 3;
$AdminName = 'admin';
$AdminPosition = 'admin';
$AdminUsername = 'admin';
$AdminPassword = 'admin';
    if(isset($_POST['Login'])){
        if($_POST['name']!="" && $_POST['position']!="" && $_POST['username']!="" && $_POST['password']!=""){
            
                //User login
                $name = $_POST['name'];
                $position = $_POST['position'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $atmp = $_POST['hidden'];
                if($atmp<=2){
                $sql = "SELECT * FROM member WHERE member_name = :member_name and position= :position and username = :username and user_password = :user_password";

                $query = $pdo->prepare($sql);
                $query->execute(array(
                    ':member_name'=>$name,
                    ':position'=>$position,
                    ':username' =>$username,
                    ':user_password' =>$password
                ));
                $row = $query->rowCount();
                $result = $query->fetch();

                //This codes is admin login
                if($row>0 && $result['member_name'] == 'admin'){
                    header("location: Admin.php");
                }

                //This codes is user login
                if($row>0 && $result['member_name'] != 'admin'){
                    $_SESSION['username'] = $username;
                    header("location: registration.php");
                }
                else{
                    (int)$atmp++;
                    echo'<script type "text/javascript">alert("Invaild information and the left number of attemp is '.intval($total)-intval($atmp).' times") </script>';
                    if($atmp == 3){
                        header("location: error.php");
                    } 
                } 
        }

    }

    else{
        echo'<script type "text/javascript">alert("Please complete the required field") </script>';
    }

    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>    
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
    <form class="form" method = "post" name="login">
   

    <?php
    echo"<input type ='hidden' name = 'hidden' value='".$atmp."'>";
    ?>

    <h1 class="login-title">Login</h1> 
    <p><input type="text" class="login-input" name="name" placeholder="Name" autofocus="true"></p>
    <p><input type="text" class="login-input" name="position" placeholder="Position"/></p>
    <p><input type="text" class="login-input" name="username" placeholder="Username"/></p>
    <p><input type="password" class="login-input" name="password" placeholder="Password"/></p>
    <p>Admin login: <b>admin</b></p>
    <input type="submit" class="login-button" name="Login" value="Login">
    </form>
</body>
</html>

