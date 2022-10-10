


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddDepartmentModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewDepartment.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              




                  


               


                  <tr>
                      <td class="text-left ">Company Name-   أسم الشركة / المؤسسة</td>
                      <td>
                          <select  name="CompanyName" id="CompanyList"  class="form-control" style="width: 100%;">
                          <?php
                          $sql = "select `id`, `company_name` from `company`;";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option id="'.$row["id"].'" value="'.$row["company_name"].'">'.$row["company_name"].' </option>');
                          }
                          ?>

                          </select>
                          <input type="hidden" name="companyID" id="companyID" value="1"/>
                        </td>

                        <script>
                             

                                $("#CompanyList").change(function() 
                                {
                                 let id = $(this).children(":selected").attr("id");
                                 document.getElementById("companyID").value = id;
                                 });

                             
                        </script>






                  </tr>




                  <tr>
                     <td class="text-left ">Department Name -     أسم القسم</td>
                      <td><input type="text" name="DepartmentName" class="form-control" required/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Department Manager Name -     أسم مدير القسم</td>
                      <td>
                          <select name="DepartmentManagerName" class="form-control " id="DepartmentManagerName"  style="width: 100%">
                   
                      <?php
                          $sql = "select `id`, `full_name` from `users`;";
                          $result = $conn->query($sql);
                         
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option id="'.$row["id"].'" value="'.$row["full_name"].'">'.$row["full_name"].'</option> ');
                          }
                          ?>
                         
                         </select>
                          <input type="hidden" name="ManagerID" id="ManagerID" value="1"/>
                      </td>

                      
                      <script>
                             

                             $("#DepartmentManagerName").change(function() 
                             {
                              let id = $("#DepartmentManagerName").children(":selected").attr("id");
                              document.getElementById("ManagerID").value = id;
                              });



                              $(document).ready(function() {
                                $("#DepartmentManagerName").select2();
                               // $("#CompanyList").select2();

                                });

                          
                     </script>
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
