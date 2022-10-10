<?php

require("../../../share/session.php");


// change request status and add response and change notifiction response
date_default_timezone_set('Asia/Riyadh');
if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    // check also he have permission to Apporve requests 

    $sql = "update `it_requests` set
            `status` = 2,
            `response` = 'Approved',
            `response_note` = '".$_POST["response_note"]."',
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

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Approved Request #".$_POST["RequestID"]."');";
 $conn->query($sql);

// end adding action


// update notification 

$sql = "update `notifcations` set 
        `response` = 'Approved'
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