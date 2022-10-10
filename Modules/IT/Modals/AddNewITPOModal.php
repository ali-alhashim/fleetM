


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddNewITPOModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewITPO.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="4"><h5>Add New IT PO</h5></td>
                   
                  
                  </tr>
              </thead>

        <?php
              $sql = "SELECT `id` from `it_po` order by `id` DESC  limit 1"; 

              try{
              $result = $conn->query($sql);
              $row = $result->fetch_array(MYSQLI_ASSOC);
              if(isset($row["id"]))
              {
                $NextPOID = (int) $row["id"] + 1 ;
              }
              else
              {
                $NextPOID = 1;
              }
             
              }
              catch(Exception $e)
              {
                  echo($e->getMessage());
              }
    
   
   
        ?>
            

                  <tr>
                  <td class="text-left">
                       PO ID <input type="text" name="PO_ID" class="form-control" readonly value="<?=$NextPOID?>"/>
                   </td>

                   <td class="text-left">
                       Supplier Name <input type="text" name="supplierName" id="supplierName" class="form-control" list="SupplierList" onchange=" fetchSupplierValue()"/>
                        
                       <datalist id="SupplierList">
                           <option></option>
                           <?php
                             $sql = "select `id`, `supplier_name`, `website`, `contact_name`, `contact_email`, `contact_mobile`, `payment_terms` from `it_supplier`;";
                             $result = $conn->query($sql);
                             while($row = $result->fetch_array(MYSQLI_ASSOC))
                             {
                                 echo("<option paymentTerms='".$row["payment_terms"]."'  contactEmail = '".$row["contact_email"]."' mobile = '".$row["contact_mobile"]."' contactName = '".$row["contact_name"]."' id='".$row["id"]."' website = '".$row["website"]."' name = '".$row["supplier_name"]."'>".$row["supplier_name"]."</option>");
                             }
                           ?>
                       </datalist>



                   </td>

                   <td class="text-left">
                       Supplier ID <input type="text" name="supplierID" id="supplierID" class="form-control"/>
                   </td>

                   <td class="text-left">
                       PO Date <input type="date" name="PODate" class="form-control" value="<?=date("Y-m-d")?>"/>
                   </td>

                  </tr>

                  <tr>
                   <td class="text-left">
                    Quotation ID <input type="text" name="QuotationID" class="form-control"/>
                   </td>

                   <td class="text-left">
                       Contact Name <input type="text" name="contactName" class="form-control" id="contactName"/>
                   </td>

                   <td class="text-left">
                      Contact Email <input type="text" name="contactEmail" class="form-control" id="contactEmail"/>
                   </td>

                   <td class="text-left">
                      Contact Mobile <input type="text" name="ContactMobile" class="form-control" id="ContactMobile" />
                   </td>

                  </tr>


                  <tr>
                   <td class="text-left">
                    Created By [Name] <input type="text" name="CreatedByName" class="form-control" value="<?=$_SESSION["full_name"]?>"/>
                   </td>

                   <td class="text-left">
                   Created By [ID] <input type="text" class="form-control" name="createdID" value="<?=$_SESSION["id"]?>"/>
                   </td>

                   <td class="text-left">
                   Created By [Email] <input type="text" class="form-control" name="Email" value="<?=$_SESSION["email"]?>"/>
                   </td>

                   <td class="text-left">
                   Created By [Mobile] <input type="text" class="form-control" name="Mobile" value="<?=$_SESSION["mobile"]?>"/>
                   </td>

                  </tr>


                  <tr>
                   <td class="text-left">
                   Delivery Address <input type="text" name="DeliveryAddress" class="form-control"/>
                   </td>

                   <td class="text-left">
                   Currency <input type="text" name="Currency" class="form-control" value="SAR"/>
                   </td>

                   <td class="text-left">
                    Approved By <input type="text" name="ApprovedBy" class="form-control" />
                   </td>

                   <td class="text-left">
                   Expected date of delivery <input type="date" name="Expected_date_delivery" class="form-control"  value="<?=date('Y-m-d', strtotime('+1 week'))?>"/>
                   </td>

                  </tr>

                  <tr>
                    <td class="text-left">
                    Payment Terms <input type="text" name="PaymentTerms"  class="form-control" id="PaymentTerms" />
                    </td>
                  </tr>

                  






                  <tr>
                      <td class="text-left " colspan="4">
                          Note 
                      <input type="text" class="form-control" name="note"/></td>
                  </tr>




                  


              </tbody>
          </table>


          <script>
     function fetchSupplierValue()
        {
          let selectedValue = document.getElementById("supplierName").value;
          console.log(selectedValue); 

          let id = $('[name="'+selectedValue+'"]').attr("id");

          let mobile = $('[name="'+selectedValue+'"]').attr("mobile");

          let contactName = $('[name="'+selectedValue+'"]').attr("contactName");

          let contactEmail = $('[name="'+selectedValue+'"]').attr("contactEmail");

          let paymentTerms = $('[name="'+selectedValue+'"]').attr("paymentTerms");

          console.log(paymentTerms); 

          document.getElementById("supplierID").value = id;

          document.getElementById("contactName").value = contactName;

          document.getElementById("ContactMobile").value = mobile;

          document.getElementById("contactEmail").value = contactEmail;

          document.getElementById("PaymentTerms").value = paymentTerms;

          

        }
</script>
<br/>

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
                      <tr id="itemLine1">
                          <td id="SN">1</td>
                          <td>            <input type="text" class="form-control" name="itemNo_1"/></td>
                          <td colspan="2"><input type="text" class="form-control" name="Description_1" size="100"/></td>
                          <td>            <input type="number" class="form-control" name="Quantity_1" value="1" id="Quantity_1" onchange="Calc(1)"/></td>
                          <td><input type="text" class="form-control" value="15%" name="VAT_1"           id="VAT_1"             onchange="Calc(1)"/></td>
                          <td><input type="text" class="form-control" value="1"   name="UnitPrice_1"     id="UnitPrice_1"       onchange="Calc(1)"/></td>
                          <td><input type="text" class="form-control" value="1"   name="UnitPriceWithVAT_1"     id="UnitPriceWithVAT_1"  onchange="CalcV(1)"/></td>
                          <td><input type="text" class="form-control" value="0"   name="TotalAmount_1"   id="TotalAmount_1"/></td>
                          <td><input type="text" class="form-control" value="0"   name="TotalWithVAT_1"  id="TotalWithVAT_1"/></td>
                       </tr>


                       <tr id="TotalsLine">
                       <td colspan="8"></td>
                        <td><input type="text" class="form-control" name="ALLTotalAmount"     id="ALLTotalAmount" value="0"/></td>
                        <td><input type="text" class="form-control" name="ALLTotalAmountWithVAT" id="ALLTotalAmountWithVAT" value="0"/></td>
                       
                       </tr>
                      
                  </tbody>
                 
                  </table>

                 
                
       
         <hr>
         <a class="btn btn-info" onclick="addNewItem()">Add Item</a>


         <input type="hidden" name="Total_items" id="Total_items" value="1"/>

          <script>

              var ALLTotalAmountWithVAT = 0;
              var ALLTotalAmount = 0;

              function resetTotalValue()
              {
                ALLTotalAmountWithVAT = 0;
                ALLTotalAmount = 0;
              }

               
              function Calc(LineNO)
              {
                  let VAT_Percentage = parseFloat(document.getElementById("VAT_"+LineNO).value.replace("%", "")); 
                  let Quantity = parseInt(document.getElementById("Quantity_"+LineNO).value);
                  let UnitPrice = parseFloat(document.getElementById("UnitPrice_"+LineNO).value);

                  document.getElementById("TotalAmount_"+LineNO).value = parseFloat( Quantity * UnitPrice ).toFixed(2);

                 
                

                
                  let uintPriceWithVAT = ((VAT_Percentage / 100) * UnitPrice) + UnitPrice;
                  document.getElementById("UnitPriceWithVAT_"+LineNO).value = uintPriceWithVAT.toFixed(2);
                 
                
                let TotalAmount =  parseFloat(document.getElementById("TotalAmount_"+LineNO).value) 
                let TotalAmountWithVAT = TotalAmount + ((VAT_Percentage / 100) * TotalAmount)  ;

                document.getElementById("TotalWithVAT_"+LineNO).value = TotalAmountWithVAT.toFixed(2) ;

                 

                  ReCalcForTotals();

              }

              function CalcV(LineNO)
              {
                // user Enter price with VAT Recalculate All text box
                let VAT_Percentage = parseFloat(document.getElementById("VAT_"+LineNO).value.replace("%", ""));
                let Quantity = parseInt(document.getElementById("Quantity_"+LineNO).value);

                let uintPriceWithVAT = document.getElementById("UnitPriceWithVAT_"+LineNO).value;

                let UnitPrice = parseFloat(uintPriceWithVAT / ((VAT_Percentage / 100 + 1) ));
                // unit price without VAT
                document.getElementById("UnitPrice_"+LineNO).value = UnitPrice.toFixed(2);
                
                document.getElementById("TotalAmount_"+LineNO).value = parseFloat( Quantity * UnitPrice ).toFixed(2);
                // total amount without vat
                TotalAmount = parseFloat(document.getElementById("TotalAmount_"+LineNO).value);

               

                let TotalAmountWithVAT = TotalAmount + ((VAT_Percentage / 100) * TotalAmount)  ;

                document.getElementById("TotalWithVAT_"+LineNO).value = TotalAmountWithVAT.toFixed(2) ;
                ReCalcForTotals();

                //--

              }
              
             

              function  ReCalcForTotals()
              {
                ALLTotalAmountWithVAT = 0;
                ALLTotalAmount = 0;
                x = 1; 
                let totalItems =  document.getElementById("Total_items").value;
                while(x <= totalItems)
                {
                    ALLTotalAmount = ALLTotalAmount +  parseFloat(document.getElementById("TotalAmount_"+x).value);
                    ALLTotalAmountWithVAT =  ALLTotalAmountWithVAT +  parseFloat(document.getElementById("TotalWithVAT_"+x).value);
                    x++;
                }
                document.getElementById("ALLTotalAmount").value = ALLTotalAmount.toFixed(2);
                document.getElementById("ALLTotalAmountWithVAT").value = ALLTotalAmountWithVAT.toFixed(2);

              }

              var i = 1;
              var x = 0;
              function addNewItem()
              {
                i++;
                x = i -1;
                $("#itemLine"+x).after("<tr id='itemLine"+i+"' >"+
                                                    "<td>"+i+"</td>"+
                                                    "<td>            <input type='text' class='form-control' name='itemNo_"+i+"'/></td>"+
                                                    "<td colspan='2'><input type='text' class='form-control' name='Description_"+i+"' size='100'/></td>"+
                                                    "<td>            <input type='number' class='form-control' name='Quantity_"+i+"' value='1' id='Quantity_"+i+"' onchange='Calc("+i+")'/></td>"+
                                                    "<td><input type='text' class='form-control' value='15%' name='VAT_"+i+"'           id='VAT_"+i+"'             onchange='Calc("+i+")'/></td>"+
                                                    "<td><input type='text' class='form-control' value='1'   name='UnitPrice_"+i+"'     id='UnitPrice_"+i+"'       onchange='Calc("+i+")'/></td>"+
                                                    "<td><input type='text' class='form-control' value='1'   name='UnitPriceWithVAT_"+i+"'     id='UnitPriceWithVAT_"+i+"'       onchange='CalcV("+i+")'/></td>"+
                                                    " <td><input type='text' class='form-control' value='0'   name='TotalAmount_"+i+"'   id='TotalAmount_"+i+"'/></td>"+
                                                    " <td><input type='text' class='form-control' value='0'   name='TotalWithVAT_"+i+"'  id='TotalWithVAT_"+i+"'/></td>"+
                                                   "</tr>");



                                                   document.getElementById("Total_items").value = i;
              }
          </script>


           <!-- Car Data Table-->       
<!-------->


<hr>
<div class="row p-1">
 
<div class="col-6 text-left">
<input type="submit" value="SAVE"  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset"  class="btn btn-danger" id="restBtn" onclick="resetTotalValue()"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
