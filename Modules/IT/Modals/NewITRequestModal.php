


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="NewITRequestModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="post" action="controllers/AddNewITRequest.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              <thead>
                  <tr style="background:#000">
                    
                      <td colspan="2"><h5>Add New IT Request</h5></td>
                   
                  
                  </tr>
              </thead>


            

                  <tr>
                     <td class="text-left ">Requester Name</td>
                      <td><input type="text" class="form-control" style="color:brown; font:bolder" readonly name="RequesterName" value="<?=$_SESSION["full_name"]?>"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Requester ID</td>
                      <td>
                          <input type="text" class="form-control" name="RequesterID" value="<?=$_SESSION["id"]?>"  readonly/>
                         
                      </td>
                  </tr>

                  <?php 

                  $sql = "select `badge_number`, `mobile_number`, `department` from `users` where `id` = ".$_SESSION["id"].";";
                  $result2 = $conn->query($sql);
                  $rowU = $result2->fetch_array(MYSQLI_ASSOC)

                  ?>


                  <tr>
                      <td class="text-left ">Department</td>
                      <td>
                          <input type="text" class="form-control" name="department" value="<?=$rowU["department"]?>"/>
                        
                    </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Badge Number</td>
                      <td>
                         
                         <input type="text" class="form-control" name="badge_number" value="<?=$rowU["badge_number"]?>">

                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> Mobile	 </td>
                      <td>
                           <input type="text" name="mobile_number" class="form-control" value="<?=$rowU["mobile_number"]?>" />
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Request Type</td>
                      <td>
                          <select class="form-control" name="RequestType" id="RequestType" >
                              <option>Helpdesk Support</option>
                              <option>Cartridge</option>
                              <option>Desktop PC</option>
                              <option>Laptop</option>
                              <option>Printer</option>
                              <option>Keyboard</option>
                              <option>Mouse</option>
                              <option>Computer Monitor</option>
                              <option>Software</option>
                              
                          </select>
                            
                        </td>
                         
                  </tr>

               

                  <tr>
                      <td class="text-left ">Description</td>
                      <td>
                     
                          <input type="text" class="form-control p-1" name="Description" />
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">Justification</td>
                      <td><input type="text" class="form-control" name="justification"/></td>
                  </tr>


                



                  


              </tbody>
          </table>
       
         <hr>




           <!-- Car Data Table-->       
<!-------->


<hr>
<div class="row p-1">
 
<div class="col-6 text-left">
<input type="submit" value="Send"  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset"  class="btn btn-danger"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
