<?php
/**Action to Sale car */
// Expected to receive request with post :
// carID, vid, serial_number, door_number, plate_number,brand
// model, year_make, odometer, owner_name, owner_id,
// new_owner_name, new_owner_id, new_owner_mobile ,
// ownership_transfer_status, sold_price, sold_date, note

require("../share/session.php");
if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Sale Car 

    $sql ="insert into `sold_cars` (`car_id`,  `vid`,  `door_number`, `plate_number`, 
                        `brand`, `model`, `year_make`, `note`,`odometer`, 
                         `owner_name`,  `owner_id`, `new_owner_name`, `new_owner_id`,
                         `new_owner_mobile`,  `ownership_transfer_status` ,`sold_price`,
                         `sold_date`,  `serial_number` )
    values 
    (
     '".$_POST["carID"]."',
     '".$_POST["vid"]."',
     '".$_POST["door_number"]."',
     '".$_POST["plate_number"]."',
     '".$_POST["brand"]."',
     '".$_POST["model"]."',
     '".$_POST["year_make"]."',
     '".$_POST["note"]."',
     '".$_POST["odometer"]."',
     '".$_POST["owner_name"]."',
     '".$_POST["owner_id"]."',
     '".$_POST["new_owner_name"]."',
     '".$_POST["new_owner_id"]."',
     '".$_POST["new_owner_mobile"]."',
     '".$_POST["ownership_transfer_status"]."',
     '".$_POST["sold_price"]."',
     '".$_POST["sold_date"]."',
     '".$_POST["serial_number"]."'
    )
    ";

    try
    {

      $conn->query($sql);
       // update sold car in cars table to be sold

       $sql = "update cars set car_status = 'Sold' where `id` =".$_POST["carID"].";";

       $conn->query($sql);

           // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Sale car  ID ".$_POST["carID"]." to ".$_POST["new_owner_name"]."');";
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