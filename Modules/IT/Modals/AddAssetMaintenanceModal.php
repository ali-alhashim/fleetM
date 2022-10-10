


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddAssetMaintenanceModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewAssetMaintenance.php" enctype="multipart/form-data">


   <!-- Car information Table-->

   <table class="carDataTable ">

   <thead>
                  <tr style="background:#000">
                    
                      <td colspan="4"><h5>Add New Asset Maintenance</h5></td>
                   
                  
                  </tr>
              </thead>

   <thead>
                  <tr >
                      <td>Front photo</td>
                      <td>Back photo </td>
                      <td>Right photo </td>
                      <td>Left photo </td>
                  </tr>
              </thead>

              <tbody>
              <tr>
                      <td>
                          <img  class=" carPhoto " alt="..." onclick="window.open(this.src, '_blank');" id="imgFrontPhoto"  height="100px"/>
                          <input type="file" id="frontPhoto" name="frontPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgFrontPhoto')">
                      </td>

                      
                   

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgBackPhoto" height="100px"/>
                          <input type="file" id="backPhoto" name="backPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgBackPhoto')">
                        </td>

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgRightPhoto"  height="100px"/>
                          <input type="file" id="rightPhoto" name="rightPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgRightPhoto')">
                        </td>

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgLeftPhoto"  height="100px"/>
                          <input type="file" id="leftPhoto" name="leftPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgLeftPhoto')">
                        </td>
                  </tr>
                  </tbody>

                </table>
         
        
   <table class="carDataTable ">
             

            

                  <tr>
                     <td class="text-left ">Asset ID</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="asset_id" value="<?=$_GET["id"]?>"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Serial Number</td>
                      <td>
                          <input type="text" class="form-control" name="serial_number"  />
                         
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">invoice number</td>
                      <td>
                          <input type="text" class="form-control" name="invoice_number"/>
                        
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">maintenance by</td>
                      <td>
                         
                         <input type="text" class="form-control" name="maintenance_by">

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left ">condition</td>
                      <td>
                           <input type="text" name="condition" class="form-control">
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Maintenance cost </td>
                      <td>
                          <input type="text" class="form-control" name="maintenance_cost" id="Description" >
                            
                        </td>
                         
                  </tr>

               

                  <tr>
                      <td class="text-left ">Description</td>
                      <td>
                     
                          <input type="text" class="form-control p-1" name="description" />
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">Maintenance Date</td>
                      <td><input type="date" class="form-control" name="Maintenance_date" value="<?=date("Y-m-d")?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Warranty</td>
                      <td>
                          <input type="date" class="form-control" name="warranty" value="<?=date('Y-m-d', strtotime('+1 year'))?>"/>
                        </td>
                  </tr>

                  <tr>
                      <td class="text-left ">Maintenance attachment</td>
                      <td>
                          <input type="file" class="form-control p-1" name="maintenance_url" />
                        </td>
                  </tr>


                    
                  

                  <tr>
                      <td class="text-left ">Note</td>
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
