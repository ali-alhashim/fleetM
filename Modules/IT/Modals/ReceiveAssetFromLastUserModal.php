


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ReceiveAssetFromLastUserModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/ReceiveAssetFromLastUser.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              
              <tbody>

              

                    <tr>
                     <td class="text-left ">Asset ID</td>
                      <td><input type="text" class="form-control"  name="AssetID" value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>

                 <?php
                  $sql = "select `id`, `user_name`, `user_id`, `received_date`   
                           from `it_users_assets` where `asset_id`=".$_GET["id"]." order by `received_date` DESC limit 1;";
                           $result = $conn->query($sql);
                           $row = $result->fetch_array(MYSQLI_ASSOC);
                   ?>

                   <tr>
                     <td class="text-left ">Record [Asset User] ID </td>
                      <td><input type="text" class="form-control"  name="AssetUserID" value="<?=$row["id"]?>" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User Name</td>
                      <td><input type="text" class="form-control" name="CurrentAssetUserName" value="<?=$row["user_name"]?> " readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User ID</td>
                      <td><input type="text" class="form-control" name="CurrentAssetUserID" value="<?=$row["user_id"]?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left">Received Date </td>
                      <td><input type="text" class="form-control" name="receivedDate" value="<?=$row["received_date"]?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Handover Date </td>

                      <td>
                          <input type="date" class="form-control" name="handoverDate" value="<?=date("Y-m-d")?>" />
                      </td>

                  </tr>
                  


                  <tr>
                      <td class="text-left ">Note </td>
                      <td><input type="text" class="form-control" name="note"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">New User Name</td>
                      <td>
                          <select type="text" class="form-control" name="NewUserName" id="NewUserName" style="width: 100%;" >
                           <option>select user  ...</option>
                          <?php
                          $sql = "select `id`, `email`, `full_name`, `department` from `users`;";
                          $result = $conn->query($sql);
                         
                          while($row = $result->fetch_array(MYSQLI_ASSOC))
                          {
                              echo('<option  department="'.$row["department"].'" email="'.$row["email"].'" id="'.$row["id"].'" value="'.$row["full_name"].'">'.$row["full_name"].'</option> ');
                          }
                          ?>   

                          </select>
                         
                      </td>
                  </tr>

                  <tr>
                      <td class="text-left ">User ID</td>
                      <td><input type="text" class="form-control" id="NewUserID" name="NewUserID"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User Email</td>
                      <td><input type="text" class="form-control" id="NewUserEmail" name="NewUserEmail"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Department</td>
                      <td><input type="text" class="form-control" id="Department" name="Department"/></td>
                  </tr>

                 

                  <tr>
                      <td class="text-left ">Received Date for New Asset user</td>
                      <td><input type="date" class="form-control" name="NewReceivedDate" value="<?=date("Y-m-d")?>" /></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Note for New Asset user </td>
                      <td><input type="text" class="form-control" name="noteForNewAssetUser"/></td>
                  </tr>

                 


                  <script>
                             

                             $("#NewUserName").change(function() 
                             {
                              let id = $("#NewUserName").children(":selected").attr("id");
                              let email = $("#NewUserName").children(":selected").attr("email");
                              let department = $("#NewUserName").children(":selected").attr("department");
                              document.getElementById("NewUserID").value = id;
                              document.getElementById("NewUserEmail").value = email;
                              document.getElementById("Department").value = department;
                              });



                              $(document).ready(function() {
                                $("#NewUserName").select2();
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
<input type="submit" value="SAVE"  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset"  class="btn btn-danger"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
