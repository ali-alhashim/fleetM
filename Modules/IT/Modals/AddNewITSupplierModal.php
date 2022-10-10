


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddNewITSupplierModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewITSupplier.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New IT Supplier</h5></td>
                   
                  
                  </tr>
              </thead>


            

                  <tr>
                     <td class="text-left ">Supplier Name</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" required name="SupplierName"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Supplier ID</td>
                      <td>
                          <input type="text" class="form-control" name="SupplierID"  disabled/>
                         
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Website</td>
                      <td>
                          <input type="text" class="form-control" name="website"/>
                        
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Contact Name</td>
                      <td>
                         
                         <input type="text" class="form-control" name="ContactName">

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> Contact Email	 </td>
                      <td>
                           <input type="email" name="ContactEmail" class="form-control">
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Contact Mobile</td>
                      <td>
                          <input type="text" class="form-control" name="ContactMobile" id="Description" >
                            
                        </td>
                         
                  </tr>

               

                  <tr>
                      <td class="text-left ">Address</td>
                      <td>
                     
                          <input type="text" class="form-control p-1" name="Address" />
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">Due Payment</td>
                      <td><input type="text" class="form-control" name="DuePayment" value="0"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Payment Terms</td>
                      <td><input type="text" class="form-control" name="payment_terms" value="cash"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">VAT ID</td>
                      <td>
                          <input type="text" class="form-control" name="VATID" />
                        </td>
                  </tr>

                    
                  

                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" name="note"/></td>
                  </tr>




                  


              </tbody>
          </table>
       
         <hr>




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
