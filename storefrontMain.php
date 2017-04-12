<?php include 'sqlfunctions.php'; ?>

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
        <title> Storefront Main</title>
    </head>
    <body>
        <div class="container">
            <div id="form_jumbotron" class="jumbotron">
                <h1>CST 336 MOVIES: Checkout System</h1>
                <a href="https://cst336-djw1lson.c9users.io/team_project/cst336_storefront/shoppingCart.html" style="float: right" class="btn btn-info btn-sm">
                <span class="glyphicon glyphicon-shopping-cart"></span>
                Shopping Cart
                </a>
                <br/><hr/><br/>
                <form style="text-align:center">
                    Movie Title: <input type="text" name="Title" placeholder="Search movie name..."/>
                    Genre: <select name="Genre" class="selectpicker" data-style="btn-primary">
                        <option value="">-Select-</option>
                        <option value="horror">Horror</option>
                        <option value="action">Action</option>
                        <option value="scifi">Sci-fi</option>
                        <option value="thriller">Thriller</option>
                        <option value="comedy">Comedy</option>
                        <option value="drama">Drama</option>
                        <option value="documetary">Documentary</option>
                        <option value="tv">Television</option>
                    </select>
                        Availability: <select name="Available" class="selectpicker" data-style="btn-primary">
                        <option value="">-Select-</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    
                    <div class="checkbox">
                        Director: <input type="text" name="Director" placeholder="Search director name..."/>
                        Sort by:
                            <label><input class="checkbox" type="radio" name="Sorting" value="Name"> by Title </label>
                            <label><input class="checkbox" type="radio" name="Sorting" value="Length"> by Length </label>
                    </div>
                    <input type="submit" name="submitform" class="btn btn-primary" value="Submit"/>
                </form>
                <br/><br/>
                
                <?php
        
                    $movies = getMovies();
                    foreach($movies as $movie) 
                    {
                
                        echo $movie['Title'] . " " . $movie['Available']  .  "<br />";
                    }
        
        
                ?>
        </p>
            </div>
        </div>
    </body>
</html>