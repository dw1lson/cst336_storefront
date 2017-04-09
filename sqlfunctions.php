
<?ph
//function for queries
function getMovies() {
    global $dbConn;
    
    //if (!isset($_GET['submitform'])) 
    $sql = "SELECT * FROM Movies WHERE 1";
    
    if($_GET['Genre'] != "") //check if the user wants a specific genre
    {
        echo $_GET['Genre'];
        $sql = "SELECT * FROM Movies join Genres on Movies.GenreId = Genres.Id WHERE Genres.Title = :type ";
        $namedParameters[':type'] = $_GET['Genre'];    
    }
    else if ($_GET['Director'] != "") //check if the user wants a specific director
    {
        echo $_GET['Director'];
        $sql = "SELECT * FROM Movies join Directors on Movies.DirectorId = Directors.Id WHERE Directors.FirstName = :type 
            OR directors.LastName = :type";
        $namedParameters[':type'] = $_GET['Director']; 
    }
    
    if($_GET['Title'] != "") //check if the user wants a specific title
    {
        $sql .=" AND Title LIKE :title ";
        $namedParameters[':title'] = '%' . $_GET['Title'] . '%';
    }
    
    if (isset($_GET['Available']) ) //get only available movies 
    { 
        $sql .= " AND Available = :status "; 
        $namedParameters[':status'] =  'Yes';    
    }
    
    
    if($_GET['Sorting'] == "Name") //sort by title
    {
        $sql .= "ORDER BY Title";
    }
    else if ($_GET['Sorting'] == "Length") //sort by movie length
    {
        $sql .= "ORDER BY Length";
    }
    //}

    echo "</br>";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
    
}
?>