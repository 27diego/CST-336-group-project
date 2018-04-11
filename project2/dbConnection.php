<?php

function getDatabaseConnection() { //$dbname parameter

$host = "us-cdbr-iron-east-05.cleardb.net";
$dbname = "heroku_01f7a5f71bceb78"; //$dbname
$username = "bfb0c4f783ec97";     //root
$password = "60b4d250";

//checks whether the URL contains "herokuapp" (using Heroku)
if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $host = $url["host"];
   $dbname = substr($url["path"], 1);
   $username = $url["user"];
   $password = $url["pass"];
}

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

return $dbConn;

}

?>