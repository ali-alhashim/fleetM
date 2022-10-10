<?php

require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to wipe All data table

   
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{


   if($row["object"] =="ALL" && $row["permission"] =="ALL")
   {
    $permissionResult = "valid";
    
    break;
   }
}

if($permissionResult == "invalid")
{
  // go back to your settings page you don't have permission to wipe data
    header("location: ../Settings.php");
}
elseif ($permissionResult =="valid" && $_POST["answer"] == 'wipe all Data Tables')
{
 // start wipes All tables data 
 echo(" start wipes All tables data ");
 $Tables = array('car_accident', 'car_users', 'cars', 'company', 'department', 'insurance',
                 'it_asset_maintenance', 'it_assets', 'it_assetsit_invoice', 'it_po', 'it_po_line', 'it_requests',
                 'it_supplier', 'it_users_assets', 'notifcations', 'requestes_for_cars', 'sold_cars'
                );

       $i = 0;
 while($i <= (sizeof($Tables) -1))
 {
    $sql = "DELETE FROM ".$Tables[$i].";";
    $conn->query($sql);   
    $i++;
 }



try
{


  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Wipe All data tables');";
  $conn->query($sql);
 
 // end adding action

header("Location: ../Settings.php");



}
catch(Exception $e)
{
echo($e->getMessage());
}
} // end valid user 

if($_POST["answer"] != 'wipe all Data Tables')
{
    // you did not write the conformation words to wipe all data table

    header("Location: ../Settings.php");
}

}

?>