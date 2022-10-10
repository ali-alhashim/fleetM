<?php
require("../../../share/session.php");
//paymentID, payment_amount, document, pay_from, pay_to, note, payment_method
// Total_invoice, invoiceID_1, invoiceNumber_1, invoiceDate_1, invoiceAmount_1

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add payment

    if (!file_exists("../uploads/PaymentReceipt/".$_POST["paymentID"]."/")) 
    {
      mkdir("../uploads/PaymentReceipt/".$_POST["paymentID"]."/", 0777, true);
    }

    $document = "";

    if(isset($_FILES['document']))
  {

    //echo("Document is set");
   if (move_uploaded_file($_FILES["document"]["tmp_name"], "../uploads/PaymentReceipt/".$_POST["paymentID"]."/" .$_FILES["document"]["name"])) 
   {
     
     
    $document = "uploads/PaymentReceipt/".$_POST["paymentID"]."/".$_FILES["document"]["name"];
     
   }
}


    $sql = "insert into `payment_receipt` (`id`, `payment_amount`, `note`, `payment_method`, `pay_from`, `pay_to`, `total_invoices`, `document` ) values
           (
            '".$_POST["paymentID"]."',
            '".$_POST["payment_amount"]."',
            '".$_POST["note"]."',
            '".$_POST["payment_method"]."',
            '".$_POST["pay_from"]."',
            '".$_POST["pay_to"]."',
            '".$_POST["Total_invoice"]."',
            '".$document."'
           );";

           $conn->query($sql);

           // insert payment_receipt_line

           $counter = 1;
           while($counter<=$_POST["Total_invoice"])
           {
             $sql = "insert into `payment_receipt_line` (`payment_id`, `invoice_id`, `invoice_number`, `invoice_date`, `invoice_amount`) values 
             (
               '".$_POST["paymentID"]."',
               '".$_POST["invoiceID_$counter"]."',
               '".$_POST["invoiceNumber_$counter"]."',
               '".$_POST["invoiceDate_$counter"]."',
               '".$_POST["invoiceAmount_$counter"]."'
             )";
             $conn->query($sql);

             $counter =  $counter + 1;
           }



// add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New payment receipt   # ".$_POST["paymentID"]."');";
 $conn->query($sql);


 header("Location: ../paymentReceipt.php");

}

?>