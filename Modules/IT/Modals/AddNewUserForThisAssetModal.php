


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddNewUserForThisAssetModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewUserAsset.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New User For Asset</h5></td>
                   
                  
                  </tr>
              </thead>


            

                  <tr>
                     <td class="text-left ">Asset ID</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="AssetID" value="<?=$_GET["id"]?>"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Name  </td>
                      <td>

                          <input type="text" name="userName" class="form-control " id="DriverName"  list="userList" onchange="fetchUserValue()">
                          
                          <datalist id="userList">
                           <option mobile="0" id="0" name="0 ">none</option>
                      <?php
                          $sql = "select `id`, `full_name`,  `company`, `department`, `mobile_number`, `email` from `users`;";
                          $result = $conn->query($sql);
                         
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option company="'.$row["company"].'" email="'.$row["email"].'"  department="'.$row["department"].'" mobile="'.$row["mobile_number"].'" id="'.$row["id"].'" name="'.$row["full_name"].'">'.$row["full_name"].'</option> ');
                          }
                          ?>
                         
                        </datalist>
                          <input type="hidden" name="userID" id="DriverID" value="0"/>
                      </td>

                      
                      <script>
                             

                             function fetchUserValue()
        {
          let selectedValue = document.getElementById("DriverName").value;
          console.log(selectedValue); 

          let id = $('[name="'+selectedValue+'"]').attr("id");
          let mobile = $('[name="'+selectedValue+'"]').attr("mobile");

          let company = $('[name="'+selectedValue+'"]').attr("company");

          let department = $('[name="'+selectedValue+'"]').attr("department");

          let email = $('[name="'+selectedValue+'"]').attr("email");

          document.getElementById("DriverID").value = id;
          document.getElementById("MobileNo").value = mobile;

          document.getElementById("DriverCompany").value = company;

          document.getElementById("DriverDepartment").value = department;

          document.getElementById("Email").value = email;
          

        }




                             

                          
                     </script>
                  </tr>


                  <tr>
                     <td class="text-left ">Email</td>
                      <td><input type="text" name="Email" class="form-control"  id="Email"/></td>
                  </tr>

                    

                  <tr>
                     <td class="text-left ">Mobile Number </td>
                      <td><input type="text" name="mobile_number" class="form-control"  id="MobileNo"/></td>
                  </tr>

                  
                  <tr>
                     <td class="text-left ">Company Name</td>
                      <td><input type="text" name="CompanyName" class="form-control"  id="DriverCompany"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Department Name </td>
                      <td><input type="text" name="Department" class="form-control" id="DriverDepartment" /></td>
                  </tr>


                  
                  <tr>
                     <td class="text-left ">Received date</td>
                      <td><input type="date" name="ReceivedDate" class="form-control" value="<?=date("Y-m-d")?>" /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">prepared by</td>
                      <td><input type="text" class="form-control" name="prepared_by"/></td>
                  </tr>

                  <tr>
                      <td class="text-left "> checked by</td>
                      <td><input type="text" class="form-control" name="checked_by"/></td>
                  </tr>



                  

                  <tr>
                      <td class="text-left ">Note </td>
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
