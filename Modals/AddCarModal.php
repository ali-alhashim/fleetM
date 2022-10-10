


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddCarModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewCar.php" enctype="multipart/form-data">
<table class="carDataTable">
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
              <hr>

         <!-- Car information Table-->



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


          <!-- Car information Table-->
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                 




                  <tr>
                     <td class="text-left ">Door Number - رقم الباب</td>
                      <td><input type="text" class="form-control" name="doorNumber" /></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Model - طراز المركبة</td>
                      <td><input type="text" class="form-control" name="model"  required/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Brand - الشركة المصنعة</td>
                      <td>
                          <input type="text" name="Brand" class="form-control"  list="CarsBrands" required/>
                          <datalist id="CarsBrands">
                              <option value="Toyota">
                              <option value="GMC">
                              <option value="chevrolet">    
                              <option value="Honda">
                              <option value="Chrysler"> 
                              <option value="Dodge"> 
                              <option value="Ford"> 
                              <option value="Genesis"> 
                              <option value="Hyundai"> 
                              <option value="Infiniti"> 
                              <option value="Jeep"> 
                              <option value="Land Rover">
                              <option value="Lexus"> 
                              <option value="Lincoln"> 
                              <option value="Maserati"> 
                              <option value="Mazda"> 
                              <option value="Mercedes-Benz"> 
                              <option value="Mitsubishi"> 
                              <option value="Nissan"> 
                              <option value="Porsche"> 
                              <option value="Ram"> 
                              <option value="Suzuki"> 
                              <option value="KIA">
                              <option value="Isusu">
                          </datalist>
                     </td>

                  </tr>


                  <tr>
                      <td class="text-left ">Year Of Make  - سنة الصنع</td>
                      <td><input type="number" class="form-control" name="yearMake"  required/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Plate Number  - رقم اللوحة</td>
                      <td><input type="text" class="form-control" name="PlateNumber" required/></td>
                  </tr>


                  <tr>
                      <td class="text-left "> Body Type  -  نوع المركبة</td>
                      <td>
                          <select  class="form-control" name="BodyType" >
                              <option value="sedan">sedan - سيدان</option>
                              <option value="Crossover">Crossover - كروس أوفر</option>
                              <option value="Hatchback">Hatchback - هاتشباك </option>
                              <option value="jeep">jeep - جيب</option>
                              <option value="Pickup truck">Pickup truck -نقل شاحنه</option>
                              <option value="Light Truck">Light Truck - شاحنه خفيفه</option>
                              <option value="Truck">Truck - شاحنه</option>
                          </select>

                          </td>
                  </tr>

                  <tr>
                      <td class="text-left ">Serial Number : الرقم التسلسلي</td>
                      <td><input type="number" class="form-control" value="" name="SerialNumber"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">VID :  رقم الهيكل</td>
                      <td><input type="text" class="form-control" value="" name="VID"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Color - اللون</td>
                      <td><input type="text" class="form-control" value="" list="colorList" name="color" /></td>
                      <datalist id="colorList">
                          <option value="white">
                          <option value="black">
                          <option value="gray">    
                      </datalist>
                  </tr>


                  <tr>
                      <td class="text-left ">seats - عدد المقاعد</td>
                      <td><input type="number" class="form-control" name="seats"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Fuel Type - نوع الوقود</td>
                      <td>
                          <input type="text" class="form-control"  list="FuelTypeList" name="FuelType"/>
                          <datalist id="FuelTypeList">
                              <option value="Octane 91">
                              <option value="Octane 95">  
                              <option value="Diesel">
                              <option value="Hybrid">  
                              <option value="Hydrogen">
                              <option value="Electric">     
                          </datalist>
                      </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Car Status - حالة المركبة</td>
                      <td>
                        

                          <select id="CarStatusList" class="form-control" name="CarStatus">
                             <option value="working">working - تعمل</option>
                              <option value="Sold">Sold - مباعة </option>
                              <option value="total loss">total loss - خسارة كلية </option>
                              <option value="stolen"> stolen - مسروقه </option>
                              <option value="exported abroad"> exported abroad - مصدرة بالخارج </option>
                              <option value="under maintenance">under maintenance - تحت الصيانة </option>
                            </select>

                     </td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Inspection Expiration - تاريخ إنتهاء الفحص</td>
                      <td>
                          <input type="date" class="form-control" name="InspectionExpiration" id="InspectionExpiration" value="<?=date('Y-m-d',strtotime('+1 year'))?>"/>

   <!--------------hijriDatePicker----------------->
 
   <!----------------------------------------------->



                        </td>
                  </tr>
                  



                  <tr>
                      <td class="text-left ">Odometer - ممشى المركبة</td>
                      <td><input type="text" class="form-control" name="Odometer"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" name="Note"/></td>
                  </tr>




                  


              </tbody>
          </table>

          <hr>

            <!---Car Owner--->
            
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Owner -  مالك المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Owner Name -  أسم المالك </td>
                      <td class="w-50"><input type="text" class="form-control"  name="OwnerName"/></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Owner ID -  رقم هوية المالك </td>
                      <td class="w-50"><input type="text" class="form-control"  name="OwnerID" /></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Owner-->
         <hr>
            <!--Car License Registration-->

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car License Registration - رخصة التسجيل</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Registration License expiration - تاريخ إنتهاء رخصة السير</td>
                      <td class="w-50"><input type="date" class="form-control"  name="LicenseExpiration" value="<?=date('Y-m-d',strtotime('+3 year'))?>" /></td> 
                  </tr>


                  <tr>
                      <td class="text-left">Registration License Soft Copy - نسخة إلكترونية من رخصة التسجيل</td>
                      <td class="w-50">
                      <input type="file" class="form-control p-1" name="LicenseSoftCopy">
                      </td> 
                  </tr>

              </tbody>
         </table>


         <!---Car Accessories--->


           <!---Car Accessories--->
           <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Accessories - اكسسوارات المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left"> GPS. Tracking - جهاز تعقب</td>
                      <td class="w-50"><input type="checkbox" class="form-control"  name="GPS" value="1" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Fuel Chip - شريحة وقود</td>
                      <td class="w-50"><input type="checkbox" class="form-control" name="FuelChip" value="1"   /></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Accessories-->

          <!---Car Value--->
          <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Value - قيمة المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Purchased Date - تاريخ الشراء </td>
                      <td class="w-50"><input name="PurchasedDate" type="date" class="form-control"  value="<?php echo(date('Y-m-d')); ?>" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Purchased Amount - قيمة الشراء </td>
                      <td class="w-50"><input name="PurchasedAmount" type="text" class="form-control" value="0"   /></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Value-->
<!-------->


<hr>
<div class="row p-1">
 
<div class="col-6">
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
