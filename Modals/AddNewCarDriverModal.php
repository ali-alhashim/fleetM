


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddNewCarDriverModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewCarDriver.php" enctype="multipart/form-data">


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
                     <td class="text-left ">Driver  Name -     أسم  السائق</td>
                      <td>

                          <input type="text" name="DriverName" class="form-control " id="DriverName"  list="userList" onchange="fetchUserValue()">
                          
                          <datalist id="userList">
                           <option mobile="0" id="0" name="0 ">none</option>
                      <?php
                          $sql = "select `id`, `full_name`,  `company`, `department`, `mobile_number` from `users`;";
                          $result = $conn->query($sql);
                         
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option company="'.$row["company"].'"  department="'.$row["department"].'" mobile="'.$row["mobile_number"].'" id="'.$row["id"].'" name="'.$row["full_name"].'">'.$row["full_name"].'</option> ');
                          }
                          ?>
                         
                        </datalist>
                          <input type="hidden" name="DriverID" id="DriverID" value="0"/>
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

          document.getElementById("DriverID").value = id;
          document.getElementById("MobileNo").value = mobile;

          document.getElementById("DriverCompany").value = company;

          document.getElementById("DriverDepartment").value = department;
          

        }




                             

                          
                     </script>
                  </tr>

                 

                  <tr>
                     <td class="text-left ">Mobile Number  -      رقم الجوال</td>
                      <td><input type="text" name=" mobile_number" class="form-control"  id="MobileNo"/></td>
                  </tr>

                  
                  <tr>
                     <td class="text-left ">Received date -     تاريخ التسليم</td>
                      <td><input type="date" name="ReceivedDate" class="form-control" value="<?=date("Y-m-d")?>" /></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Company Name -      أسم الشركة</td>
                      <td><input type="text" name="CompanyName" class="form-control"  id="DriverCompany"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Department Name -      القسم</td>
                      <td><input type="text" name="Department" class="form-control" id="DriverDepartment" /></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Project Name -      المشروع</td>
                      <td><input type="text" name="project" class="form-control"  /></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Project Code -      كود المشروع</td>
                      <td><input type="text" name="projectCode" class="form-control"  /></td>
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
