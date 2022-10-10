<?php
/**Action to handover Asset **/
require("../../../share/session.php");
// Expected to receive request with post :
// AssetID, AssetUserID, CurrentAssetUserName,CurrentAssetUserID
// receivedDate, handoverDate, note,NewUserName, NewUserID
// NewReceivedDate, noteForNewAssetUser  , NewUserEmail  , Department

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to create handover record


     $sql = "update `it_users_assets` set `note` = '".$_POST["note"]."', `handover_date` = '".$_POST["handoverDate"]."' where `id` = ".$_POST["AssetUserID"].";";

     $conn->query($sql);
    try
    {
     
     $sql = "select `serial_number`, `category`, `manufacture`, `model`, `description`  from it_assets where `id` =".$_POST["AssetID"].";";
     $result = $conn->query($sql);
     $row = $result->fetch_array(MYSQLI_ASSOC);

     $sql = "insert into `it_users_assets` (`asset_id`, `user_id`,`user_name`, `received_date`,`note`, `email`, `department`, `serial_number`, `category`, `manufacture`, `model`, `description`)
             values(".$_POST["AssetID"].",
                    ".$_POST["NewUserID"].",
                    '".$_POST["NewUserName"]."',
                    
                    '".$_POST["NewReceivedDate"]."',
                    '".$_POST["noteForNewAssetUser"]."',
                    '".$_POST["NewUserEmail"]."',
                    '".$_POST["Department"]."',
                    '".$row["serial_number"]."',
                    '".$row["category"]."',
                    '".$row["manufacture"]."',
                    '".$row["model"]."',
                    '".$row["description"]."'
                   
             )
     ";

     $conn->query($sql);

     // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','handover Asset  ID ".$_POST["AssetID"]." to ".$_POST["NewUserName"]."');";
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