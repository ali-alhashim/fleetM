<?php
// Add new IT Asset

require("../../../share/session.php");
// Expected to receive request with post :

// serialNumber, Category, Manufacture, Model, Description, CreationDate,
// PO_ID, supplier_name, supplier_id, invoice_number, location,
// department, purchased_price, purchasedDate, AssetDate, note, Condition

// frontPhoto, backPhoto, rightPhoto, leftPhoto


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT Asset



    if (!file_exists("../uploads/Asset_Photo/".$_POST["serialNumber"]."/")) 
    {
      mkdir("../uploads/Asset_Photo/".$_POST["serialNumber"]."/", 0777, true);
    }

    $target_AssetPhoto = "../uploads/Asset_Photo/".$_POST["serialNumber"]."/";


     // upload  Front photo
  if(isset($_FILES['frontPhoto']))
  {
   if (move_uploaded_file($_FILES["frontPhoto"]["tmp_name"], $target_AssetPhoto .$_FILES["frontPhoto"]["name"])) 
   {
     
     
      $frontPhoto = "uploads/Asset_Photo/".$_POST["serialNumber"]."/".$_FILES["frontPhoto"]["name"];
     
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
     
     
      $backPhoto = "uploads/Asset_Photo/".$_POST["serialNumber"]."/".$_FILES["backPhoto"]["name"];
     
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
         
         
          $rightPhoto = "uploads/Asset_Photo/".$_POST["serialNumber"]."/".$_FILES["rightPhoto"]["name"];
         
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
          
          
           $leftPhoto = "uploads/Asset_Photo/".$_POST["serialNumber"]."/".$_FILES["leftPhoto"]["name"];
          
        }
        else
        {
           $leftPhoto = "";
        }
       }




     
   $sql = "insert into `it_assets` (`serial_number`, `category`, `manufacture`, `model`, `description`, `po_id`, `supplier_name`, `supplier_id`, `invoice_number`, `location`, `department`, `purchased_price`, `purchased_date`, `asset_date`, `note`, `condition`, `asset_photo1`, `asset_photo2`, `asset_photo3`, `asset_photo4`  ) values 
   (
        '".$_POST["serialNumber"]."',
        '".$_POST["Category"]."',
        '".$_POST["Manufacture"]."',
        '".$_POST["Model"]."',
        '".$_POST["Description"]."',
         '".$_POST["PO_ID"]."',
        '".$_POST["supplier_name"]."',
        '".$_POST["supplier_id"]."',
        '".$_POST["invoice_number"]."',
        '".$_POST["location"]."',
        '".$_POST["department"]."',
        '".$_POST["purchased_price"]."',
        '".$_POST["purchasedDate"]."',
        '".$_POST["AssetDate"]."',
        '".$_POST["note"]."',
        '".$_POST["Condition"]."',
        '".$frontPhoto."',
        '".$backPhoto."',
        '".$rightPhoto."',
        '".$leftPhoto."'


    );";

    

    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New IT Asset Serial # ".$_POST["serialNumber"]."');";
 $conn->query($sql);

// end adding action


     header("Location: ../Assets.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }
   
}

?>