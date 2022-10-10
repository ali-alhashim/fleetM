<?php
/**Action to update user Asset **/
require("../../../share/session.php");
// Expected to receive request with post :
//AssetUserID, asset_id, creation_date, SerialNumber, location, department
// category, manufacture, model, condition,description, received_date
// user_name, user_id, email, Note, document

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to update User Asset record

    if (!file_exists("../uploads/AssetRegister/".$_POST["AssetUserID"]."/")) 
    {
      mkdir("../uploads/AssetRegister/".$_POST["AssetUserID"]."/", 0777, true);
    }

    if(isset($_FILES['document']))
    {
     if (move_uploaded_file($_FILES["document"]["tmp_name"], "../uploads/AssetRegister/".$_POST["AssetUserID"]."/" .$_FILES["document"]["name"])) 
     {
       
       
        $document = "uploads/AssetRegister/".$_POST["AssetUserID"]."/".$_FILES["document"]["name"];

        $documentX = "`asset_url` = '".$document."',";
       
     }
     else
     {
        $documentX = "";
     }
    }


     $sql = "update `it_users_assets` set 
             $documentX
             `location` ='".$_POST["location"]."',
             `department` = '".$_POST["department"]."',
             `condition` = '".$_POST["condition"]."',
             `note` = '".$_POST["Note"]."',
             `handover_date` = '".$_POST["handover_date"]."'
              where `id` = ".$_POST["AssetUserID"].";";

     $conn->query($sql);
    try
    {
     
     

     // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','update User Asset  ID ".$_POST["AssetID"]." for ".$_POST["NewUserName"]."');";
 $conn->query($sql);

// end adding action




     header("Location: ../AssetDetails.php?id=".$_POST["asset_id"]);

    }
    catch(Exception $e)
    {
       echo($e->getMessage());
    }

}

?>