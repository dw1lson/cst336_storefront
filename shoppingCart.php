<?php
session_start();

include 'DBCON.php';
$dbConn=getDatabaseConnection(movies);

if($_GET['id'] ==0)
{
    session_destroy();
}

if(isset($_GET['id']) && $_GET['id']!=0)
{
$sql="SELECT * FROM Movies WHERE MovieId=".$_GET['id'];

$stmt = $dbConn -> prepare ($sql);
$stmt -> execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
 
class Movie
{
    var $id;
    var $title;
    var $year;
    var $genre;
    
}
function displayCart()
{
    if($_GET['id'] !=0)
    {
     if(count($_SESSION['cart'])>0)
        {
            echo "<table class=\"table table-striped table-hover\" ";
            foreach($_SESSION['cart'] as $record)
                {
                   // echo $record->title;
                    echo "<tr><td>";
               
                    echo $record->title . "\t";
                    echo $record->year . "\t";
                    echo "</td></tr>";
                }
            echo "</table>";   
        }
    }
    else
    {
        echo "Your cart is empty <br>";
    }
}

if(isset($_GET['id']) && $_GET['id']>0)
{
    $movie = new Movie;
 
    foreach($records as $record)
    {
        $movie->id = $record['MovieId'];
        $movie->title = $record['Title'];
        $movie->year = $record['Year'];
    }
    $_SESSION['cart'][] = $movie;
    
}

?>


<!DOCTYPE html>


<html>
    <head>
        <style>
            @import url('./css/styles.css');
        </style>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
        <title> Storefront Viewing Cart </title>
    </head>
    <body>
        <div class="container">
            <div id="form_jumbotron" class="jumbotron">
                <h1>CST 336 Storefront: Viewing Cart</h1>
                <br/><hr/><br/>
                <div style="width:50%; text-align: center; margin: auto">
                <div class="btn-group btn-group-justified">
                  <a href="storefrontMain.php" class="btn btn-primary">Home</a>
                  <a href="#" class="btn btn-primary">Checkout</a>
                </div>
                <?php
                displayCart();
                ?>
                <a href="shoppingCart.php?id=0">Clear Viewing Cart</a>
                </div>
                <br/><br/>
        
            </div>
        
        </div>
        
    </body>
</html>