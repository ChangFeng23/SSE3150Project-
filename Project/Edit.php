<?php
session_start();
require_once "pdo.php";
$id = $_SESSION['id'];
if(isset($_POST['Back'])){
    header('location: View.php');
}


if(isset($_POST['Submit'])){
    $q_id=1;
    $r_id=1;
    $v_id=1;
    $stmt1 = $pdo->query("SELECT * From question_detail WHERE questions_id=".$id."");
    $row = $stmt1->rowCount();
    $a = $row;
    $i=0;
    $result=0;
    while($i<$a){
        if($_POST['Question'.$q_id]!=""){
        $detail = $_POST['Question'.$q_id];
        $questionID = $id.".".$q_id;
        $sql = "UPDATE question_detail SET detail = :detail WHERE q_id = :q_id";
        $stmt1 = $pdo->prepare($sql);
        $stmt1->execute(array(
            ':detail'=>$detail,
            ':q_id' =>$questionID
        ));
        $q_id++;
        $i++;
        $result++;
    }
    else{
        $q_id++;
        $i++;
        continue;
    }
}

    $stmt2 = $pdo->query("SELECT * From rating WHERE questions_id=".$id."");
    $row = $stmt2->rowCount();
    $b = $row;
    $n=0;
    while($n<$b){
        if($_POST['Rating'.$r_id]!=""){
        $detail = $_POST['Rating'.$r_id];
        $ValueID = $id.".".$r_id;
        $sql = "UPDATE rating SET name = :name WHERE v_id = :v_id";
        $stmt2 = $pdo->prepare($sql);
        $stmt2->execute(array(
            ':name'=>$detail,
            ':v_id' =>$ValueID
        ));
        $r_id++;
        $n++;
        $result++;
    }
    else{
        $r_id++;
        $n++;
        continue;
    }
}



$j=0;
while($j<$b){
    if($_POST['Value'.$v_id]!=""){
    $detail = $_POST['Value'.$v_id];
    $ValueID = $id.".".$v_id;
    $sql = "UPDATE rating SET value = :value WHERE v_id = :v_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':value'=>$detail,
        ':v_id' =>$ValueID
    ));
    $v_id++;
    $j++;
    $result++;
}
else{
    $v_id++;
    $j++;
    continue;
}
}

if($result>0){
    echo'<script type "text/javascript">alert("Edit successfully!") </script>';
}
else{
    echo'<script type "text/javascript">alert("Edit error!") </script>';
}
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Edit page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        <script src="main.js"></script>
    
</head>
<body>
<form action="" method = "post">
    <div class="jumbotron text-center text-black">
<h1>Edit question</h1> 
    </div>
    
    <?php
    echo '<div id=containerFea class="container-fluid">';
        echo '<div class="row">';
        echo '<div class="col-lg-2 col-md-2 col-sm-12" style="background-color:lavender;">';
    $a=1;
    $b=1;
    
    $stmt = $pdo->query("SELECT detail From question_detail WHERE questions_id=".$id."");   
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo "<p><input type ='text' name = 'Question".$a."' placeholder='Question".$a."'></p>";
        $a++;
    }
    echo "</div>";
    
    echo '<div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">';
    $stmt = $pdo->query("SELECT * From rating WHERE questions_id=".$id."");
    while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
        echo "<p><input type ='text' name = 'Rating".$b."' placeholder='Rating".$b."'>
        <input type ='text' name = 'Value".$b."' placeholder='Value".$b."'></p>";
        $b++;
    }
    echo "</div></div>";
    ?>

<p><input type="submit"  class="btn btn-warning" name="Submit" value="Submit"></p>
    <input type="submit" class="btn btn-secondary"name="Back" value="Back">
    </form>

</body>
</html>