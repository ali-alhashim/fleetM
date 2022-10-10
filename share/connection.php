<?php
// connect to database
require("key.php");
try
{
    $conn= new mysqli($serverAddress, $username, $password, $database, $port);

    
}
catch(Exception $e)
{
    echo("<script> alert($e) </script>");
}
?>