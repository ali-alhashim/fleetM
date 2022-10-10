<?php
// Add new IT Asset

require("../../../share/session.php");
// Expected to receive request with post :
// SupplierName, SupplierID, website, ContactName, ContactEmail, 
// ContactMobile, Address, DuePayment, TaxID, note, payment_terms



if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT Asset


    $sql = "insert into `it_supplier` (`supplier_name`, `website`, `contact_name`, `contact_email`, `contact_mobile`, `address`, `due_payment`, `payment_terms`, `vat_id`) values
             (
               '".$_POST["SupplierName"]."',
               '".$_POST["website"]."',
               '".$_POST["ContactName"]."',
               '".$_POST["ContactEmail"]."',
               '".$_POST["ContactMobile"]."',
               '".$_POST["Address"]."',
               '".$_POST["DuePayment"]."',
               '".$_POST["payment_terms"]."',
               '".$_POST["VATID"]."'
             )";



    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New IT Supplier  Name # ".$_POST["SupplierName"]."');";
 $conn->query($sql);

// end adding action


     header("Location: ../Suppliers.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}

?>