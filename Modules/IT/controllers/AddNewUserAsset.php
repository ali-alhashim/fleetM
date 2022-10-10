<?php
// Add new IT Asset User

require("../../../share/session.php");

// userName, userID, Email, mobile_number, CompanyName, Department, ReceivedDate,

// prepared_by, checked_by, note

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT Asset User


    $sql = "select `serial_number`, `category`, `manufacture`, `model`, `description`  from it_assets where `id` =".$_POST["AssetID"].";";
     $result = $conn->query($sql);
     $row = $result->fetch_array(MYSQLI_ASSOC);


    $sql = "insert into `it_users_assets` (`asset_id`, `user_name`, `user_id`, `email`, 
            `department`, `prepared_by`, `checked_by`, `note`, `received_date`, `serial_number`, `category`, `manufacture`, `model`, `description`) values
             (
               '".$_POST["AssetID"]."',
               '".$_POST["userName"]."',
               '".$_POST["userID"]."',
               '".$_POST["Email"]."',
               '".$_POST["Department"]."',
               '".$_POST["prepared_by"]."',
               '".$_POST["checked_by"]."',
               '".$_POST["note"]."',
               '".$_POST["ReceivedDate"]."',
               '".$row["serial_number"]."',
               '".$row["category"]."',
               '".$row["manufacture"]."',
               '".$row["model"]."',
               '".$row["description"]."'
             )";



    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New IT Asset User   # ".$_POST["AssetID"]."');";
 $conn->query($sql);

// end adding action

     $sql = "select `id` from `it_users_assets` order by `id` DESC  limit 1";
     $result = $conn->query($sql);
     $row = $result->fetch_array(MYSQLI_ASSOC);


     
      $assetUser = $row["id"] ;
     





     header("Location: ../AssetUserDetails.php?id=".$assetUser);

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}

?>