<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['next'] ) ) {
    header("Location: q19.php");
    return;
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
        
			<h1>Project Characteristics (18 Questions)</h1>
			<h2>Section Summary</h2>
        
</div>
        
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12" style="background-color:lavender;">
        <h3 class="feature-title">Maximum Score</h3>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
        <h3 class="feature-title">Result</h3>
        </div>  
        <?php 
        if($_SESSION['a']=='3'){
            echo('<div class="col-lg-6 col-md-6 col-sm-12"style="background-color:lavender;">');
            echo '<h3 class="feature-title">Explanation</h3>';
            echo '</div>';
        }?>      
        </div>     
</div>
</div>
<form method="POST">
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12" style="background-color:lavender;">
        <h1>90</h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
		<h1>							
        <?php 
        
        $stmt = $pdo->query("SELECT sum(value) as total From score WHERE section = 1");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $row['total'];
        
        ?>
        </h1>
                </div>
        <?php 
        if($_SESSION['a']=='3'){
            echo('<div class="col-lg-6 col-md-6 col-sm-12"style="background-color:lavender;">');
            echo "if questions 1, 3, and 11, which deal with money, scope, and time in the project characteristics section, are all answered as '5', a triple constraint condition will apply resulting in '5' response scoring for all questions in this section (i.e. the maximum score of 90 for the section).";
            echo '</div>';
        }
        ?>
       
                </div>
          
</div>
</div>
	<input type="submit" class="btn btn-warning" name="next" value="Next">
</form>

</body>
</html>