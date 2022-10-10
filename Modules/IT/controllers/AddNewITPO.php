<?php
// Add new IT Asset

require("../../../share/session.php");
// Expected to receive request with post :
// supplierName, supplierID, PODate, QuotationID,
// contactName, contactEmail, ContactMobile, CreatedByName
// createdID, Email, Mobile, DeliveryAddress, QuotationID,
// ApprovedBy, Expected_date_delivery, note, Total_items
// itemNo_1, Description_1, Quantity_1, VAT_1, UnitPrice_1, TotalAmount_1, TotalWithVAT_1, UnitPriceWithVAT_
// PO_ID, ALLTotalAmount, ALLTotalAmountWithVAT, Currency, PaymentTerms

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add New IT PO

    $TotalVAT = floatval($_POST["ALLTotalAmountWithVAT"]) - floatval($_POST["ALLTotalAmount"]);
   // echo($TotalVAT);
    
    $sql = "insert into `it_po` (`id`, `created_by_id`, `created_by_name`, `created_by_mobile`, `approved_by`, `to_supplier_id`, `to_supplier_name`, `attn_name`,  `mobile`, `email`, `shipping_address`, `no_of_items`, `quotation_id`, `total_vat`, `total_amount`, `total_amount_with_vat`, `currency`, `note`, `payment_terms`) values 
    (
       '".$_POST["PO_ID"]."',
       '".$_POST["createdID"]."',
       '".$_POST["CreatedByName"]."',
       '".$_POST["Mobile"]."',
       '".$_POST["ApprovedBy"]."',
       '".$_POST["supplierID"]."',
       '".$_POST["supplierName"]."',
       '".$_POST["contactName"]."',
       '".$_POST["ContactMobile"]."',
       '".$_POST["contactEmail"]."',
       '".$_POST["DeliveryAddress"]."',
       '".$_POST["Total_items"]."',
       '".$_POST["QuotationID"]."',
       '".$TotalVAT."',
       '".$_POST["ALLTotalAmount"]."',
       '".$_POST["ALLTotalAmountWithVAT"]."',
       '".$_POST["Currency"]."',
       '".$_POST["note"]."',
       '".$_POST["PaymentTerms"]."'
       

    );";

    try{
    $conn->query($sql);
    echo("OK");
    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

    // insert line items to it_po_line
    $count = 1;
    while( $count <= $_POST["Total_items"])
    {
      $sql = "insert into `it_po_line` (`po_id`, `item_no`,  `item_description`, `quantity`, `uint_price`, `vat_percentage`, `total_amount`, `total_amount_with_vat`, `received_quantity`, `remaining_quantity`, `uint_price_vat`) 
      values 
      (
        '".$_POST["PO_ID"]."',
        '".$_POST["itemNo_".$count]."',
        '".$_POST["Description_".$count]."',
        '".$_POST["Quantity_".$count]."',
        '".$_POST["UnitPrice_".$count]."',
        '".$_POST["VAT_".$count]."',
        '".$_POST["TotalAmount_".$count]."',
        '".$_POST["TotalWithVAT_".$count]."',
        '0',
        '".$_POST["Quantity_".$count]."',
        '".$_POST["UnitPriceWithVAT_".$count]."'
       
      );";
      try
      {
        $conn->query($sql);
        echo("OK2");
        }
        catch(Exception $e)
        {
          echo($e->getMessage());
        }
    
      $count++;
    }


    try
    {
    

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New IT PO ID # ".$_POST["PO_ID"]."');";
 $conn->query($sql);

// end adding action


    header("Location: ../PO.php");

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}
?>