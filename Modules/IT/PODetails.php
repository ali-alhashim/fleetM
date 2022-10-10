<?php require("../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="../../frameworks/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>PO Details</h3>
     
       <hr>

       <div class="subNav">
       <div class="row align-items-center justify-content-center">

    
       <button class="btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#InvoiceThisPOModal">
            <i class="fa-solid fa-hand-holding-dollar"></i><br/>Invoice this PO    
       </button>  
      
      

          <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#DeliveryThisPOModal">
             <i class="fa-solid fa-plus "></i><br/>Delivery Note  this PO<br/>      
           </button>
          

         

</div>
       </div>

        

<hr>

<!--Car photo--->

<?php
$sql = "select * from `it_po` where `id` = ".$_GET["id"].";";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>

<?php include("Modals/InvoiceThisPOModal.php"); ?>
<?php include("Modals/DeliveryThisPOModal.php"); ?>



<form method="POST" action="controllers/EditPO.php" enctype="multipart/form-data">

              <hr>

         <!-- Car information Table-->

                 
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>PO Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                 




                  <tr>
                     <td class="text-left ">Creation Date</td>
                      <td><input type="text" class="form-control" value="<?=$row["creation_date"]?>" name="creation_date" readonly/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">PO ID</td>
                      <td><input type="text" class="form-control" value="<?=$row["id"]?>" name="po_id" readonly/></td>
                  </tr>



                  <tr>
                      <td class="text-left "> Supplier ID</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["to_supplier_id"]?>"  name="to_supplier_id" readonly/>
                         
                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> supplier name</td>
                      <td><input type="text" class="form-control" value="<?=$row["to_supplier_name"]?>" name="to_supplier_name"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier Tel.</td>
                      <td><input type="text" class="form-control" value="<?=$row["supplier_tel"]?>" name="supplier_tel"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Attn. name</td>
                      <td><input type="text" class="form-control"  value="<?=$row["attn_name"]?>" name="attn_name"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Email</td>
                      <td><input type="text" class="form-control"  value="<?=$row["email"]?>" name="email"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Document URL</td>
                      <td><input type="file" class="form-control p-1"   name="document_url"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">shipping address</td>
                      <td><input type="text" class="form-control" value="<?=$row["shipping_address"]?>" name="shipping_address"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">created by name </td>
                      <td><input type="text" class="form-control" value="<?=$row["created_by_name"]?>" name="created_by_name" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left "> created by id</td>
                      <td><input type="text" class="form-control" value="<?=$row["created_by_id"]?>" name="created_by_id" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">created by mobile</td>
                      <td>
                          <input type="text" class="form-control"   value="<?=$row["created_by_mobile"]?>" name="created_by_mobile" readonly/>
                         
                      </td>
                  </tr>



               


                  <tr>
                      <td class="text-left ">approved by </td>
                      <td><input type="text" class="form-control"  value="<?=$row["approved_by"]?>" name="approved_by" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Job title </td>
                      <td><input type="text" class="form-control"  value="<?=$row["job_title"]?>" name="job_title"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Quotation Id</td>
                      <td><input type="text" class="form-control" value="<?=$row["quotation_id"]?>" name="quotation_id" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Number of items</td>
                      <td><input type="text" class="form-control" value="<?=$row["no_of_items"]?>" name="no_of_items" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Currency</td>
                      <td><input type="text" class="form-control" value="<?=$row["currency"]?>" name="currency"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Payment terms</td>
                      <td><input type="text" class="form-control" value="<?=$row["payment_terms"]?>" name="payment_terms"/></td>
                  </tr>
                   
                  


                  <tr>
                      <td class="text-left ">Note</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>" name="Note"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Total amount</td>
                      <td><input type="text" class="form-control" value="<?=$row["total_amount"]?>" name="total_amount" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Total VAT.</td>
                      <td><input type="text" class="form-control" value="<?=$row["total_vat"]?>" name="total_vat" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Total Amount With VAT</td>
                      <td><input type="text" class="form-control" value="<?=$row["total_amount_with_vat"]?>" name="total_amount_with_vat" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">status</td>
                      <td><input type="text" class="form-control" value="<?=$row["status"]?>" name="status"/></td>
                  </tr>





                  


              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->



      

      


     




        

            <!---Car Users--->
            <hr>


            <div class="row m-3">

<div class="col-6 text-left">


</div>

<div class="col-6 text-right">
  

</div>


</div>


         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="9"><h5>PO Items</h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>SN</td>
                     
                      <td>Item No.</td>
                      <td>Description  </td>
                      <td>Quantity  </td>
                      <td>VAT %  </td>
                      <td>Unit Price  </td> 
                      <td>Unit Price with VAT </td> 
                      <td>Total Amount  </td> 
                      <td>Total Amount with VAT  </td> 
                    
                  </tr>
              </thead>
              <tbody>

              <?php

              $sql = "select *
                      from `it_po_line` where `po_id`=".$_GET["id"]." order by `id`;";
              $result = $conn->query($sql);
               $count =1;
              while($row1 = $result->fetch_array(MYSQLI_ASSOC))
              {
                  echo("<tr>");
                  echo('<td>'.$count.'</td>');
                
                 echo("<td>".$row1["item_no"]."</td>");
            
                 echo("<td>".$row1["item_description"]."</td>");

                
             
                echo("<td>".$row1["quantity"]."</td>");

                echo("<td>".$row1["vat_percentage"]."</td>");
               
                echo("<td>".$row1["uint_price"]."</td>");
                echo("<td>".$row1["uint_price_vat"]."</td>");
            
                echo('<td> '.$row1["total_amount"].' </td>');

                echo('<td> '.$row1["total_amount_with_vat"].' </td>');
            

             echo("</tr>");
             $count++;
              }
                

                 ?>


              </tbody>
         </table>
         <hr>
         <!---end Car users-->

<br/>

         <!--Car Accident-->


         <div class="row">
             <div class="col-6 text-left">
            
             </div>
             <div class="col-6 text-right">
           
             </div>
         </div>
        

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="9"><h5>PO Delivery Note  </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>ID</td>
                      <td>Date</td>
                      <td>Delivery Address</td>
                      <td>Received By</td>
                      <td>note</td>
                     
                   
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php
                $sql = "select `id`, `delivery_date`, `delivery_address`, `received_by`, `total_items`, `document_url`, `note`  from `delivery_note` where `po_id` =".$_GET["id"]." order by `creation_date` desc"; 
                        

                $result = $conn->query($sql);
                while($row2 = $result->fetch_array(MYSQLI_ASSOC))
                {
                   echo("<tr>");
                   echo('<td><a href="deliveryNoteDetails.php?id='.$row2["id"].'" class="btn btn-info"> '.$row2["id"].'</a></td>');
                   echo("<td>".$row2["delivery_date"]."</td>");
                   echo("<td>".$row2["delivery_address"]."</td>");
                   echo("<td>".$row2["received_by"]."</td>");
                   echo("<td>".$row2["note"]."</td>");
                  
                   
                   echo("<td><a class='btn btn-secondary' href='".$row2["document_url"]."' >open<a/></td>");
                   echo("</tr>");
                }        
              ?>


               
                
             


              </tbody>
         </table>

         <!---->
         <hr>





         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">

             <a class="btn btn-secondary m-1" href="print/printPODetails.php?id=<?=$_GET["id"]?>"><i class="fa-solid fa-print"></i> <br/>Print  </a>
             
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update  </button>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->
            </form>
            <!--?php require("Modals/SaleThisCarModal.php"); ?-->

<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>