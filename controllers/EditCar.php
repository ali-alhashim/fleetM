<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :

// frontPhoto, backPhoto, rightPhoto, leftPhoto, doorNumber, model
// Brand, yearMake, PlateNumber, SerialNumber, VID, color, seats, FuelType,
// CarStatus, InspectionExpiration, Odometer, Note, BodyType
// OwnerName, OwnerID, LicenseExpiration, LicenseSoftCopy
// GPS, FuelChip, PurchasedDate, PurchasedAmount, carID

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Edit Car

    if (!file_exists("../uploads/Cars_Photo/".$_POST["carID"]."/")) {
        mkdir("../uploads/Cars_Photo/".$_POST["carID"]."/", 0777, true);
    }


    if (!file_exists("../uploads/Cars_License/".$_POST["carID"]."/")) {
        mkdir("../uploads/Cars_License/".$_POST["carID"]."/", 0777, true);
    }


    $target_CarsPhoto = "../uploads/Cars_Photo/".$_POST["carID"]."/";
   
    

   

   // upload  Front photo
  if(isset($_FILES['frontPhoto']))
  {
   if (move_uploaded_file($_FILES["frontPhoto"]["tmp_name"], $target_CarsPhoto . $_FILES["frontPhoto"]["name"])) 
   {
     
     
      $frontPhoto = "uploads/Cars_Photo/".$_POST["carID"]."/".$_FILES["frontPhoto"]["name"];
     
      $frontPhotoX = "`image_front_url`    = '".$frontPhoto."',";
   }
   else
   {
    $frontPhotoX = "";

   }
  }

   // upload Back Photo
   if(isset($_FILES['backPhoto']))
   {
    if (move_uploaded_file($_FILES["backPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["carID"].$_FILES["backPhoto"]["name"])) 
    {
      
      
       $backPhoto = "uploads/Cars_Photo/".$_POST["carID"]."/CarPhoto_".$_POST["carID"].$_FILES["backPhoto"]["name"];

       $backPhotoX = "`image_back_url`     = '".$backPhoto."',";
      
    }
    else
    {
        $backPhotoX = "";
    }
   }

   // upload right Photo
   if(isset($_FILES['rightPhoto']))
   {
    if (move_uploaded_file($_FILES["rightPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["carID"].$_FILES["rightPhoto"]["name"])) 
    {
      
      
       $rightPhoto = "uploads/Cars_Photo/".$_POST["carID"]."/CarPhoto_".$_POST["carID"].$_FILES["rightPhoto"]["name"];

       $rightPhotoX = "`image_right_url`    = '".$rightPhoto."',";
      
    }
    else
    {
        $rightPhotoX = "";
    }
   }

    // upload left Photo
    if(isset($_FILES['leftPhoto']))
   {
    if (move_uploaded_file($_FILES["leftPhoto"]["tmp_name"],  $target_CarsPhoto ."CarPhoto_".$_POST["carID"].$_FILES["leftPhoto"]["name"])) 
    {
      
      
       $leftPhoto = "uploads/Cars_Photo/".$_POST["carID"]."/CarPhoto_".$_POST["carID"].$_FILES["leftPhoto"]["name"];

       $leftPhotoX ="`image_left_url`     = '".$leftPhoto."',";
      
    }
    else
    {
        $leftPhotoX = "";
    }
   }



   $target_LicenseSoftCopy = "../uploads/Cars_License/".$_POST["carID"]."/";

    //License Soft Copy
    if(isset($_FILES['LicenseSoftCopy']))
    {
     if (move_uploaded_file($_FILES["LicenseSoftCopy"]["tmp_name"],  $target_LicenseSoftCopy . $_FILES["LicenseSoftCopy"]["name"])) 
     {

        $LicenseSoftCopy  = "uploads/Cars_License/".$_POST["carID"]."/".$_FILES["LicenseSoftCopy"]["name"];

       

        $LicenseSoftCopyX = "`registration_url`              = '".$LicenseSoftCopy."',";
     }
     else
     {
        $LicenseSoftCopyX = "";
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

    date_default_timezone_set('Asia/Riyadh');

     $sql = "update `cars`
              set `last_modified` = '".date("Y-m-d H:i:s")."',
                   `vid`          = '".$_POST["VID"]."',
                   `door_number`  = '".$_POST["doorNumber"]."',
                   `plate_number` = '".$_POST["PlateNumber"]."',
                   `brand`        = '".$_POST["Brand"]."',
                   `model`        = '".$_POST["model"]."',
                   `year_make`    = '".$_POST["yearMake"]."',
                   $frontPhotoX
                   $backPhotoX
                   $rightPhotoX
                   $leftPhotoX
                      `seats`     = '".$_POST["seats"]."',
                      `note`      = '".$_POST["Note"]."',
  `registration_expiration`       = '".$_POST["LicenseExpiration"]."',
  $LicenseSoftCopyX
  `inspection_expiration`         = '".$_POST["InspectionExpiration"]."',
  `odometer`                      = '".$_POST["Odometer"]."',
  `owner_name`                    = '".$_POST["OwnerName"]."',
  `owner_id`                      = '".$_POST["OwnerID"]."',
  `fuel_type`                     = '".$_POST["FuelType"]."',
  `car_status`                    = '".$_POST["CarStatus"]."',
  `gps_tracking`                  = ".$GPS.",
  `fuel_chip`                     = ".$FuelChip.",
  `purchased_price`               = ".$_POST["PurchasedAmount"].",
  `purchased_date`                = '".$_POST["PurchasedDate"]."',
  `serial_number`                 = '".$_POST["SerialNumber"]."',
  `car_color`                     = '".$_POST["color"]."'
              where `id`=".$_POST["carID"].";";


    
try
{
$conn->query($sql);


  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Edit Car ID ".$_POST["carID"]."');";
  $conn->query($sql);
 
 // end adding action

header("Location: ../carDetails.php?id=".$_POST["carID"]);



}
catch(Exception $e)
{
echo($e->getMessage());
}



}

?>