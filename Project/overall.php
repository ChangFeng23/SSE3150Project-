<?php
require_once "pdo.php";
if ( isset($_POST['next'] ) ) {
     header("Location: index.php");
    return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><style data-merge-styles="true"></style>
<title>Overall Summary</title>
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
        
			<h1>The overall result and summary</h1>
        
</div>
        
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12" style="background-color:lavender;">
        <h3 class="feature-title">Total Score(320)</h3>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
        <h3 class="feature-title">risk(100)</h3>
        </div>              
        </div>     
</div>
</div>
<form method="POST">
 <div id=containerFea class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12" style="background-color:lavender;">
        <h1>
        <?php 
        
        $stmt = $pdo->query("SELECT sum(value) as total From score");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $row['total'];
        
        ?>
        </h1>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12"style="background-color:orange;">
		<h1>							
        <?php 
        
        echo ($row['total']/3.2);
        ?>
        </h1>
                </div>       
       
                </div>
          
</div>
</div>
	<input type="submit" class="btn btn-warning" name="next" value="Next">
</form>

</body>
</html>