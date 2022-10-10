


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="PaymentReceiptModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewPaymentReceipt.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New Payment Receipt</h5></td>
                   
                  
                  </tr>
              </thead>

               <?php

               $sql = "select `id` from `payment_receipt` order by `id` DESC limit 1";
               $resultX = $conn->query($sql);
               $rowX = $resultX->fetch_array(MYSQLI_ASSOC);

               if(isset($rowX["id"]))
               {
                 $nextID= $rowX["id"] + 1;
               }
               else{
                $nextID = 1;
               }

               ?>
            

                  <tr>
                     <td class="text-left ">Payment id</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder"  name="paymentID" value="<?= $nextID?>" readonly/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">payment amount</td>
                      <td>
                          <input type="text" class="form-control" name="payment_amount" id="payment_amount"  value=""/>
                         
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">document</td>
                      <td>
                          <input type="file" class="form-control p-1" name="document"/>
                        
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">pay from </td>
                      <td><input type="text" class="form-control" name="pay_from"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">pay to </td>
                      <td><input type="text" class="form-control" name="pay_to"/></td>
                  </tr>



                  

                  <tr>
                      <td class="text-left ">payment method</td>
                      <td><input type="text" class="form-control" name="payment_method"/></td>
                  </tr>
                 

                    
                  

                  <tr>
                      <td class="text-left ">Note </td>
                      <td><input type="text" class="form-control" name="note"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Total invoice(s)</td>
                      <td><input type="text" class="form-control" name="Total_invoice" id="Total_invoice"/></td>
                  </tr>




                  


              </tbody>
          </table>
       
         <hr>


         <table class="carDataTable" id="itemsLineTable">
          <thead>
                      <tr>
                          <td>#</td>
                          <td>invoice ID</td>
                          <td>invoice Number</td>
                          <td>Creation date</td>
                          <td colspan="2">Invoice Amount </td>
                       
                      </tr>
                  </thead>

                  <tbody>
                      <tr id="itemLine1">
                          <td id="SN">1</td>
                          <td><input class="form-control" type="text" list="invoiceList" name="invoiceID_1"     id="invoiceID_1" onchange="fetchInvoiceValue(1)"/></td>
                          <td><input class="form-control" type="text"                    name="invoiceNumber_1" id="invoiceNumber_1" /></td>
                          <td><input class="form-control" type="text"                    name="invoiceDate_1"   id="invoiceDate_1" /></td>
                          <td><input class="form-control" type="text"                    name="invoiceAmount_1" id="invoiceAmount_1" /></td>
                       </tr>


                      
                      
                  </tbody>
                 
                  </table>

                  <datalist id="invoiceList">

                  <?php

                  $sql = "select `id`, `creation_date`, `invoice_number`, `total_amount_with_vat` from `it_invoice` order by `id` DESC";
                  $resultI = $conn->query($sql);
                  
                  while($rowI = $resultI->fetch_array(MYSQLI_ASSOC))
                  {
                    echo("<option id='invoiceX_".$rowI["id"]."' invoiceNo = '".$rowI["invoice_number"]."' amount='".$rowI["total_amount_with_vat"]."' date='".$rowI["creation_date"]."'>".$rowI["id"]."</option>");
                  }

                  ?>

                  </datalist>

                 
                
       
         <hr>
         <a class="btn btn-info" onclick="addNewLine()">Add More invoice</a>

        <script>

            //----- javaScript function to add New line -----
              var i = 1;
              var x = 0;
              var TotalInvociesAmount = 0;

              function addNewLine()
              {
                i++;
                x = i -1;
                $("#itemLine"+x).after("<tr id='itemLine"+i+"' >"+
                                                     "<td>"+i+"</td>"+
                                                    " <td><input class='form-control' type='text' list='invoiceList' name='invoiceID_"+i+"'     id='invoiceID_"+i+"' onchange='fetchInvoiceValue("+i+")'/></td>"+
                                                    " <td><input class='form-control' type='text'                    name='invoiceNumber_"+i+"' id='invoiceNumber_"+i+"' /></td>"+
                                                     "<td><input class='form-control' type='text'                    name='invoiceDate_"+i+"'   id='invoiceDate_"+i+"' /></td>"+
                                                     "<td><input class='form-control' type='text'                    name='invoiceAmount_"+i+"' id='invoiceAmount_"+i+"' /></td>"+
                                                   "</tr>");



                                                   document.getElementById("Total_invoice").value = i;
              }

            //------------ end add new line function



            function fetchInvoiceValue(LineNo)
        {
         
           let invoiceID =  document.getElementById("invoiceID_"+LineNo).value
          

          let invoiceAmount = $('[id="invoiceX_'+invoiceID+'"]').attr("amount");
          let invoiceNumber = $('[id="invoiceX_'+invoiceID+'"]').attr("invoiceNo");
          let invoiceDate =   $('[id="invoiceX_'+invoiceID+'"]').attr("date");

          document.getElementById("invoiceAmount_"+LineNo).value = invoiceAmount;
          document.getElementById("invoiceNumber_"+LineNo).value = invoiceNumber;
          document.getElementById("invoiceDate_"+LineNo).value = invoiceDate;

          TotalInvociesAmount =  parseFloat(TotalInvociesAmount) + parseFloat(invoiceAmount);

          document.getElementById("payment_amount").value = TotalInvociesAmount;

          

        }

        </script>




           <!-- Car Data Table-->       
<!-------->


<hr>
<div class="row p-1">
 
<div class="col-6 text-left">
<input type="submit" value="SAVE - حفظ"  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset - تفريغ جميع الحقول"  class="btn btn-danger"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
