


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="DeliveryThisPOModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewDeliveryNote.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New Delivery Note</h5></td>
                   
                  
                  </tr>
              </thead>

              <?php
              

               try{
               $sql = "SELECT `id` from `delivery_note` order by `id` DESC  limit 1"; 
               $resultx = $conn->query($sql);
               $rowx = $resultx->fetch_array(MYSQLI_ASSOC);
               if(isset($rowx["id"]))
               {
                 $NextPOID = (int) $rowx["id"] + 1 ;
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
                     <td class="text-left ">Delivery ID</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="DeliveryID" value="<?= $NextPOID?>"/></td>
                  </tr>
            

                  <tr>
                     <td class="text-left ">PO ID</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="po_id" value="<?=$_GET["id"]?>"/></td>
                  </tr>





                  <tr>
                      <td class="text-left ">Delivery Date</td>
                      <td>
                          <input type="date" class="form-control" name="DeliveryDate" value="<?=date("Y-m-d")?>"/>
                        
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Delivery Address</td>
                      <td>
                         
                         <input type="text" class="form-control" name="DeliveryAddress" value="<?=$row["shipping_address"]?>">

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> Received By 	 </td>
                      <td>
                           <input type="text" name="ReceivedBy" class="form-control" value="<?=$_SESSION["full_name"]?>">
                             
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

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="12"><h5>PO Items</h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>SN</td>
                      <td> ID </td>
                      <td>Item No.</td>
                      <td>Description  </td>
                      <td>PO Quantity  </td>
                      <td>Receive  Quantity  </td>
                      <td>Total Received  Quantity  </td>
                      <td>Remaining Quantity </td>
                     
                    
                  </tr>
              </thead>
              <tbody>

              <?php

              $sql = "select * from `it_po_line` where `po_id`=".$_GET["id"]." order by `id`;";
                      
              $result = $conn->query($sql);
               $count =1;
              while($row1 = $result->fetch_array(MYSQLI_ASSOC))
              {
                  echo("<tr>");
                  echo('<td>'.$count.'</td>');
                  echo('<td> <input type="text" value="'.$row1["id"].'" size="2" readonly name="ID_'.$count.'" class="form-control"/></td>');
                 echo("<td><input type='text' value='".$row1["item_no"]."' name='itemNo_".$count."' readonly class='form-control'/></td>");
            
                 echo("<td><input type='text' value='".$row1["item_description"]."' name='itemDescription_".$count."' readonly class='form-control w-100'/></td>");

                
             
                echo("<td><input type='text' name='POQuantity_".$count."' value='".$row1["quantity"]."' readonly class='form-control' /></td>");

                echo("<td><input type='number' name='ReceiveQuantity_".$count."' value='".$row1["remaining_quantity"]."'  size='2'  class='form-control' /></td>");

                echo("<td><input type='text' name='receivedQuantity_".$count."' value='".$row1["received_quantity"]."' class='form-control' readonly/></td>");

                echo("<td><input type='text' name='remaining_quantity_".$count."' value='".$row1["remaining_quantity"]."' size='2' class='form-control' readonly/></td>");

                
            

             echo("</tr>");
             $count++;
              }
                
              echo("<input type='hidden' name='totalItems' value='".$count."' />");

                 ?>


              </tbody>
         </table>
         <hr>




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
