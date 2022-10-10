


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddCarInsuranceModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewCarInsurance.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              




                  <tr>
                     <td class="text-left ">Car ID -   رقم  المركبة</td>
                      <td><input type="text" name="CarID" class="form-control"  value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>


               


                 

                  <tr>
                     <td class="text-left "> Company Name  -       أسم شركة التأمين</td>
                      <td><input type="text" name="CompanyName" class="form-control"  /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Policy Number  -        رقم وثيقة التأمين</td>
                      <td><input type="text" name="PolicyNumber" class="form-control"  /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> insurance class  -         تصنيف التأمين</td>
                      <td><select name="insuranceClass" class="form-control"  >
                           <option value="third-party">third-party | ضد الغير</option>
                           <option value="comprehensive">comprehensive |  شـامل</option>
                      </select>
                      </td>
                  </tr>

                 

                  <tr>
                     <td class="text-left "> Insurance Area  -       التغطية الجغرافية</td>
                      <td><input type="text" name="insurance_area" class="form-control"  value="Saudi Arabia" list="AreaList"/></td>
                      <datalist id="AreaList">
                          <option>Saudi Arabia
                          <option>Bahrain
                          <option>GCC
                          
                      </datalist>
                  </tr>


                  <tr>
                     <td class="text-left "> Insured Value  -     القيمة المقدرة للمركبة</td>
                      <td><input type="text" name="InsuredValue" class="form-control"  /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Type Repair  -      نوع الإصلاح</td>
                      <td><select name="TypeRepair" class="form-control"  >
                           <option value="Workshop">Workshop |  ورش</option>
                           <option value="Agency">Agency |  وكالة</option>
                      </select>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insure car accessories -    تأمين ملحقات المركبة</td>
                      <td><input type="checkbox" class="form-control" name="InsureAccessories"/></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Excess Amount  -       قيمة التحمل</td>
                      <td><input type="text" name="ExcessAmount" class="form-control" value="1000" /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Insurance Amount  -       قيمة التأمين</td>
                      <td><input type="text" name="InsuranceAmount" class="form-control"  /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Insurance Start  -  تاريخ البدء</td>
                      <td><input type="Date" name="InsuranceStart" class="form-control"  /></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Insurance End  -  تاريخ الإنتهاء</td>
                      <td><input type="Date" name="InsuranceEnd" class="form-control"  /></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Note  -        ملاحظات</td>
                      <td><input type="text" name="note" class="form-control"  /></td>
                  </tr>


                  <tr>
                     <td class="text-left "> Document  -        المستند</td>
                      <td><input type="file" name="DocumentURL" class="form-control p-1"  /></td>
                  </tr>

                  
                




                



                  


              </tbody>
          </table>
       
         <hr>




           <!-- Car Data Table-->       
<!-------->


<hr>



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
