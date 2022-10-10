<?php
// Add new Purchasing invoice

require("../../../share/session.php");

//invoiceID
// po_id, invoiceNumber, invoiceDate, supplierID, supplierName
// supplierEmail, supplierTelphone, supplierMobile, no_of_items
// totalVAT, PaidAmount, paymentMethod, document, note
//
// itemNo_, Description_, Quantity_, VAT_, UnitPrice_
// UnitPriceWithVAT_, TotalAmount_, TotalWithVAT_
// ALLTotalAmount, ALLTotalAmountWithVAT



if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New Purchasing invoice


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


   //echo($document);


    $sql = "insert into `it_invoice` (`id`, `invoice_number`, `po_id`, `invoice_date`, `from_supplier_id`, `from_supplier_name`, 
                                       `email`, `supplier_tel`, `mobile`, `no_of_items`, `total_vat`, `paid_amount`, `payment_method`, 
                                       `document`, `note`, `total_amount`, `total_amount_with_vat` ) values
    (
     '".$_POST["invoiceID"]."',
     '".$_POST["invoiceNumber"]."',
     '".$_POST["po_id"]."',
     '".$_POST["invoiceDate"]."',
     '".$_POST["supplierID"]."',
     '".$_POST["supplierName"]."',
     '".$_POST["supplierEmail"]."',
     '".$_POST["supplierTelphone"]."',
     '".$_POST["supplierMobile"]."',
     '".$_POST["no_of_items"]."',
     '".$_POST["totalVAT"]."',
     '".$_POST["PaidAmount"]."',
     '".$_POST["paymentMethod"]."',
     '".$document."',
     '".$_POST["note"]."',
     '".$_POST["ALLTotalAmount"]."',
     '".$_POST["ALLTotalAmountWithVAT"]."'
    )";

    $conn->query($sql);


    // add invoice items to table invoice line
    
    $count = 1;
    while( $count <= $_POST["no_of_items"])
    {
      $sql = "insert into `it_invoice_line` (`invoice_id`, `item_no`, `item_description`, `quantity`, `uint_price`, `vat_percentage`, `uint_price_with_vat`, `total_price_with_vat`) 
      values
      (
        '".$_POST["invoiceID"]."',
        '".$_POST["itemNo_$count"]."',
        '".$_POST["Description_$count"]."',
        '".$_POST["Quantity_$count"]."',
        '".$_POST["UnitPrice_$count"]."',
        '".$_POST["VAT_$count"]."',
        '".$_POST["UnitPriceWithVAT_$count"]."',
        '".$_POST["TotalWithVAT_$count"]."'
      );";
      $conn->query($sql);
      $count++;
    }



    try
    {
    

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Add new Purchasing invoice for PO ID # ".$_POST["po_id"]."');";
 $conn->query($sql);

// end adding action


   header("Location: ../invoices.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}

?>