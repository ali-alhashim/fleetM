<?php
// Add New Department 

require("../share/session.php");
// Expected to receive request with post :
// CarID, DriverName, DriverID, ReceivedDate, CompanyName, Department, project, projectCode

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New Car Driver

    $sql = " insert into `car_users` (`driver_name`, `driver_id`, `car_id`, `received_date`,  `company`,  `department`, `project`, `project_code`, `mobile_number`)
    values('".$_POST["DriverName"]."', ".$_POST["DriverID"].", ".$_POST["CarID"].", '".$_POST["ReceivedDate"]."', '".$_POST["CompanyName"]."', '".$_POST["Department"]."',
           '".$_POST["project"]."', '".$_POST["projectCode"]."', '".$_POST["mobile_number"]."'
           );
";


try
{
$conn->query($sql);


  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New Car  Driver ".$_POST["DriverName"]." for Car ID ".$_POST["CarID"]."');";
  $conn->query($sql);

// end adding action

header("Location: ../carDetails.php?id=".$_POST["CarID"]);

}
catch(Exception $e)
{
echo($e->getMessage());
}


}

?>