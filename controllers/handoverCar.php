<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :
//carID, RecordID => [car_users] , CurrentDriverName, CurrentDriverID, receivedDate,
// handoverDate, note, NewDriverName, NewDriverID, noteForNewDriver, project,

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to add  Car driver


     $sql = "update `car_users` set `note` = '".$_POST["note"]."', `handover_date` = '".$_POST["handoverDate"]."' where `id` = ".$_POST["RecordID"].";";


    try
    {
     $conn->query($sql);

     $sql = "insert into `car_users` (`car_id`, `driver_id`,`driver_name`, `mobile_number`,`received_date`,`note`,`project` )
             values(".$_POST["carID"].",
                    ".$_POST["NewDriverID"].",
                    '".$_POST["NewDriverName"]."',
                    '".$_POST["mobile"]."',
                    '".$_POST["NewReceivedDate"]."',
                    '".$_POST["noteForNewDriver"]."',
                    '".$_POST["project"]."'
             )
     ";

     $conn->query($sql);

     // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','handover car  ID ".$_POST["carID"]." to ".$_POST["NewDriverName"]."');";
 $conn->query($sql);

// end adding action

     header("Location: ../carsData.php");

    }
    catch(Exception $e)
    {
       echo($e->getMessage());
    }

}

?>