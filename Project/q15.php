<?php 
require_once "pdo.php";
if ( isset($_POST['next'] ) ) {
    
    $sql = "INSERT INTO score (value, questions_id, section) VALUES (:value, 15, 1)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':value' => $_POST['score']));
    
    header("Location: q16.php");

}else if (isset($_POST['pre'] )){
    
    $sql = "DELETE FROM score WHERE questions_id = 14";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    header("Location: q14.php");
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
			<h2>Question 15</h2>
        
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
<form method="POST">
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12" style="background-color:lavender;">
        
        <?php 
        $stmt = $pdo->query("SELECT knowledgeArea From questions WHERE questions_id=15");
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        echo (htmlentities($row['knowledgeArea']));
        ?>
        
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
									
        <?php 
        echo('<table border="1">'."\n");
        $stmt = $pdo->query("SELECT detail From question_detail WHERE questions_id=15");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo (htmlentities($row['detail']));
            echo("</td></tr>\n");
        }
        ?>
        </table>
        
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12"style="background-color:lavender;">
        
        <?php 
        echo('<table border="1">'."\n");
        $stmt = $pdo->query("SELECT name From clarifications WHERE questions_id=15");
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            echo "<tr><td>";
            echo (htmlentities($row['name']));
            echo("</td></tr>\n");
        }
        ?>
        </table>
        
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12"style="background-color:orange;">
                
        <?php                    
        echo('<table border="1">'."\n");
        $stmt = $pdo->query("SELECT * From rating WHERE questions_id=15");        
        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
            
            echo "<tr><td>";
            echo '<input type="radio" name="score" value="'.$row['value'].'">';
            echo (htmlentities($row['name']));
            echo("</td></tr>\n");            
        }       
        ?>
        </table>
        
        </div>     
</div>
</div>
	<input type="submit" class="btn btn-secondary" name="pre" value="Previous">
	<input type="submit" class="btn btn-warning float-right" name="next" value="Next">
</form>

</body>
</html>