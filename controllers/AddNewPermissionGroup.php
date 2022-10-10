<?php
require("../share/session.php");
// Expected to receive request with post :
// PermissionGroup, PermissionGroupID, ModuleLine<X>, ObjectLine<X>,PermissionLine<X>, TotalPermissionLines



if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to settings
    $sql = "select `object`, `permission` from `permission` where  `permission_group_id` = ". $_SESSION["permission_group_id"] ." and `object` ='Settings'";

if(isset($_POST["PermissionGroup"]))
{
    $sql = "insert into `permission_group` (`id`, `permission_group`, `createdby`)
    values(".$_POST["PermissionGroupID"].", '".$_POST["PermissionGroup"]."', '".$_POST["createdby"]."');
    ";

    if($conn->query($sql))
    {
        $count =1;

        while($count <= $_POST["TotalPermissionLines"])
        {
        $sql = "insert into `permission` (`permission_group_id`, `module`, `object`, `permission`, `createdby`)
        values(".$_POST["PermissionGroupID"].", '".$_POST["ModuleLine".$count.""]."', '".$_POST["ObjectLine".$count.""]."', '".$_POST["PermissionLine".$count.""]."', '". $_SESSION["email"] ."') ";
        $conn->query($sql);
        $count++;
        }



        // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New Permission Group ".$_POST["PermissionGroup"]."');";
 $conn->query($sql);

// end adding action

        header("Location:../Settings.php");

    }

}
}

?>