


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddCompanyModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewCompany.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              




                  <tr>
                     <td class="text-left ">Company CR -   رقم السجل التجاري</td>
                      <td><input type="text" name="CompanyCR" class="form-control" required/></td>
                  </tr>


               


                  <tr>
                      <td class="text-left ">Company Name-   أسم الشركة / المؤسسة</td>
                      <td><input type="text" name="CompanyName"  class="form-control"  required /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Company Logo-    شعار الشركة </td>
                      <td>
                          <input type="file" name="CompanyLogo"  class="form-control p-1"  />
                        </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Company CR Expiration-     تاريخ إنتهاء السجل التجاري </td>
                      <td><input type="date" name="CompanyCRExpiration"  class="form-control p-1"  /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Company CR Soft Copy-      نسخة إلكترونية من السجل التجاري </td>
                      <td><input type="file" name="CompanyCR_URL"  class="form-control p-1"  /></td>
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
