<?php
require("../share/session.php");
// Expected to receive request with post :
// CarID, CompanyName, PolicyNumber, insuranceClass, InsuredValue
// TypeRepair, ExcessAmount, InsuranceAmount, note, DocumentURL, InsuranceStart, InsuranceEnd

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New Car insurance


    if (!file_exists("../uploads/Cars_Insurance/".$_POST["CarID"]."/")) {
        mkdir("../uploads/Cars_Insurance/".$_POST["CarID"]."/", 0777, true);
    }

    $target_CarsInsurance = "../uploads/Cars_Insurance/".$_POST["CarID"]."/";

     // upload  Cars_Insurance
  if(isset($_FILES['DocumentURL']))
  {
   if (move_uploaded_file($_FILES["DocumentURL"]["tmp_name"], $target_CarsInsurance  ."CarInsurance_".$_POST["CarID"].$_FILES["DocumentURL"]["name"])) 
   {
     
     
    $DocumentURL = "uploads/Cars_Insurance/".$_POST["CarID"]."/CarInsurance_".$_POST["CarID"].$_FILES["DocumentURL"]["name"];
     
   }
   else
   {
    $DocumentURL = "";
   }
  }





    $sql = " insert into `insurance` 
          (`car_id`,`company_name`, `policy_number`, `insurance_class`,`insured_value`,
           `type_repair`,  `excess_amount`,`insurance_amount`,`note`,`document_url`,
           `insurance_start`,`insurance_expiration`, `insurance_area`, `insure_car_accessories` )
    values(".$_POST["CarID"].",'".$_POST["CompanyName"]."', '".$_POST["PolicyNumber"]."', '".$_POST["insuranceClass"]."',
           ".$_POST["InsuredValue"].", '".$_POST["TypeRepair"]."',".$_POST["ExcessAmount"].",".$_POST["InsuranceAmount"].",
           '".$_POST["note"]."', '".$DocumentURL."', '".$_POST["InsuranceStart"]."', '".$_POST["InsuranceEnd"]."', '".$_POST["insurance_area"]."', ".$_POST["InsureAccessories"]." );
           
";


try
{
$conn->query($sql);


  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added  Car  Insurance for Car ID ".$_POST["CarID"]."');";
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