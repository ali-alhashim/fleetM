


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="AddCarAccidentModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/AddCarAccident.php" enctype="multipart/form-data">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">


   <thead>
                  <tr >
                      <td>Accident photo 1</td>
                      <td>Accident photo 2 </td>
                      <td>Accident photo 3 </td>
                      <td>Accident photo 4 </td>
                  </tr>
              </thead>

              <tbody>
              <tr>
                      <td>
                          <img  class=" carPhoto " alt="..." onclick="window.open(this.src, '_blank');" id="imgFrontPhoto"  height="100px"/>
                          <input type="file" id="frontPhoto" name="AccidentPhoto1" class="form-control p-1" onchange="onFileSelected(event, 'imgFrontPhoto')">
                      </td>

                      
                   

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgBackPhoto" height="100px"/>
                          <input type="file" id="backPhoto" name="AccidentPhoto2" class="form-control p-1" onchange="onFileSelected(event, 'imgBackPhoto')">
                        </td>

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgRightPhoto"  height="100px"/>
                          <input type="file" id="rightPhoto" name="AccidentPhoto3" class="form-control p-1" onchange="onFileSelected(event, 'imgRightPhoto')">
                        </td>

                      <td>
                          <img src="" class="carPhoto " onclick="window.open(this.src, '_blank');" id="imgLeftPhoto"  height="100px"/>
                          <input type="file" id="leftPhoto" name="AccidentPhoto4" class="form-control p-1" onchange="onFileSelected(event, 'imgLeftPhoto')">
                        </td>
                  </tr>
                  </tbody>
              </table>
              <hr>

         <!-- Car information Table-->



                    <script>
                    function onFileSelected(event, imgID) {
                     var selectedFile = event.target.files[0];
                     var reader = new FileReader();

                     var imgtag = document.getElementById(imgID);
                     imgtag.title = selectedFile.name;

                     reader.onload = function(event) {
                     imgtag.src = event.target.result;
                      };

                      reader.readAsDataURL(selectedFile);
                    }

                    </script>



<table class="carDataTable ">
              <thead>
                 
              </thead>
              <tbody>

              




                  <tr>
                     <td class="text-left ">Car ID -   ??????  ??????????????</td>
                      <td><input type="text" name="CarID" class="form-control" value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Accident Date  -   ??????????  ????????????</td>
                      <td><input type="date" name="AccidentDate" class="form-control" /></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Accident Number - ?????? ????????????</td>
                      <td><input type="text" class="form-control"  name="AccidentNumber" /></td> 

                  </tr>


                  <tr>
                      <td class="text-left ">Driver Name -  ?????? ????????????</td>
                      <td>
                          <input type="text" class="form-control"  name="DriverName" list="DriversNameList" />
                      </td> 

                      <datalist id="DriversNameList">
                        <option id="driverID here"> Driver Names here
                      </datalist>

                  </tr>

                  <input type="hidden" name="driverID" id="driverID" value="0" />


                  <tr>
                      <td class="text-left ">Driver  GOV ID - ?????? ????????????</td>
                      <td><input type="text" class="form-control"  name="DriverGOVID" /></td> 

                  </tr>


                  <tr>
                      <td class="text-left ">Driver  Mobile - ?????? ????????????</td>
                      <td><input type="text" class="form-control"  name="DriverMobile" /></td> 

                  </tr>



                  <tr>
                      <td class="text-left ">Insurance Company Name -  ?????? ???????? ??????????????</td>
                      <td><input type="text" class="form-control"  name="InsuranceCompanyName" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Insurance ID -    ?????? ?????????????? ???? ????????????</td>
                      <td><input type="text" class="form-control"  name="InsuranceID" /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance policy number - ?????? ?????????? ??????????????</td>
                      <td><input type="text" class="form-control" name="policyNumber"  /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Mistake percentage -   ???????? ??????????</td>
                      <td><input type="text" class="form-control "  name="MistakePercentage" /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Mistake percentage second party-  ?????????? ???????????? ???????? ??????????</td>
                      <td><input type="text" class="form-control"   name="MistakePercentageSecondParty"/></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Plate Number  second party- ?????????? ???????????? ?????? ????????????</td>
                      <td><input type="text" class="form-control" name="PlateNumberSecondParty"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance Company Name for second party- ?????????? ???????????? ?????? ???????? ??????????????</td>
                      <td><input type="text" class="form-control"   name="InsuranceSecondParty"/></td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Claim Number -     ?????? ????????????????</td>
                      <td><input type="text" class="form-control" name="ClaimNumber"  /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Claim status -     ???????? ????????????????</td>
                      <td><input type="text" class="form-control"  name="ClaimStatus" /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Repir Amount -      ???????? ??????????????</td>
                      <td><input type="text" class="form-control"  name="RepirAmount" /></td> 
                  </tr>

                  

                  <tr>
                      <td class="text-left ">Location -      ????????  ????????????</td>
                      <td><input type="text" class="form-control"  name="location" /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Accident Status  -    ???????? ?????? ????????????</td>
                      <td>
                          <select class="form-control" name="progressLevel" >
                          <option value="0">No Action yet -  ???? ???????? ???? ????????  </option>
                              <option value="1">Damage assessment  (1) - ?????????? ??????????????  </option>
                             
                              <option value="2">Insurance Claim (2) - ?????? ???????????? ?????? ???????? ??????????????</option>
                              <option value="3">Car Repair (3) - ?????????????? ???? ??????????????</option>
                              <option value="4">Case Closed (4) - ?????? ???????????? ????????</option>
                          </select>
                      </td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Attachment- ????????????????</td>
                      <td>
                         
                          <input type="file" class="form-control p-1" name="Attachment"/>

                        </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Car Status After Accident- ???????? ?????????????? ?????? ????????????</td>
                      <td>
                         

                          <select id="CarStatusList" name="CarStatus" class="form-control">
                              <option value="working">working - ????????</option>
                              <option value="Sold">Sold - ?????????? </option>
                              <option value="total loss">total loss - ?????????? ???????? </option>
                              <option value="stolen"> stolen - ???????????? </option>
                              <option value="exported abroad"> exported abroad - ?????????? ?????????????? </option>
                              <option value="under maintenance">under maintenance - ?????? ?????????????? </option>
                           </select>

                     </td> 
                  </tr>



               


                  <tr>
                      <td class="text-left ">Note  -       ??????????????</td>
                      <td><input type="text" class="form-control"  name="note" /></td> 
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
<input type="submit" value="SAVE - ??????"  class="btn btn-success"/>
</div>


<div class="col-6 text-right">
<input type="reset" value="Reset - ?????????? ???????? ????????????"  class="btn btn-danger"/>
</div>

</div>
</form>
    </div><!--End Modal content -->
  </div>  <!-- end Modal Dialog -->
</div> <!-- end Modal -->
