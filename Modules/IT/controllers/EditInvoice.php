<?php
require("../../../share/session.php");
// invoiceNumber, supplierTel, email, document,
// shipping_address, currency, payment_terms, Note, status
//invoiceID
if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    // check also he have permission to edit invoice 


     //upload attachment file
     if (!file_exists("../uploads/invoice/".$_POST["invoiceID"]."/")) 
     {
       mkdir("../uploads/invoice/".$_POST["invoiceID"]."/", 0777, true);
     }
 
     $document = "";
 
     if(isset($_FILES['document']))
   {
 
     //echo("Document is set");
    if (move_uploaded_file($_FILES["document"]["tmp_name"], "../uploads/invoice/".$_POST["invoiceID"]."/" .$_FILES["document"]["name"])) 
    {
      
      
     $document = "uploads/invoice/".$_POST["invoiceID"]."/".$_FILES["document"]["name"];
      
    }
   }

    $sql = "update `it_invoice` set

            `invoice_number` = '".$_POST["invoiceNumber"]."',
             `supplier_tel` = '".$_POST["supplierTel"]."',
             `email` = '".$_POST["email"]."',
             `shipping_address` = '".$_POST["shipping_address"]."',
             `currency` = '".$_POST["currency"]."',
             `payment_terms` = '".$_POST["payment_terms"]."',
             `note` = '".$_POST["Note"]."',
             `status` = '".$_POST["status"]."',
             `document` = '".$document."'

            where id = ".$_POST["invoiceID"]." ;

    ";

    try
    {
     $conn->query($sql);

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Edit invoice #".$_POST["invoiceID"]."');";
 $conn->query($sql);

// end adding action





    header("Location: ../InvoiceDetails.php?id=".$_POST["invoiceID"]);

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}
?>