<?php

require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to backup database


    $tables = array();
    $sql = "SHOW TABLES";
    $query = $conn->query($sql);

    while($row = $query->fetch_row())
    {
        $tables[] = $row[0];
    }

    $outsql = '';
	foreach ($tables as $table) {
 
 
	    $sql = "SHOW CREATE TABLE $table";
	    $query = $conn->query($sql);
	    $row = $query->fetch_row();
 
	    $outsql .= "\n\n" . $row[1] . ";\n\n";
 
	    $sql = "SELECT * FROM $table";
	    $query = $conn->query($sql);
 
	    $columnCount = $query->field_count;
 
 
	    for ($i = 0; $i < $columnCount; $i ++) {
	        while ($row = $query->fetch_row()) {
	            $outsql .= "INSERT INTO $table VALUES(";
	            for ($j = 0; $j < $columnCount; $j ++) {
	                $row[$j] = $row[$j];
 
	                if (isset($row[$j])) {
						$dataX = $row[$j];
						$A = str_replace('"', ' inch', $dataX);
						$B = str_replace('\'', 'foot', $A);
	                    $outsql .= '"' . $B . '"';
	                } else {
	                    $outsql .= '""';
	                }
	                if ($j < ($columnCount - 1)) {
	                    $outsql .= ',';
	                }
	            }
	            $outsql .= ");\n";
	        }
	    }
 
	    $outsql .= "\n"; 
	}

	date_default_timezone_set('Asia/Riyadh');
    $backup_file_name = ("../Backup/".date("Y-m-d_h-i-s-A")).'_'.$database . '_database.sql';
    $fileHandler = fopen($backup_file_name, 'w+');

	$fileX = str_replace("CREATE TABLE","CREATE TABLE IF NOT EXISTS", $outsql);

	$fileX = str_replace("INSERT ","INSERT IGNORE ", $fileX);

     fputs($fileHandler,"\xEF\xBB\xBF");
    fwrite($fileHandler, $fileX);
    fclose($fileHandler);


	       // add action to log table

		   $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Database Backup');";
		   $conn->query($sql);
		  
		  // end adding action
    
header("Location:../Settings.php"); 


}
?>