<?php
// Add New Request for car 
require("../share/email/email.php");
require("../share/session.php");
// Expected to receive request with post :
// UserID, fullName,requestType , Justification, note, Department

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New Car Request


    if (!file_exists("../uploads/Cars_Request/".$_POST["UserID"]."/")) {
        mkdir("../uploads/Cars_Request/".$_POST["UserID"]."/", 0777, true);
    }


    // upload  Logo photo
  if(isset($_FILES['attachment']))
  {
   if (move_uploaded_file($_FILES["attachment"]["tmp_name"], "../uploads/Cars_Request/".$_POST["UserID"]."/".$_FILES["attachment"]["name"])) 
   {
     
     
      $FileUrl = "uploads/Cars_Request/".$_POST["UserID"].$_FILES["attachment"]["name"];

     
     
   }
  
  }
  else
  {
     $FileUrl = "";
  }


  $sql = "SELECT AUTO_INCREMENT
  FROM information_schema.tables
  WHERE table_name = 'requestes_for_cars'
  AND table_schema = DATABASE( ) ;";
  
  $resultNextID = $conn->query($sql);
  $rowNextID = $resultNextID->fetch_array(MYSQLI_ASSOC);

   

    $sql = " insert into `requestes_for_cars` (`user_id`, `full_name`, `badge_number`, `company`,  `department`,  `report_to`, `email`, `mobile`, `telphone_ext`, `file_url`,`justification`,`note`,`request_type`)
            values
            (
                ".$_POST["UserID"].",
                '".$_POST["fullName"]."',
                '".$_POST["badge_number"]."',
                '".$_POST["company"]."',
                '".$_POST["Department"]."',
                '".$_POST["reportTo"]."',
                '".$_POST["email"]."',
                '".$_POST["Mobile"]."',
                '".$_POST["telphone_ext"]."',
                '".$FileUrl."',
                '".$_POST["Justification"]."',
                '".$_POST["note"]."',
                '".$_POST["requestType"]."'
            );
";


try
{
$conn->query($sql);

 // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added  New Request    type ".$_POST["requestType"]."');";
 $conn->query($sql);

// end adding action

// send notification email for approval

//sendNotificationEmail('alhasham@akh.com.sa','New request '.$_POST["requestType"],'Dear Manager, <br/> there is new request awaiting  your action');


// send notification for users who has Request Approval permission
// check which permission group has  Request Approval
// first get the list of users and then insert notification data with thier ids




$sql = "select `permission_group_id`  from `permission` where `object` = 'RequestsApproval' and (`module` ='fleet' or `module` ='ALL') ";

$result =  $conn->query($sql);

while($row = $result->fetch_array(MYSQLI_ASSOC))
{
    $sql = "select `id` , `email` from `users` where `permission_group_id` = ".$row["permission_group_id"].";";
    $resultUsers = $conn->query($sql);
    while($rowUsers = $resultUsers->fetch_array(MYSQLI_ASSOC))
    {
        $sql = "insert into `notifcations` (`user_id`, `email`, `request_id`, `requester_name`, `brief`, `response`)
                values
                (
                    ".$rowUsers["id"].",
                    '".$rowUsers["email"]."',
                    ".$rowNextID["AUTO_INCREMENT"].",
                    '".$_POST["fullName"]."',
                    '".$_POST["requestType"]."',
                    'null'
                )
        ";
               
        $conn->query($sql);
    }
}


header("Location: ../UserDetails.php?id=".$_POST["UserID"]);

}
catch(Exception $e)
{
echo($e->getMessage());
}


}
