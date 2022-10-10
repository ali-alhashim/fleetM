<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :

// frontPhoto, backPhoto, rightPhoto, leftPhoto, doorNumber, model
// Brand, yearMake, PlateNumber, SerialNumber, VID, color, seats, FuelType,
// CarStatus, InspectionExpiration, Odometer, Note, BodyType
// OwnerName, OwnerID, LicenseExpiration, LicenseSoftCopy
// GPS, FuelChip, PurchasedDate, PurchasedAmount,

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add Car


    //-----------------------------------------------
    $sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
    $permissionResult = "invalid";
    $result = $conn->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
       if($row["object"] =="CarsList" && $row["permission"] =="A")
       {
        $permissionResult = "valid";
        break;
       }

       if($row["object"] =="ALL" && $row["permission"] =="ALL")
       {
        $permissionResult = "valid";
        break;
       }
    }

    //--------------------------------------------------

    if($permissionResult == "valid")
    {



    if (!file_exists("../uploads/Cars_Photo/".$_POST["SerialNumber"]."/")) {
        mkdir("../uploads/Cars_Photo/".$_POST["SerialNumber"]."/", 0777, true);
    }


    if (!file_exists("../uploads/Cars_License/".$_POST["SerialNumber"]."/")) {
        mkdir("../uploads/Cars_License/".$_POST["SerialNumber"]."/", 0777, true);
    }


    $target_CarsPhoto = "../uploads/Cars_Photo/".$_POST["SerialNumber"]."/";
   
    $target_LicenseSoftCopy = "../uploads/Cars_License/".$_POST["SerialNumber"]."/";

   

   // upload  Front photo
  if(isset($_FILES['frontPhoto']))
  {
   if (move_uploaded_file($_FILES["frontPhoto"]["tmp_name"], $target_CarsPhoto ."CarPhoto_".$_POST["SerialNumber"].$_FILES["frontPhoto"]["name"])) 
   {
     
     
      $frontPhoto = "uploads/Cars_Photo/".$_POST["SerialNumber"]."/CarPhoto_".$_POST["SerialNumber"].$_FILES["frontPhoto"]["name"];
     
   }
   else
   {
      $frontPhoto = "";
   }
  }

   // upload Back Photo
   if(isset($_FILES['backPhoto']))
   {
    if (move_uploaded_file($_FILES["backPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["SerialNumber"].$_FILES["backPhoto"]["name"])) 
    {
      
      
       $backPhoto = "uploads/Cars_Photo/".$_POST["SerialNumber"]."/CarPhoto_".$_POST["SerialNumber"].$_FILES["backPhoto"]["name"];
      
    }
    else
    {
        $backPhoto = "";
    }
   }

   // upload right Photo
   if(isset($_FILES['rightPhoto']))
   {
    if (move_uploaded_file($_FILES["rightPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["SerialNumber"].$_FILES["rightPhoto"]["name"])) 
    {
      
      
       $rightPhoto = "uploads/Cars_Photo/".$_POST["SerialNumber"]."/CarPhoto_".$_POST["SerialNumber"].$_FILES["rightPhoto"]["name"];
      
    }
    else
    {
        $rightPhoto = "";
    }
   }

    // upload left Photo
    if(isset($_FILES['leftPhoto']))
   {
    if (move_uploaded_file($_FILES["leftPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["SerialNumber"].$_FILES["leftPhoto"]["name"])) 
    {
      
      
       $leftPhoto = "uploads/Cars_Photo/".$_POST["SerialNumber"]."/CarPhoto_".$_POST["SerialNumber"].$_FILES["leftPhoto"]["name"];
      
    }
    else
    {
        $leftPhoto = "";
    }
   }

    //License Soft Copy
    if(isset($_FILES['LicenseSoftCopy']))
    {
     if (move_uploaded_file($_FILES["LicenseSoftCopy"]["tmp_name"],  $target_LicenseSoftCopy ."-".$_FILES["LicenseSoftCopy"]["name"])) 
     {
        $LicenseSoftCopy = $target_LicenseSoftCopy."-".$_FILES["LicenseSoftCopy"]["name"];
     }
     else
     {
        $LicenseSoftCopy = "";
     }
    }


    if (isset($_POST['GPS'])) 
    {
    $GPS = 1;
    }
    else
    {
    $GPS = 0;
    }    


    if (isset($_POST['FuelChip'])) 
    {
    $FuelChip = 1;
    }
    else
    {
    $FuelChip = 0;
    }    
   

    $sql = "insert into `cars` 
    (`vid`, `door_number`, `plate_number`, `body_type`,  `brand`,  
     `model`,  `year_make`,  `image_front_url`, `image_back_url`,
     `image_right_url`,   `image_left_url`,  `seats`,   `note`, 
     `registration_expiration`,  `registration_url`,  `inspection_expiration`,
     `odometer`,    `owner_name`,   `owner_id`,   `fuel_type`, `car_status`,
     `gps_tracking`,  `fuel_chip`, `purchased_price`, `purchased_date`, 
     `serial_number`, `car_color`)

     values
     (
         '".$_POST["VID"]."', '".$_POST["doorNumber"]."', '".$_POST["PlateNumber"]."',
         '".$_POST["BodyType"]."', '".$_POST["Brand"]."', '".$_POST["model"]."',
         '".$_POST["yearMake"]."', '".$frontPhoto."', '".$backPhoto."', '".$rightPhoto."',
         '".$leftPhoto."',".$_POST["seats"].", '".$_POST["Note"]."','".$_POST["LicenseExpiration"]."',
         '".$LicenseSoftCopy."', '".$_POST["InspectionExpiration"]."', '".$_POST["Odometer"]."',
         '".$_POST["OwnerName"]."', '".$_POST["OwnerID"]."','".$_POST["FuelType"]."',
         '".$_POST["CarStatus"]."', ".$GPS.", ".$FuelChip.",
         ".$_POST["PurchasedAmount"].", '".$_POST["PurchasedDate"]."',
         '".$_POST["SerialNumber"]."', '".$_POST["color"]."'  
     )
    ";


    try
    {
     $conn->query($sql);

       // add action to log table

       $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New Car  Serial Number ".$_POST["SerialNumber"]."');";
       $conn->query($sql);
  
     // end adding action

     header("Location: ../carsData.php");

    }
    catch(Exception $e)
    {
       echo($e->getMessage());
    }
   

}
else
{
   echo("you dont have permission to add new car");
}
}

?>