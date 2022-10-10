


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddNewITAssetModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewITAsset.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="4"><h5>Add New IT Asset</h5></td>
                   
                  
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
                <br/>

              <tbody>

              <script>
                    function onFileSelected(event, imgID) {
                     var selectedFile = event.target.files[0];
                     var reader = new FileReader();

                     var imgtag = document.getElementById(imgID);
                     imgtag.title = selectedFile.name;

                     reader.onload = function(event) {
                     imgtag.src = event.target.result;
                      };

                      reader.readAsDataURL(selectedFile);
                    }

                    </script>
                   

              <table class="carDataTable ">

                  <tr>
                     <td class="text-left ">Serial Number</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" required name="serialNumber"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Category</td>
                      <td>
                          <input type="text" class="form-control" name="Category" list="CategoryList" />
                          <datalist id="CategoryList">
                              <option>Laptop</option>
                              <option>Desktop</option>
                              <option>Monitor</option>
                              <option>Printer</option>
                              <option>Ink</option>
                              <option>IP Camera</option>
                              <option>Router</option>
                              <option>Switch</option>
                              <option>Mobile</option>
                              <option>Projector</option>
                          </datalist>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Manufacture</td>
                      <td>
                          <input type="text" class="form-control" name="Manufacture" list="ManufactureList"/>
                          <datalist id="ManufactureList">
                          <option>HP</option>
                          <option>DELL</option>
                          <option>Asus</option>
                          <option>Lenovo</option>
                          <option>Apple</option>
                          <option>MSI</option>
                          <option>Acer</option>
                          <option>LG</option>
                          <option>Samsung</option>
                          <option>Huawei</option>
                          <option>Cisco</option>
                          <option>hikVision</option>
                          </datalist>
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Model</td>
                      <td>
                         
                         <input type="text" class="form-control" name="Model">

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> Condition	 </td>
                      <td>
                           <select name="Condition" class="form-control">
                               <option>New</option>
                               <option>Used</option>
                               <option>Damaged</option>
                               <option>Sold</option>
                               <option>Stolen</option>
                           </select>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Description</td>
                      <td>
                          <input type="text" class="form-control" name="Description" id="Description" >
                            
                        </td>
                         
                  </tr>

               

                  <tr>
                      <td class="text-left ">Creation Date</td>
                      <td>
                     
                          <input type="date" class="form-control p-1" name="CreationDate" value="<?=date("Y-m-d")?>" readonly/>
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">PO ID</td>
                      <td><input type="text" class="form-control" name="PO_ID"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Supplier Name</td>
                      <td>
                          <select class="form-control" name="supplier_name">
                              <option>Jarir</option>
                          </select>
                        </td>
                  </tr>

                    
                  <tr>
                      <td class="text-left ">Supplier ID</td>
                      <td><input type="text" class="form-control"  name="supplier_id" readonly value="0"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">invoice number</td>
                      <td><input type="text" class="form-control" name="invoice_number"/></td>
                  </tr>




                  <tr>
                      <td class="text-left ">location</td>
                      <td><input type="text" class="form-control" name="location"/></td>
                  </tr>


                  <tr>
                      <td class="text-left "> Department     </td>
                      <td>
                      <input type="text" name="department" class="form-control"/>
                      </td>
                  </tr>


                  


                  <tr>
                     <td class="text-left "> Purchased price  </td>
                      <td><input type="text" class="form-control" name="purchased_price"  /></td>
                  </tr>


                


                  <tr>
                      <td class="text-left ">Purchased Date</td>
                      <td>
                         
                          <input type="date" name="purchasedDate" class="form-control" value="<?=date("Y-m-d")?>"/>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Asset Date</td>
                      <td>
                         
                          <input type="date" name="AssetDate" class="form-control" value="<?=date("Y-m-d")?>"/>
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
