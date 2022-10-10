<?php
// Add New Department 

require("../share/session.php");
// Expected to receive request with post :
// CompanyName, companyID, DepartmentName, DepartmentManagerName, ManagerID,

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add Department

    $sql = " insert into `department` (`company_name`, `company_id`, `department_name`, `manager_name`, `manager_id`)
    values('".$_POST["CompanyName"]."', '".$_POST["companyID"]."', '".$_POST["DepartmentName"]."', '".$_POST["DepartmentManagerName"]."', '".$_POST["ManagerID"]."');
";


try
{
$conn->query($sql);

 // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New Deprtment ".$_POST["DepartmentName"]."');";
 $conn->query($sql);

// end adding action

header("Location: ../Settings.php");

}
catch(Exception $e)
{
echo($e->getMessage());
}
}

?>