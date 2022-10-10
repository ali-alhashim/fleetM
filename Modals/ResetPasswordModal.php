


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ResetPasswordModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/ResetPassword.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              

              <input type="hidden" name="UserID" class="form-control" value="<?=$_GET["id"]?>"/>


                  <tr>
                     <td class="text-left ">Current Password -     كلمة المرور الحالية</td>
                      <td><input type="password" name="CurrentPassword" class="form-control" required/></td>
                  </tr>


               


                  <tr>
                      <td class="text-left ">New Password- كلمة المرور الجديدة       </td>
                      <td><input type="password" name="NewPassword"  class="form-control"  required /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Confirm Password -     تأكيد كلمة المرور </td>
                      <td>
                          <input type="password" name="ConfirmPassword"  class="form-control" required />
                        </td>
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
