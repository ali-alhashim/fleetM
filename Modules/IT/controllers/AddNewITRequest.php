<?php
// Add new IT Request

require("../../../share/session.php");

// RequesterName, RequesterID, department, badge_number, mobile_number
// RequestType, Description, justification



if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT Request


    $sql = "insert into `it_requests` (`requester_id`, `requester_name`, `department`, `badge_number`, `request_type`, `mobile`, `description`, `justification`, `status`) 
            values 
            (
                '".$_POST["RequesterID"]."',
                '".$_POST["RequesterName"]."',
                '".$_POST["department"]."',
                '".$_POST["badge_number"]."',
                '".$_POST["RequestType"]."',
                '".$_POST["mobile_number"]."',
                '".$_POST["Description"]."',
                '".$_POST["justification"]."',
                '1'
            );";



    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New IT Request  Name # ".$_POST["RequesterName"]."');";
 $conn->query($sql);

// end adding action


     header("Location: ../profile.php?id=".$_POST["RequesterID"]);

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}

?>