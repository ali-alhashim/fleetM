<?php
// Add new user

require("../share/session.php");
// Expected to receive request with post :

// fullName, GOVID, BadgeNumber, Company, Department, ReportTo,
// DrivingLicense, OfficeAddress, email, mobile, TelphoneExt, 
// password, PermissionGroup, PermissionGroupID,
// JoinDate, Status, note,


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add user
     
    $sql="insert into users 
    (`full_name`, `gov_id`, `mobile_number`, `company`, `company_id`, 
    `department`, `department_id`, `report_to_id`, `report_to`, `badge_number`,
    `office_address`, `telphone_ext`, `email`, `password`, `permission_group_id`,
    `permission_group`, `join_date`, `status`, `note`, `driving_license_url`
    )
    values('".$_POST["fullName"]."', '".$_POST["GOVID"]."',
           '".$_POST["mobile"]."', '".$_POST["Company"]."',
           '".$_POST["companyID"]."', '".$_POST["Department"]."',
           '".$_POST["department_id"]."', '".$_POST["ReportToID"]."',
           '".$_POST["ReportTo"]."', '".$_POST["BadgeNumber"]."',
           '".$_POST["OfficeAddress"]."', '".$_POST["TelphoneExt"]."', '".$_POST["email"]."',
           '".password_hash($_POST["password"],PASSWORD_DEFAULT)."', '".$_POST["PermissionGroupID"]."',
           '".$_POST["PermissionGroup"]."', '".$_POST["JoinDate"]."',
           '".$_POST["Status"]."', '".$_POST["note"]."',
           '".$_POST["DrivingLicense"]."'
    )
    ";

    

    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New User ".$_POST["fullName"]."');";
 $conn->query($sql);

// end adding action


     header("Location: ../UsersList.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }
   
}

?>