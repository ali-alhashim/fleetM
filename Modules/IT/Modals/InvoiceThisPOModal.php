


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="InvoiceThisPOModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddPurchasingInvoice.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New Purchasing Invoice</h5></td>
                   
                  
                  </tr>
              </thead>

              <?php
               

                try{
                $sql = "SELECT `id` from `it_invoice` order by `id` DESC  limit 1"; 
                $resultI = $conn->query($sql);
                $rowI = $resultI->fetch_array(MYSQLI_ASSOC);
                if(isset($rowI["id"]))
                {


                  $NextInvoiceID = (int) $rowI["id"] + 1 ;

                  

                }
                else
                {
                  $NextInvoiceID = 1;
                }
               
                }
                catch(Exception $e)
                {
                    echo($e->getMessage());
                }
              ?>

               
                    <tr>
                      <td class="text-left ">Invoice ID</td>
                      <td><input type="text" class="form-control" name="invoiceID" value="<?=$NextInvoiceID?>"  readonly/></td>
                    </tr>
                 

                   <tr>
                     <td class="text-left ">PO ID</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="po_id" value="<?=$_GET["id"]?>"/></td>
                   </tr>

                   
                   <tr>
                      <td class="text-left ">Invoice Number</td>
                      <td><input type="text" class="form-control" name="invoiceNumber"  /></td>
                  </tr>
                 

                 
                   <tr>
                      <td class="text-left ">Invoice Date </td>
                      <td><input type="date" class="form-control" name="invoiceDate" value="<?=date("Y-m-d")?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier ID</td>
                      <td><input type="text" class="form-control" name="supplierID" value="<?=$row["to_supplier_id"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier Name</td>
                      <td><input type="text" class="form-control" name="supplierName" value="<?=$row["to_supplier_name"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier Email</td>
                      <td><input type="text" class="form-control" name="supplierEmail" value="<?=$row["email"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier Telphone</td>
                      <td><input type="text" class="form-control" name="supplierTelphone" value="<?=$row["supplier_tel"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Supplier Mobile</td>
                      <td><input type="text" class="form-control" name="supplierMobile" value="<?=$row["mobile"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Number Of Items</td>
                      <td><input type="text" class="form-control" name="no_of_items" value="<?=$row["no_of_items"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Total VAT</td>
                      <td><input type="text" class="form-control" name="totalVAT" value="<?=$row["total_vat"]?>" /></td>
                  </tr>

                  


                  <tr>
                      <td class="text-left ">Paid Amount</td>
                      <td><input type="text" class="form-control" name="PaidAmount" value="0" /></td>
                  </tr>
                   
                  <tr>
                      <td class="text-left ">payment method</td>
                      <td>
                          <select class="form-control" name="paymentMethod">
                              
                              <option>Credit</option>
                              <option>Cash</option>
                              <option>Wire Transfer</option>
                              <option>Partially</option>
                          </select>

                      </td>
                  </tr>
                  



                



                


                

                  <tr>
                      <td class="text-left ">Document </td>
                      <td><input type="file" class="form-control p-1" name="document"/></td>
                  </tr>
                  

                  <tr>
                      <td class="text-left ">Note </td>
                      <td><input type="text" class="form-control" name="note"/></td>
                  </tr>




                  


              </tbody>
          </table>
       
         <hr>

        
         <hr>

         
         <table class="carDataTable" id="itemsLineTable">
          <thead>
                      <tr>
                          <td>#</td>
                          <td>Item Number</td>
                          <td colspan="2">Description </td>
                          <td>Quantity</td>
                          <td>VAT % </td>
                          <td>Unit  Price </td>
                          <td>Unit  Price with VAT</td>
                          <td>Total Amount</td>
                          <td>Total Amount with VAT</td>
                      </tr>
                  </thead>
                  
                  <tbody>
                      <?php
                        $sql = "select *  from `it_po_line` where `po_id`=".$_GET["id"]." order by `id`;";
                       
                         $resultXZ = $conn->query($sql);
                         $count =1;
                         while($rowXZ = $resultXZ->fetch_array(MYSQLI_ASSOC))
                          {
                             echo(' <tr id="itemLine1">');
                             echo('<td id="'.$count.'">'.$count.'</td>');
                             echo('<td><input type="text" class="form-control" name="itemNo_'.$count.'" value="'.$rowXZ["item_no"].'"/></td>');
                             echo('<td colspan="2"><input type="text" class="form-control"             value="'.$rowXZ["item_description"].'" name="Description_'.$count.'" size="100"/></td>');
                             echo('<td><input type="number" class="form-control"           name="Quantity_'.$count.'" value="'.$rowXZ["quantity"].'" id="Quantity_'.$count.'" /></td>');
                             echo('<td><input type="text" class="form-control" value="'.$rowXZ["vat_percentage"].'" name="VAT_'.$count.'" id="VAT_'.$count.'" /></td>');
                             echo('<td><input type="text" class="form-control" value="'.$rowXZ["uint_price"].'"   name="UnitPrice_'.$count.'"     id="UnitPrice_'.$count.'"/></td>');
                             echo('<td><input type="text" class="form-control" value="'.$rowXZ["uint_price_vat"].'"   name="UnitPriceWithVAT_'.$count.'"    id="UnitPriceWithVAT_'.$count.'"/></td>');
                             echo('<td><input type="text" class="form-control" value="'.$rowXZ["total_amount"].'"   name="TotalAmount_'.$count.'"   id="TotalAmount_'.$count.'"/></td>');
                             echo(' <td><input type="text" class="form-control" value="'.$rowXZ["total_amount_with_vat"].'" name="TotalWithVAT_'.$count.'"  id="TotalWithVAT_'.$count.'"/></td>');
                             echo(' </tr>');

                             $count++;
                          }
                      ?>
                     
                          
                          
                          
                          
                          
                         
                          
                          
                         
                      


                       <tr id="TotalsLine">
                       <td colspan="8"></td>
                        <td><input type="text" class="form-control" name="ALLTotalAmount"     id="ALLTotalAmount" value="<?=$row["total_amount"]?>"/></td>
                        <td><input type="text" class="form-control" name="ALLTotalAmountWithVAT" id="ALLTotalAmountWithVAT" value="<?=$row["total_amount_with_vat"]?>"/></td>
                       
                       </tr>
                      
                  </tbody>
                 
                  </table>




           <!-- Car Data Table-->       
<!-------->


<hr>
<div class="row p-1">
 
<div class="col-6 text-left">
<input type="submit" value="SAVE  "  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset"  class="btn btn-danger"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
