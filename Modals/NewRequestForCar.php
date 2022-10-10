


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="NewRequestForCar">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/NewRequestForCar.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              
              <tbody>

              

                    <tr>
                     <td class="text-left ">User ID -  رقم   المستخدم</td>
                      <td><input type="text" class="form-control"  name="UserID" value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Name -     الأسم</td>
                      <td><input type="text" class="form-control"  name="fullName" value="<?=$rowz["full_name"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Email -     البريد الإلكتروني</td>
                      <td><input type="text" class="form-control"  name="email" value="<?=$rowz["email"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Mobile -      رقم الجوال</td>
                      <td><input type="text" class="form-control"  name="Mobile" value="<?=$rowz["mobile_number"]?>" readonly/></td>
                  </tr>

                  

                  <tr>
                     <td class="text-left ">telphone ext -       رقم التحويله</td>
                      <td><input type="text" class="form-control"  name="telphone_ext" value="<?=$rowz["telphone_ext"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Badge Number -     الرقم الوظيفي</td>
                      <td><input type="text" class="form-control"  name="badge_number" value="<?=$rowz["badge_number"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Company -      الشركة</td>
                      <td><input type="text" class="form-control"  name="company" value="<?=$rowz["company"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Department -      القسم</td>
                      <td><input type="text" class="form-control"  name="Department" value="<?=$rowz["department"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Report To -      المدير المباشر</td>
                      <td><input type="text" class="form-control"  name="reportTo" value="<?=$rowz["report_to"]?>" readonly/></td>
                  </tr>


                  <tr>
                     <td class="text-left "> attachment  -       المرفقات</td>
                      <td><input type="file" class="form-control"  name="attachment"  /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Request Date - تاريخ الطلب</td>
                      <td><input type="date" class="form-control" name="RequestDate" value="<?=date("Y-m-d")?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Request Type - نوع الطلب</td>
                      <td>
                        <select class="form-control" name="requestType">
                          <option>New Car - طلب سيارة</option>
                          <option>Replacement car - طلب سيارة بديله</option>
                          <option>Car Service - طلب صيانة</option>
                          
                        </select>
                      </td>
                  </tr>

                  

                  <tr>
                      <td class="text-left ">Justification - التبرير</td>
                      <td><input type="text" class="form-control" name="Justification"/></td>
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
