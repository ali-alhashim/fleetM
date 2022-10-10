<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :
// AccidentPhoto1, AccidentPhoto2, AccidentPhoto3, AccidentPhoto4, DriverName, driverID, DriverMobile
// CarID, AccidentDate, AccidentNumber, InsuranceCompanyName, policyNumber,DriverGOVID , InsuranceID
// MistakePercentage, MistakePercentageSecondParty, PlateNumberSecondParty,
// InsuranceSecondParty, ClaimNumber, ClaimStatus, progressLevel, Attachment, RepirAmount
// CarStatus

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add Car Accident

    if (!file_exists("../uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/")) {
        mkdir("../uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/", 0777, true);
    }

    if (!file_exists("../uploads/Cars_AccidentAttachment/".$_POST["CarID"]."/")) {
        mkdir("../uploads/Cars_AccidentAttachment/".$_POST["CarID"]."/", 0777, true);
    }


    $target_CarsAccidentPhoto = "../uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/";


    $target_CarsAccidentAttachment = "../uploads/Cars_AccidentAttachment/".$_POST["CarID"]."/";



    // upload   Attachment
 if(isset($_FILES['Attachment']))
 {
  if (move_uploaded_file($_FILES["Attachment"]["tmp_name"],  $target_CarsAccidentAttachment ."CarAttachment_".$_POST["CarID"].$_FILES["Attachment"]["name"])) 
  {
    
    
     $attachment = "uploads/Cars_AccidentAttachment/".$_POST["CarID"]."/CarAttachment_".$_POST["CarID"].$_FILES["Attachment"]["name"];
    
  }
  else
  {
     $attachment = "";
  }
 }


 // upload   AccidentPhoto1
 if(isset($_FILES['AccidentPhoto1']))
 {
  if (move_uploaded_file($_FILES["AccidentPhoto1"]["tmp_name"], $target_CarsAccidentPhoto ."CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto1"]["name"])) 
  {
    
    
     $photo1 = "uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto1"]["name"];
    
  }
  else
  {
     $photo1 = "";
  }
 }


 // upload   AccidentPhoto2
 if(isset($_FILES['AccidentPhoto2']))
 {
  if (move_uploaded_file($_FILES["AccidentPhoto2"]["tmp_name"], $target_CarsAccidentPhoto ."CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto2"]["name"])) 
  {
    
    
     $photo2 = "uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto2"]["name"];
    
  }
  else
  {
     $photo2 = "";
  }
 }



 // upload   AccidentPhoto3
 if(isset($_FILES['AccidentPhoto3']))
 {
  if (move_uploaded_file($_FILES["AccidentPhoto3"]["tmp_name"], $target_CarsAccidentPhoto ."CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto3"]["name"])) 
  {
    
    
     $photo3 = "uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto3"]["name"];
    
  }
  else
  {
     $photo3 = "";
  }
 }


 // upload   AccidentPhoto4
 if(isset($_FILES['AccidentPhoto4']))
 {
  if (move_uploaded_file($_FILES["AccidentPhoto4"]["tmp_name"], $target_CarsAccidentPhoto ."CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto4"]["name"])) 
  {
    
    
     $photo4 = "uploads/Cars_AccidentPhoto/".$_POST["CarID"]."/CarPhoto_".$_POST["CarID"].$_FILES["AccidentPhoto4"]["name"];
    
  }
  else
  {
     $photo4 = "";
  }
 }



    $sql = "insert into `car_accident` (`driver_id`, `driver_gov_id`, `driver_name`,
                                        `mobile_number`, `car_id`,`accident_date`,
                                        `accident_number`,`insurance_company_name`,
                                        `insurance_id`,`insurance_policy_number`,
                                        `mistake_percentage`,`mistake_percentage_second_party`,
                                        `plate_number_second_party`,`insurance_company_name_for_second_party`,
                                        `claim_number`, `claim_status`,`car_accident_status`, `attachment`,
                                        `accident_photo_1`, `accident_photo_2`, `accident_photo_3`,`accident_photo_4`,
                                        `repair_amount`,  `progress_level`, `note`,`location`)
           values  (".$_POST["driverID"].", '".$_POST["DriverGOVID"]."', '".$_POST["DriverName"]."',
                    '".$_POST["DriverMobile"]."', ".$_POST["CarID"].", '".$_POST["AccidentDate"]."', '".$_POST["AccidentNumber"]."',
                    '".$_POST["InsuranceCompanyName"]."', ".$_POST["InsuranceID"].", '".$_POST["policyNumber"]."', '".$_POST["MistakePercentage"]."',
                     '".$_POST["MistakePercentageSecondParty"]."', '".$_POST["PlateNumberSecondParty"]."', '".$_POST["InsuranceSecondParty"]."',
                     '".$_POST["ClaimNumber"]."', '".$_POST["ClaimStatus"]."', '".$_POST["CarStatus"]."', '".$attachment."', 
                     '".$photo1."', '".$photo2."', '".$photo3."', '".$photo4."', ".$_POST["RepirAmount"].", ".$_POST["progressLevel"].", '".$_POST["note"]."', '".$_POST["location"]."'  
                    );";

    
   
        
    


    try
    {
     $conn->query($sql);


        // add action to log table

        $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added Car Accident ID ".$_POST["CarID"]."');";
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