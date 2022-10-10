<?php

require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to backup upload Folder
    
    $pathdir = "../Modules/IT/uploads/";

   

    $zipcreated = "../uploads_IT.zip";

    echo("<a href='". $zipcreated."'>Downlod Your uploads folder from here</a> <br/>");

   
    $rootPath = realpath( $pathdir);
    
    // Initialize archive object
    $zip = new ZipArchive();
    $zip->open(  $zipcreated, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    
    // Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );
    
    foreach ($files as $name => $file)
    {
        // Skip directories (they would be added automatically)
        if (!$file->isDir())
        {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);
    
            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }
    
    // Zip archive will be created only after closing object
    $zip->close();
  

    echo("<hr><a href='../'>BACK</a> <br/>");

}
?>