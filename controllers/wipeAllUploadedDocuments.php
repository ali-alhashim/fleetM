<?php
/**Action to add new car */
require("../share/session.php");


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to wipe all uploaded documents  


    if(isset($_POST["answer"]))
    {
        if($_POST["answer"] == "wipe all uploaded documents")
        {

            function rrmdir($dir) 
            {
                if (is_dir($dir)) {
                  $objects = scandir($dir);
                  foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                      if (filetype($dir."/".$object) == "dir") 
                         rrmdir($dir."/".$object); 
                      else unlink   ($dir."/".$object);
                    }
                  }
                  reset($objects);
                  rmdir($dir);
                }
            }
            //Fleet Documents
            $FolderX = "../uploads/Cars_Photo/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Cars_AccidentAttachment/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Cars_AccidentPhoto/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Cars_Insurance/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Cars_License/";
            rrmdir($FolderX);
            mkdir($FolderX);


            $FolderX = "../uploads/Cars_Request/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Company/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../uploads/Users_ProfilePhoto/";
            rrmdir($FolderX);
            mkdir($FolderX);


            // IT Documents

            $FolderX = "../Modules/IT/uploads/Asset_Attachment_Maintenance/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../Modules/IT/uploads/Asset_Document/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../Modules/IT/uploads/Asset_Photo/";
            rrmdir($FolderX);
            mkdir($FolderX);

            $FolderX = "../Modules/IT/uploads/Asset_Photo_Maintenance/";
            rrmdir($FolderX);
            mkdir($FolderX);



           
        }
    }





}//end valid session



?>