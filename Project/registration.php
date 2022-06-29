<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['projectName'])) {
        // removes backslashes
        $projectName = stripslashes($_REQUEST['projectName']);
        //escapes special characters in a string
        $projectName = mysqli_real_escape_string($con, $projectName);
        $owner    = stripslashes($_REQUEST['owner']);
        $owner    = mysqli_real_escape_string($con, $owner);
        $financial = stripslashes($_REQUEST['financial']);
        $financial = mysqli_real_escape_string($con, $financial);
        $duration = stripslashes($_REQUEST['duration']);
        $duration = mysqli_real_escape_string($con, $duration);
        $mode = stripslashes($_REQUEST['mode']);
        $mode = mysqli_real_escape_string($con, $mode);
        
        
        $query    = "INSERT into `projects` (projectName, owner, financial, duration, mode)
                     VALUES ('$projectName', '$owner', '$financial', '$duration', '$mode')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='q1.php'>Questions</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="projectName" placeholder="Project Name" required />
        <input type="text" class="login-input" name="owner" placeholder="Owner">
        <input type="text" class="login-input" name="financial" placeholder="Financial">
        <input type="text" class="login-input" name="duration" placeholder="Duration">
        <lablel>Mode</lablel>
        <select name="mode" class="login-input">
        <option value="Insource">Insource</option>
        <option value="Outsource">Outsource</option>
        <option value="Co-source">Co-source</option>
        <option value="Unsoecified">Unsoecified</option>
        </select>
        <input type="submit" name="submit" value="Register" class="login-button">
        
    </form>
<?php
    }
?>
</body>
</html>