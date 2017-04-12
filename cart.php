<?php

include 'movie.php';
include 'DBCON.php';
$dbconn = getDatabaseConnection(Movies);
session_start();
$result = mysqli_query($dbconn,'SELECT * FROM Movies WHERE MovieId='.$_GET['id']);
$cartMovies = mysqli_fetch_object($result);

class Movie
{
    var $id;
    var $title;
    var $year;
    var $genre;
    
}
function displayCart()
{
    GLOBAL $cart;
    echo "<table>";
    echo "<tr>";
    echo "<th>Title</th>";
    echo "<th>Year</th>";
    echo "<th>Genre</th>";
    echo "</tr>";
    for($i=0;$i<count($cart);$i++)
    {
        echo "<tr>";
        echo "<td>".$cart[$i]->title."</td>";
        echo "<td>".$cart[$i]->year."</td>";
        echo "<td>".$cart[$i]->genre."</td>";

        echo "</tr>";
    }
    echo "</table>";
    
}

if(isset($_GET['id']))
{
    $movie = new Movie();
    $movie->id = $cartMovies->id;
    $movie->title = $cartMovies->title;
    $movie->year = $cartMovies->year;
    $movie->genre = $cartMovies->genre;
    $_SESSION['cart'][] = $movie;
    
}
$cart=unserilize(serialize($_SESSION['cart']));





?>