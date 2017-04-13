<!DOCTYPE html>
<html>
    <head>
        <title>Movie Info </title>
    </head>
    <body>

    <?php


        if($_GET['Title'] !="")
        {
            echo "Title: ".$_GET['Title'];
        }
        if($_GET['Year']!=0)
        {
            echo "<br>Year: ".$_GET['Year'];
        }
        if($_GET['DirectorId']==1)
        {
            echo "<br>Director: Stanley Kubrick";
        }
        if($_GET['DirectorId']==2)
        {
            echo "<br>Director: Quentin Tarantino";
        }
        if($_GET['DirectorId']==3)
        {
            echo "<br>Director: Ethan Coen";
        }
        if($_GET['DirectorId']==4)
        {
            echo "<br>Director: Martin Scorcese";
        }
        if($_GET['DirectorId']==5)
        {
            echo "<br>Director: Michael Bay";
        }
        if($_GET['DirectorId']==6)
        {
            echo "<br>Director: Alfred Hitchcock";
        }
        if($_GET['DirectorId']==7)
        {
            echo "<br>Director: Wes Anderson";
        }
        if($_GET['DirectorId']==8)
        {
            echo "<br>Director: Christopher Nolan";
        }        
        if($_GET['GenreId']==1)
        {
            echo"<br>Genre: Drama";     
        }
        if($_GET['GenreId']==2)
        {
            echo"<br>Genre: Comedy";     
        }
        if($_GET['GenreId']==3)
        {
            echo"<br>Genre: Action";     
        }
        if($_GET['GenreId']==4)
        {
            echo"<br>Genre: Horror";     
        }
        if($_GET['GenreId']==5)
        {
            echo"<br>Genre: Science Fiction";     
        }        
        if($_GET['Length']!=0)
        {
        echo "<br>Length: ".$_GET['Length'] . " minutes";
        }
        
    ?>


    </body>
</html>