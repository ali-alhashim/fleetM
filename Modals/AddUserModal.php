


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddUserModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddUser.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>User Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

              




                  <tr>
                     <td class="text-left ">Name -  الأسم</td>
                      <td><input type="text" class="form-control" required name="fullName"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">GOV. ID -  رقم الهوية</td>
                      <td><input type="number" class="form-control" name="GOVID"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Badge Number  - رقم الموظف</td>
                      <td><input type="text" class="form-control" name="BadgeNumber"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Company - الشركة </td>
                      <td>
                         
                          <input type="text" id="CompanyList" class="form-control" name="Company" list="companyList">
                          <datalist id="companyList">
                          <?php
                          $sql = "select `id`, `company_name` from `company`;";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option id="'.$row["id"].'" value="'.$row["company_name"].'">'.$row["company_name"].' </option>');
                          }
                          ?>

                              
                              
                          </datalist>

                          <input type="hidden" name="companyID" id="companyID" value="1"/>


                          <script>
                             

                                $("#CompanyList").change(function() 
                                {
                                 let id = $(this).children(":selected").attr("id");
                                 document.getElementById("companyID").value = id;
                                 });

                             
                        </script>

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left ">Department  - القسم </td>
                      <td>
                        <input type="text" class="form-control" name="Department" id="DepartmentList" list="departmentList">
                         <datalist id="departmentList">
                        <?php
                          $sql = "select `id`, `department_name`,  `manager_id`,`manager_name` from `department`;";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option manager-name="'.$row["manager_name"].'" manager-id="'.$row["manager_id"].'" id="'.$row["id"].'" value="'.$row["department_name"].'">'.$row["department_name"].' </option>');
                          }
                          ?>



                         </datalist> 
                        <input type="hidden" name="department_id" id="department_id" value="1"/>


                        <script>
                             

                             $("#DepartmentList").change(function() 
                             {
                              let id = $(this).children(":selected").attr("id");
                              let managerName = $(this).children(":selected").attr("manager-name");
                              let managerID   = $(this).children(":selected").attr("manager-id");
                              document.getElementById("department_id").value = id;
                              document.getElementById("ReportTo").value = managerName;
                              document.getElementById("ReportToID").value = managerID;
                              });

                          
                     </script>

                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Report to  - المدير المباشر </td>
                      <td>
                          <input type="text" class="form-control" name="ReportTo" id="ReportTo" >
                            
                        </td>
                          <input type="hidden" name="ReportToID" id="ReportToID"/>
                  </tr>

               

                  <tr>
                      <td class="text-left ">Driving License Soft Copy - صورة من رخصة القيادة</td>
                      <td>
                     
                          <input type="file" class="form-control p-1" name="DrivingLicense"/>
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">Office Address - عنوان المكتب </td>
                      <td><input type="text" class="form-control" name="OfficeAddress"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">E-mail -   البريد البريدالإلكتروني</td>
                      <td><input type="email" class="form-control" name="email"/></td>
                  </tr>

                    
                  <tr>
                      <td class="text-left ">Mobile -    رقم الجوال</td>
                      <td><input type="text" class="form-control" required name="mobile"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Telphone Ext. -    رقم التحويله</td>
                      <td><input type="text" class="form-control" name="TelphoneExt"/></td>
                  </tr>




                  <tr>
                      <td class="text-left ">Password :   كلمة المرور </td>
                      <td><input type="password" class="form-control" name="password"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Permission Group :    الصلاحيات </td>
                      <td>
                         <!---get the list of exists permission group--->
                         <select id="PermissionList"  class="form-control" name="PermissionGroup">
                         
                         <?php
                             $sql = "select `id`, `permission_group` from `permission_group` order by `id` DESC;";
                             $result2 = $conn->query($sql);
                             while($row5 = $result2->fetch_array(MYSQLI_ASSOC))
                             {
                                 echo(' <option id="'.$row5["id"].'" value="'.$row5["permission_group"].'">'.$row5["permission_group"].'</option>');
                             }
                             ?>
                         
                         </select>
                         <input type="hidden" name="PermissionGroupID" id="PermissionGroupID"/>
                      </td>
                  </tr>


                  


                  <tr>
                     <td class="text-left ">Join Date - تاريخ التوظيف</td>
                      <td><input type="date" class="form-control" name="JoinDate"  /></td>
                  </tr>


                


                  <tr>
                      <td class="text-left ">Status</td>
                      <td>
                         
                          <select id="statusList" class="form-control" name="Status">
                              <option value="Active">Active </option>
                              <option value="Deactive">Deactive</option>  
                          </select>
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
