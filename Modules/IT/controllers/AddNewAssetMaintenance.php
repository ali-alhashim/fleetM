<?php
// Add new IT Asset Maintenance

require("../../../share/session.php");
// Expected to receive request with post :

// asset_id, serial_number,invoice_number, maintenance_by,
// condition, maintenance_cost, description, Maintenance_date
// warranty , note

// frontPhoto, backPhoto, rightPhoto, leftPhoto, maintenance_url


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT Asset



    if (!file_exists("../uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/")) 
    {
      mkdir("../uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/", 0777, true);
    }

    if (!file_exists("../uploads/Asset_Attachment_Maintenance/".$_POST["asset_id"]."/")) 
    {
      mkdir("../uploads/Asset_Attachment_Maintenance/".$_POST["asset_id"]."/", 0777, true);
    }


    $target_AssetPhoto = "../uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/";

    $target_AssetAttachmen = "../uploads/Asset_Attachmen_Maintenance/".$_POST["asset_id"]."/";

     //upload attachment
    if(isset($_FILES['maintenance_url']))
    {
     if (move_uploaded_file($_FILES["maintenance_url"]["tmp_name"], $target_AssetAttachmen .$_FILES["maintenance_url"]["name"])) 
     {
       
       
        $AssetAttachmen = "uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/".$_FILES["maintenance_url"]["name"];
       
     }
     else
     {
        $AssetAttachmen = "";
     }
    }
  


     // upload  Front photo
  if(isset($_FILES['frontPhoto']))
  {
   if (move_uploaded_file($_FILES["frontPhoto"]["tmp_name"], $target_AssetPhoto .$_FILES["frontPhoto"]["name"])) 
   {
     
     
      $frontPhoto = "uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/".$_FILES["frontPhoto"]["name"];
     
   }
   else
   {
      $frontPhoto = "";
   }
  }



      // upload  back photo
  if(isset($_FILES['backPhoto']))
  {
   if (move_uploaded_file($_FILES["backPhoto"]["tmp_name"], $target_AssetPhoto .$_FILES["backPhoto"]["name"])) 
   {
     
     
      $backPhoto = "uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/".$_FILES["backPhoto"]["name"];
     
   }
   else
   {
      $backPhoto = "";
   }
  }




      // upload  right photo
      if(isset($_FILES['rightPhoto']))
      {
       if (move_uploaded_file($_FILES["rightPhoto"]["tmp_name"], $target_AssetPhoto .$_FILES["rightPhoto"]["name"])) 
       {
         
         
          $rightPhoto = "uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/".$_FILES["rightPhoto"]["name"];
         
       }
       else
       {
          $rightPhoto = "";
       }
      }


       // upload  left photo
       if(isset($_FILES['leftPhoto']))
       {
        if (move_uploaded_file($_FILES["leftPhoto"]["tmp_name"], $target_AssetPhoto .$_FILES["leftPhoto"]["name"])) 
        {
          
          
           $leftPhoto = "uploads/Asset_Photo_Maintenance/".$_POST["asset_id"]."/".$_FILES["leftPhoto"]["name"];
          
        }
        else
        {
           $leftPhoto = "";
        }
       }




     
   $sql = "insert into `it_asset_maintenance` (`maintenance_photo1`, `maintenance_photo2`, `maintenance_photo3`, 
                                               `maintenance_photo4`, `maintenance_url`, `asset_id`, `invoice_number`, 
                                               `serial_number`, `maintenance_by`, `condition`, `maintenance_cost`, `description`, `maintenance_date`, `warranty`, `note`) values 
   (
       
        '".$frontPhoto."',
        '".$backPhoto."',
        '".$rightPhoto."',
        '".$leftPhoto."',
        '".$AssetAttachmen."',
        '".$_POST["asset_id"]."',
        '".$_POST["invoice_number"]."',
        '".$_POST["serial_number"]."',
        '".$_POST["maintenance_by"]."',
        '".$_POST["condition"]."',
        '".$_POST["maintenance_cost"]."',
        '".$_POST["description"]."',
        '".$_POST["Maintenance_date"]."',
        '".$_POST["warranty"]."',
        '".$_POST["note"]."'

        
        


    );";

    

    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added new it_asset_maintenance # ".$_POST["asset_id"]."');";
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