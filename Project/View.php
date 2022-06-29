<?php
session_start();
require_once "pdo.php";
$id = $_SESSION['id'];
if(isset($_POST['Edit'])){
    header('location: Edit.php');
}

if(isset($_POST['Back'])){
    header('location: Admin.php');
}
?>




<!DOCTYPE html>
<html lang="en">
<head><style data-merge-styles="true"></style>
<title>Project Complexity and Risk Assessment</title>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="main.css">
        <script src="main.js"></script>
</head>
<body>

<div class="jumbotron text-center text-black">
        
    <h1>
       <?php
       echo 'Question '.$id.'';
       ?>
    </h1>
</div>

<div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12" style="background-color:lavender;">
        <h3 class="feature-title">Knowledge Area</h3>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
        <h3 class="feature-title">Question</h3>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12"style="background-color:lavender;">
        <h3 class="feature-title">Clarifications</h3>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12"style="background-color:orange;">
        <h3 class="feature-title">Rating</h3>
        </div>     
</div>
</div>

<form action="" method = "post">
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12" style="background-color:lavender;">
        
        <?php 
        $stmt = $pdo->query("SELECT knowledgeArea From questions WHERE questions_id=".$id."");
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        echo (htmlentities($row['knowledgeArea']));
        ?>
        
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
        
        <?php 
        $stmt = $pdo->query("SELECT detail From question_detail WHERE questions_id=".$id."");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo (htmlentities($row['detail']));
            echo "<p></p>";
            echo("</td></tr>\n");
        }
        ?>
        </table>
        
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12"style="background-color:lavender;">
        
        <?php 
        $stmt = $pdo->query("SELECT name From clarifications WHERE questions_id=".$id."");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo (htmlentities($row['name']));
            echo "<p></p>";
            echo("</td></tr>\n");
        }
        ?>
        </table>
        
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12"style="background-color:orange;">
                
        <?php                    
        $stmt = $pdo->query("SELECT * From rating WHERE questions_id=".$id."");        
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo (htmlentities($row['name']));
            echo "<p></p>";
            echo("</td></tr>\n"); 
            
        }
        
        ?>
        </table>
        
        </div>     
</div>
</div>
	<input type="submit" class="btn btn-warning float-right" name="Edit" value="Edit">
    <input type="submit" class="btn btn-secondary" name="Back" value="Back">
</form>

</body>
</html>