


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="handoverCarModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/handoverCar.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              
              <tbody>

              

                    <tr>
                     <td class="text-left ">Car ID -  رقم المركبة في النظام</td>
                      <td><input type="text" class="form-control"  name="carID" value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>

                 <?php
                  $sql = "select `id`, `driver_id`, `driver_name`, `mobile_number`, `project`, `received_date`,`handover_date`, `id`  
                           from `car_users` where `car_id`=".$_GET["id"]." order by `received_date` DESC limit 1;";
                           $result = $conn->query($sql);
                           $row = $result->fetch_array(MYSQLI_ASSOC);
                   ?>

                   <tr>
                     <td class="text-left ">Record [received & handover] ID -  رقم   سجل الاستلام و التسليم</td>
                      <td><input type="text" class="form-control"  name="RecordID" value="<?=$row["id"]?>" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Current Car Driver name - اسم سائق السيارة الحالي</td>
                      <td><input type="text" class="form-control" name="CurrentDriverName" value="<?=$row["driver_name"]?> " readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Current Car Driver ID - رقم سائق السيارة الحالي</td>
                      <td><input type="text" class="form-control" name="CurrentDriverID" value="<?=$row["driver_id"]?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Received Date -    تاريخ الإستلام</td>
                      <td><input type="date" class="form-control" name="receivedDate" value="<?=$row["received_date"]?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Handover Date -    تاريخ التسليم</td>
                      <td><input type="date" class="form-control" name="handoverDate" value="<?=date("Y-m-d")?>" /></td>
                  </tr>
                  


                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" name="note"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">New Car Driver name - اسم سائق السيارة الجديد</td>
                      <td>
                          <select type="text" class="form-control" name="NewDriverName" id="NewDriverName" style="width: 100%;" >

                          <?php
                          $sql = "select `id`, `full_name` from `users`;";
                          $result = $conn->query($sql);
                         
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option id="'.$row["id"].'" value="'.$row["full_name"].'">'.$row["full_name"].'</option> ');
                          }
                          ?>   

                          </select>
                          <input type="hidden" name="NewDriverID" id="NewDriverID" value="1"/>
                      </td>
                  </tr>

                  <tr>
                      <td class="text-left ">Mobile- رقم الجوال</td>
                      <td><input type="text" class="form-control" name="mobile"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Received Date for New Driver -    تاريخ الإستلام لـ السائق الجديد</td>
                      <td><input type="date" class="form-control" name="NewReceivedDate" value="<?=date("Y-m-d")?>" /></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Note for New Driver- ملاحظات</td>
                      <td><input type="text" class="form-control" name="noteForNewDriver"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Project- مشروع</td>
                      <td><input type="text" class="form-control" name="project"/></td>
                  </tr>


                  <script>
                             

                             $("#NewDriverName").change(function() 
                             {
                              let id = $("#NewDriverName").children(":selected").attr("id");
                              document.getElementById("NewDriverID").value = id;
                              });



                              $(document).ready(function() {
                                $("#NewDriverName").select2();
                               // $("#CompanyList").select2();

                                });

                          
                     </script>

                  


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
