
<?ph
//function for queries
function getMovies() {
    global $dbConn;
    
    if (!isset($_GET['submitform'])) 
        $sql = "SELECT * FROM movies WHERE 1";
        
    // else{
    
    //  $sql = "SELECT * FROM movies WHERE 1 ";
    $sql .=" AND Title LIKE :title ";
    
    $namedParameters[':title'] = '%' . $_GET['Title'] . '%';
    
    if (isset($_GET['availabile']) ) { 
        
        $sql .= " AND Available = :status "; //instead of single quotes
        $namedParameters[':status'] =  'Yes';    
        
    }
    
    // if($_GET['deviceType'] != "")
    // {
    //     echo $_GET['deviceType'];
    //     $sql .= " AND deviceType = :type ";
    //     $namedParameters[':type'] =  $_GET['deviceType'];    
    // }
    
    if($_GET['sorting'] == "Name")
    {
        $sql .= "ORDER BY Title";
    }
    else if ($_GET['sorting'] == "Length")
    {
        $sql .= "ORDER BY Length";
    }
    }

    echo "</br>";
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $records;
    
}
?>