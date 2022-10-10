<?php require("../../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Report</title>
   
    <link href="../../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

    <link rel="stylesheet" href="../../../print/ReportStyle.css">

    <style>@page { size: A4 }</style>

</head>
<body >


<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->

    <img src="../../../<?=$SystemLogo?>" class="logo"/>
    <br/>
    <?php
   $sql = "select * from `it_po` where `id` = ".$_GET["id"].";";
   $resultH = $conn->query($sql);
   $rowH = $resultH->fetch_array(MYSQLI_ASSOC)
    ?>
    <div class="page-title">Purchase order #:<b> <?=$rowH["id"]?></b> [Print Date : <?=date("Y-m-d")?>]</div>
    <hr>
    <br/>
    <table class="carTable">
        <tr>
            <td style="background:#DCDCDC !important">Date</td>
            <td><?=$rowH["creation_date"]?></td>
            <td style="background:#DCDCDC !important">To</td>
            <td><?=$rowH["to_supplier_name"]?></td>
            <td style="background:#DCDCDC !important">Currency</td>
            <td><?=$rowH["currency"]?></td>
       </tr>

       <tr>
            <td style="background:#DCDCDC !important">Attn.</td>
            <td> <?=$rowH["attn_name"]?></td>
            <td style="background:#DCDCDC !important">Mobile</td>
            <td> <?=$rowH["mobile"]?></td>
            <td style="background:#DCDCDC !important">Email</td>
            <td> <?=$rowH["email"]?></td>
       </tr>

       <tr>
            <td style="background:#DCDCDC !important">Payment Terms</td>
            <td> <?=$rowH["payment_terms"]?></td>
            <td style="background:#DCDCDC !important">Quotation #</td>
            <td> <?=$rowH["quotation_id"]?></td>
            <td style="background:#DCDCDC !important">No. of items</td>
            <td> <?=$rowH["no_of_items"]?></td>
       </tr>

    </table>
    <hr>
    
    <table class="carTable">
        <thead>
            <tr>
                <td>#</td>
                <td class="hidecolumns">Item No.</td>
                <td class="hidecolumns">Item Description </td>
                <td>Quantity </td>
                <td class="hidecolumns">Unit Price   </td>
                <td>Unit  Price VAT</td>
                <td>VAT Percentage </td>
                <td>Total Amount</td>
                <td> Total Amount with VAT </td>
                
            </tr>
        </thead>
        <tbody>
            <?php


            $counter =1;
            $sql = "select * from `it_po_line` where `po_id` = ".$_GET["id"]."    order by `id`  ";
            $result = $conn->query($sql);
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
               
                


                echo'
                <tr >
                
                <td>'.$counter.'</td>
                <td class="hidecolumns">'.$row["item_no"].'</td>
                <td>'.$row["item_description"].'</td>
                <td class="hidecolumns">'.$row["quantity"].'</td>
                <td>'.$row["uint_price"].'</td>
                <td>'.$row["uint_price_vat"].'</td>
                <td>'.$row["vat_percentage"].'</td>
                <td>'.$row["total_amount"].'</td>
                <td class="hidecolumns">'.$row["total_amount_with_vat"].'</td>
              
            </tr>
                ';
                $counter++;
            }
            ?>

            <tr>

            <td colspan="6"></td>
            <td style="background:#FFFACD !important;"><?=$rowH["total_vat"]?></td>
            <td style="background:#FFFACD !important;"><?=$rowH["total_amount"]?></td>
            <td  style="background:#FFFACD !important;"> <?=$rowH["total_amount_with_vat"]?></td>

           </tr>
          
        </tbody>
    </table>

    <hr>

    <table class="carTable">
    <tr style="border-bottom:2px solid black !important;">
            <td style="background:#DCDCDC !important">Delivery Address</td>
            <td><?=$rowH["shipping_address"]?></td>
            <td style="background:#DCDCDC !important">Created By</td>
            <td><?=$rowH["created_by_name"]?></td>
            <td style="background:#DCDCDC !important">Mobile</td>
            <td><?=$rowH["created_by_mobile"]?></td>
       </tr>

       <tr style="background:#DCDCDC !important">
        <td>Company Name</td>
        <td>Approved By </td>
        <td>Title</td>
        <td>Signature </td>
        <td colspan="2">Stamp</td>
       </tr>

       <tr>
           <td style="height:60px !important"></td>
           <td><?=$rowH["approved_by"]?></td>
           <td><?=$rowH["job_title"]?></td>
           <td></td>
           <td colspan="2"></td>
        </td>
    </table>

<br/>
    

  </section>

</body>
</html>