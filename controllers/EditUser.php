<?php

require("../share/session.php");
// Expected to receive request with post :
// UserID, full_name, GovID, BadgeNo, company, Department,jobTitle,
// ReportTo,DrivingLicenseURL,officeAddress,email,mobile,
// TelphoneExt, permissionGroup, PermissionID,JoinDate,
// status, note , arabic_name, DOB

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Edit user

   
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
  if($row["object"] =="Profile_page" && $row["permission"] =="E")
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

if($permissionResult == "invalid")
{
  // go back to your profile page you don't have permission to edit
    header("location: ../UserDetails.php?id=".$_SESSION["id"]);
}
elseif ($permissionResult =="valid")
{
 // start edit you are granted to edit
$sql = "update `users`
        set `full_name` ='".$_POST["full_name"]."',
             `gov_id`   ='".$_POST["GovID"]."',
             `mobile_number` = '".$_POST["mobile"]."',
             `company` = '".$_POST["company"]."',

             `department` = '".$_POST["Department"]."',

             `job_title` = '".$_POST["jobTitle"]."',

             `report_to` = '".$_POST["ReportTo"]."',

             `badge_number` = '".$_POST["BadgeNo"]."',

             `office_address` = '".$_POST["officeAddress"]."',

             `telphone_ext` = '".$_POST["TelphoneExt"]."',

             `email` = '".$_POST["email"]."',
             
             `permission_group` = '".$_POST["permissionGroup"]."',

             `permission_group_id` = '".$_POST["PermissionID"]."',

             `join_date` = '".$_POST["JoinDate"]."',

             `status` = '".$_POST["status"]."',

             `note` = '".$_POST["note"]."',
             `arabic_name` = '".$_POST["arabic_name"]."',

             `date_of_birth` = '".$_POST["DOB"]."'


        where `id` =".$_POST["UserID"].";
       ";


try
{
$conn->query($sql);


  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Edit User ID ".$_POST["UserID"]." name:".$_POST["full_name"]."');";
  $conn->query($sql);
 
 // end adding action

header("Location: ../UserDetails.php?id=".$_POST["UserID"]);



}
catch(Exception $e)
{
echo($e->getMessage());
}
} // end valid user 
}

?>