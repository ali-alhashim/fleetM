


<div class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="SaleThisCarModal">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
     

<!-------->
<!--Car photo--->
<form method="POST" action="controllers/SaleThisCar.php">


   <!-- Car information Table-->
         
        
   <table class="carDataTable ">
              
              <tbody>

              

                    <tr>
                     <td class="text-left ">Car ID -  رقم المركبة في النظام</td>
                      <td><input type="text" class="form-control"  name="carID" value="<?=$_GET["id"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">VID - رقم الهيكل </td>
                      <td><input type="text" class="form-control"  name="vid" value="<?=$row["vid"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">serial number -  الرقم التسلسلي </td>
                      <td><input type="text" class="form-control"  name="serial_number" value="<?=$row["serial_number"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Door number - رقم الباب </td>
                      <td><input type="text" class="form-control"  name="door_number" value="<?=$row["door_number"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Plate Number - رقم اللوحة </td>
                      <td><input type="text" class="form-control"  name="plate_number" value="<?=$row["plate_number"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left "> Brand -  الماركه </td>
                      <td><input type="text" class="form-control"  name="brand" value="<?=$row["brand"]?>" readonly/></td>
                  </tr>



                    <tr>
                     <td class="text-left "> Model -  المديل </td>
                      <td><input type="text" class="form-control"  name="model" value="<?=$row["model"]?>" readonly/></td>
                  </tr>


                  <tr>
                     <td class="text-left "> year of make -  سنة الصنع </td>
                      <td><input type="text" class="form-control"  name="year_make" value="<?=$row["year_make"]?>" readonly/></td>
                  </tr>


                  <tr>
                     <td class="text-left "> odometer -   ممشى المركبة </td>
                      <td><input type="text" class="form-control"  name="odometer" value="<?=$row["odometer"]?>" /></td>
                  </tr>

                  <tr>
                     <td class="text-left "> owner name -    أسم المالك الحالي </td>
                      <td><input type="text" class="form-control"  name="owner_name" value="<?=$row["owner_name"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left "> owner ID -    رقم المالك الحالي </td>
                      <td><input type="text" class="form-control"  name="owner_id" value="<?=$row["owner_id"]?>" readonly/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">new owner name -      أسم المشتري </td>
                      <td><input type="text" class="form-control"  name="new_owner_name" value="" /></td>
                  </tr>
                  

                  <tr>
                     <td class="text-left ">new owner id -      رقم المشتري </td>
                      <td><input type="text" class="form-control"  name="new_owner_id" value="" /></td>
                  </tr>

                  <tr>
                     <td class="text-left ">new owner mobile -      رقم جوال المشتري </td>
                      <td><input type="text" class="form-control"  name="new_owner_mobile" value="+966" /></td>
                  </tr>

                  <tr>
                     <td class="text-left ">ownership transfer status -        حالة نقل الملكية </td>
                      <td>
                        <select  class="form-control"  name="ownership_transfer_status">
                          <option>Payment Received</option>
                          <option>Cancelled</option>
                          <option>Done</option>
                        </select>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">sold price - سعر البيع</td>
                      <td><input type="text" class="form-control" name="sold_price"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">sold date -  تاريخ البيع</td>
                      <td><input type="date" class="form-control" name="sold_date"/></td>
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
