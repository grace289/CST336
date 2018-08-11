<?php
function getDatabaseConnection($dbname = 'ebay'){
    $host = 'localhost'; //cloud9
    //$dbname = 'tcp';
    $username = 'root';
    $password = '';
    
//when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $host = "us-cdbr-iron-east-04.cleardb.net";
        $username = "b10c72d07749b1";
        $password = "8c762a59";    
    
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 

    //creates db connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    //display errors when accessing tables
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
}    
?>