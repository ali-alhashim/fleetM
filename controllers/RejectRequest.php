<?php

require("../share/session.php");
// Expected to receive request with post :
// RequestID, $_SESSION["id"], $_SESSION["full_name"], $_SESSION["email"] ,

// change request status and add response and change notifiction response
date_default_timezone_set('Asia/Riyadh');
if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    // check also he have permission to Apporve requests 

    $sql = "update `requestes_for_cars` set
            `status` = 0,
            `transportation_response` = 'Rejected',
            `response_by_id` = ".$_SESSION["id"].",
            `response_by_name` = '".$_SESSION["full_name"]."',
            `response_by_email` = '".$_SESSION["email"]."',
            `response_by_date` = '".date("Y-m-d")."'

            where id = ".$_POST["RequestID"]." ;

    ";

    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Reject Request #".$_POST["RequestID"]."');";
 $conn->query($sql);

// end adding action


// update notification 

$sql = "update `notifcations` set 
        `response` = 'Rejected'
         where `request_id` = ".$_POST["RequestID"]."; 
       ";
       $conn->query($sql);


    header("Location: ../requestDetails.php?id=".$_POST["RequestID"]);

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}


?>