<?php
// Add New Company 

require("../share/session.php");
// Expected to receive request with post :
// CompanyCR, CompanyName, CompanyLogo, CompanyCRExpiration, CompanyCR_URL




if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add Company



    $target_CompanyLogo = "../uploads/Company/Logo/";
    $target_CompanyCR = "../uploads/Company/CR/";



    // upload  Logo photo
  if(isset($_FILES['CompanyLogo']))
  {
   if (move_uploaded_file($_FILES["CompanyLogo"]["tmp_name"], $target_CompanyLogo ."CompanyLogo_".$_POST["CompanyCR"].$_FILES["CompanyLogo"]["name"])) 
   {
     
     
      $CompanyLogo = "uploads/Company/Logo/CompanyLogo_".$_POST["CompanyCR"].$_FILES["CompanyLogo"]["name"];

     
     
   }
  
  }
  else
  {
     $CompanyLogo = "";
  }



    // upload  CR photo
    if(isset($_FILES['CompanyCR_URL']))
    {
     if (move_uploaded_file($_FILES["CompanyCR_URL"]["tmp_name"],  $target_CompanyCR ."CompanyCR_".$_POST["CompanyCR"].$_FILES["CompanyCR_URL"]["name"])) 
     {
       
       
        $CompanyCR = "uploads/Company/CR/CompanyCR_".$_POST["CompanyCR"].$_FILES["CompanyCR_URL"]["name"];
       
     }
    
    }
    else
    {
       $CompanyCR = "";
    }




    $sql = " insert into `company` (`company_name`, `company_CR`, `company_logo`, `company_CR_URL`, `company_CR_expiration`)
                             values('".$_POST["CompanyName"]."', '".$_POST["CompanyCR"]."', '".$CompanyLogo."', '".$CompanyCR."', '".$_POST["CompanyCRExpiration"]."');
    ";


    try
    {
     $conn->query($sql);

      // add action to log table

      $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New Company ".$_POST["CompanyName"]."');";
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