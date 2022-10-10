


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddPermissionGroupModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddNewPermissionGroup.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              




                  <tr>
                     <td class="text-left ">Permission Group - أسم مجموعة الصلاحيات</td>
                      <td><input type="text" name="PermissionGroup" class="form-control" required/></td>
                  </tr>


                  <?php

                     $sql = "select  id from `permission_group` order by id DESC  limit 1";
                     
                     
                    
                     try
                     {
                        $result = $conn->query($sql); 

                        $row = $result->fetch_array(MYSQLI_NUM);
                       
                     }
                     catch(Exception  $e)
                     {
                         echo($e->getMessage());
                     }
                    

                    
                  ?>


                  <tr>
                      <td class="text-left ">Permission Group ID- رقم مجموعة الصلاحيات</td>
                      <td><input type="text" name="PermissionGroupID" value="<?php echo( $row[0] + 1 ) ?>" class="form-control" readonly="readonly" /></td>
                  </tr>



                



                  


              </tbody>
          </table>
       
         <hr>




           <!-- Car Data Table-->       
<!-------->


<hr>


<table class="  table-hover carDataTable" id="permissionsLineTable">
              <thead>
                  <tr>
                      <td>SN.</td>
                      <td>Module</td>
                      <td>Object  </td>
                      <td>Permission</td>
                      <td> # </td>
                  </tr>
              </thead>
              <tbody>

                  <tr>

                  <td>
                    1
                  </td>
                  <td>
                      <select  class="form-control" name="ModuleLine1"  onchange="changeObjectList(this.value, '1')" >
                          <option value="fleet">fleet</option>
                          <option value="IT">IT</option>
                          <option value="HR">HR</option>
                          <option value="GRO">GRO</option>
                          <option value="Workshop">Workshop</option>
                          <option value="ALL">ALL</option>
                      </select>
                  </td>

                  <!--here change select option base on module-->
                  <td>
                      <select name="ObjectLine1"class="form-control" id="ObjectLine1">

                          <option value="Profile_page">Profile [user details] page</option>
                          <option value="Profile_Request">Profile [user details] New Request</option>
                          <option value="Profile_Accident">Profile [user details] Accident</option>

                          <option value="Dashboard">Dashboard</option>

                          <option value="CarsList">Cars List</option>

                          <option value="CarDetails">Car Details</option>
                          <option value="CarDetails_Sale">Car Details[Sale]</option>
                          <option value="CarDetails_Driver">Car Details[Add new Driver]</option>
                          <option value="CarDetails_Accident">Car Details[Add new Accident]</option>
                          <option value="CarDetails_Insurance">Car Details[Add new Insurance]</option>
                          <option value="CarDetails_Receive">Car Details[Receive Car]</option>

                            <option value="CarsAccident">Cars Accident</option>
                            <option value="AccidentDetails"> Accident Details</option> 

                          <option value="Report">Report</option>

                          <option value="RequestsList">Requests List</option>

                          <option value="Users">Users</option>

                          <option value="Settings">Settings</option>

                          <option value="RequestsApproval">Requests Approval</option>

                          <option value="ALL">ALL</option>
                      </select>
                  </td>



                  <td>
                      <select name="PermissionLine1"class="form-control" >
                          <option value="R">Read</option>
                          <option value="E">Edit</option>
                          <option value="A">Add</option>
                          <option value="D">Delete</option>
                          <option value="ALL">ALL</option>
                      </select>
                  </td>

                  <td><i class="fa-solid fa-circle-minus"></i></td>

                  </tr>

                  

              </tbody>
              </table>
<hr>

<a class="btn btn-secondary" id="AddNewRow">Add Row +</a>

<!--------->
<script>
       $(document).ready(function () {
                        let i = 1;
                       
                        $("#AddNewRow").click(function () {

                            i++;
                            $("#permissionsLineTable tr:last").after('<tr id="RowLineNumber'+i+'">' +
                                '<td id="SN'+i+'"> '+i+' </td> ' +

                                '<td>'+
                                ' <select class="form-control" name="ModuleLine'+i+'" onchange="changeObjectList(this.value, '+i+')">'+ 
                                '<option>fleet</option>'+
                                '<option>IT</option>'+
                                '<option>HR</option>'+
                                '<option>GRO</option>'+
                                '<option>Workshop</option>'+
                                ' </select> '+
                                '</td> ' +

                                '<td>'+
                                '<select class="form-control" name="ObjectLine'+i+'" id="ObjectLine'+i+'">'+

                                '<option value="Profile_page">Profile [user details] page</option>'+
                                '<option value="Profile_Request">Profile [user details] New Request</option>'+
                                ' <option value="Profile_Accident">Profile [user details] Accident</option>'+

                                '<option value="Dashboard">Dashboard</option>'+

                                '<option value="CarsList">Cars List</option>'+

                                ' <option value="CarDetails">Car Details</option>'+
                                '<option value="CarDetails_Sale">Car Details[Sale]</option>'+
                                '<option value="CarDetails_Driver">Car Details[Add new Driver]</option>'+
                                '<option value="CarDetails_Accident">Car Details[Add new Accident]</option>'+
                                '<option value="CarDetails_Insurance">Car Details[Add new Insurance]</option>'+
                                ' <option value="CarDetails_Receive">Car Details[Receive Car]</option>'+

                               ' <option value="CarsAccident">Cars Accident</option>'+
                               '<option value="AccidentDetails"> Accident Details</option> '+

                              '<option value="Report">Report</option>'+

                              '<option value="RequestsList">Requests List</option>'+

                             ' <option value="Users">Users</option>'+

                              '<option value="Settings">Settings</option>'+

                              '<option value="RequestsApproval">Requests Approval</option>'+

                              '<option value="ALL">ALL</option>'+

                                '</select>'+
                                '</td> ' +


                                '<td>'+
                                '<select class="form-control" name="PermissionLine'+i+'">'+
                                '<option value="R">Read</option>'+
                                '<option value="E">Edit</option>'+
                                '<option value="A">Add </option>'+
                                '<option value="D">Delete </option>'+
                                '<option value="ALL">ALL</option>'+
                                '</select>'+
                                '</td> ' +
                                '   <td id="deleteLine'+i+'" onclick="DeleteRowLine('+i+')"> <i class="fa-solid fa-circle-minus"></i> </td> ' +
                              
                                '         </tr>');

                                document.getElementById("TotalPermissionLines").value=i;

                        })
                       
                       
                        
                    })
                
</script>
<!--------->


<!------------------------>
<script>
    function changeObjectList(ModuleName, LineNumber)
    {
        if(ModuleName =="fleet")
        {
           $("#ObjectLine"+LineNumber).empty();
           $("#ObjectLine"+LineNumber).append(
            '<option value="Profile_page">Profile [user details] page</option>'+
                                '<option value="Profile_Request">Profile [user details] New Request</option>'+
                                ' <option value="Profile_Accident">Profile [user details] Accident</option>'+

                                '<option value="Dashboard">Dashboard</option>'+

                                '<option value="CarsList">Cars List</option>'+

                                ' <option value="CarDetails">Car Details</option>'+
                                '<option value="CarDetails_Sale">Car Details[Sale]</option>'+
                                '<option value="CarDetails_Driver">Car Details[Add new Driver]</option>'+
                                '<option value="CarDetails_Accident">Car Details[Add new Accident]</option>'+
                                '<option value="CarDetails_Insurance">Car Details[Add new Insurance]</option>'+
                                ' <option value="CarDetails_Receive">Car Details[Receive Car]</option>'+

                               ' <option value="CarsAccident">Cars Accident</option>'+
                               '<option value="AccidentDetails"> Accident Details</option> '+

                              '<option value="Report">Report</option>'+
                              '<option value="RequestsList">Requests List</option>'+
                             ' <option value="Users">Users</option>'+

                              '<option value="Settings">Settings</option>'+

                              '<option value="ALL">ALL</option>');
               
          
          
        }
        else if(ModuleName == "IT")
        {
           $("#ObjectLine"+LineNumber).empty();
           $("#ObjectLine"+LineNumber).append('<option>Assets</option>');
           $("#ObjectLine"+LineNumber).append('<option>Suppliers</option>');
           $("#ObjectLine"+LineNumber).append('<option>Quotations</option>');
           $("#ObjectLine"+LineNumber).append('<option>PO</option>');
           $("#ObjectLine"+LineNumber).append('<option>Requests</option>');
           $("#ObjectLine"+LineNumber).append('<option>Users</option>');
           $("#ObjectLine"+LineNumber).append('<option>Report</option>');
           $("#ObjectLine"+LineNumber).append('<option>Settings</option>');
        }
    }
</script>
<!----------------------->

<!--------------------------------->
<script>
    function DeleteRowLine(lineNo)
    {
       $("#RowLineNumber"+lineNo).remove();
    }
</script>
<!-------------------------------->


<input type="hidden" value="1" name="TotalPermissionLines" id="TotalPermissionLines"/>
<input type="hidden" value="<?=$_SESSION["email"]?>" name="createdby" />
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
