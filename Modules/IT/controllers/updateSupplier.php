<?php
/**Action to update user Asset **/
require("../../../share/session.php");
// supplierID, supplier_name, website, contact_name, contact_email
// contact_mobile, address, due_payment, payment_terms
// cr_number, vat_id

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to update IT Suppliers

  


     $sql = "update `it_supplier` set 
             `supplier_name` ='".$_POST["supplier_name"]."',
             `website` = '".$_POST["website"]."',
             `contact_name` = '".$_POST["contact_name"]."',
             `contact_email` = '".$_POST["contact_email"]."',
             `contact_mobile` = '".$_POST["contact_mobile"]."',
             `address` = '".$_POST["address"]."',
             `due_payment` = '".$_POST["due_payment"]."',
             `payment_terms` = '".$_POST["payment_terms"]."',
             `cr_number` = '".$_POST["cr_number"]."',
             `vat_id` = '".$_POST["vat_id"]."'
              where `id` = '".$_POST["supplierID"]."';";

     $conn->query($sql);
    try
    {
     
     

     // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','update IT Supplier ID: ".$_POST["AssetID"]." name: ".$_POST["NewUserName"]."');";
 $conn->query($sql);

// end adding action




     header("Location: ../SupplierDetails.php?id=".$_POST["supplierID"]);

    }
    catch(Exception $e)
    {
       echo($e->getMessage());
    }

}

?>