<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Restore Database

    // $_FILE["databaseFile"]

    if(isset($_FILES["databaseFile"]))
    {
  
      $target_File = "../Backup/";
  
      if (move_uploaded_file($_FILES["databaseFile"]["tmp_name"], $target_File . $_FILES["databaseFile"]["name"])) 
     {
        $targetDB = $target_File. $_FILES["databaseFile"]["name"];
     }
  
     

     //---------------
     
     //--------------
     
     function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
    } // end if file exists
    return $response;
}
     //--------------

     
     restoreMysqlDB($targetDB, $conn);
      
     
    


     
    }

 


    header("Location:../Settings.php"); 
}

?>