<?php require("share/session.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Accident Details-تفاصيل الحادث</h3>
     
       <hr>

       <div class="subNav">

       <?php 
         $sql = "select * from `car_accident` where `id` =".$_GET["id"].";";
         $result = $conn->query($sql);
         $row = $result ->fetch_array(MYSQLI_ASSOC);
       ?>
      

<!-- Accident Case -->
<div class="stepper-wrapper">
      <div class="stepper-item <?php if($row["progress_level"] >= 1) echo("completed"); ?>">
        <div class="step-counter">1</div>
        <div class="step-name">Damage assessment <br/> تقدير الأضرار</div>
      </div>
      <div class="stepper-item <?php if($row["progress_level"] >= 2) echo("completed"); ?>">
        <div class="step-counter">2</div>
        <div class="step-name">Insurance Claim <br/> رفع مطالبة إلى شركة التأمين</div>
      </div>
      <div class="stepper-item <?php if($row["progress_level"] >= 3) echo("completed"); ?>">
        <div class="step-counter">3</div>
        <div class="step-name">Car Repair <br/> المركبة في الإصلاح</div>
      </div>
      <div class="stepper-item <?php if($row["progress_level"] >= 4) echo("completed"); ?>">
        <div class="step-counter">4</div>
        <div class="step-name">Case Closed <br/>  ملف الحادث مغلق</div>
      </div>
    </div>
<!-- end Accident Case -->

      
       </div>

        

<hr>

<!--Car photo--->
<table class="carDataTable">
              <thead>
                  <tr >
                      <td>Accident photo 1</td>
                      <td>Accident photo 2</td>
                      <td>Accident photo 3</td>
                      <td>Accident photo 4</td>
                  </tr>
              </thead>

              <tbody>
              <tr>
                      <td>
                          <img src="<?=$row["accident_photo_1"]?>" class=" carPhoto " alt="..." onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1">
                      </td>

                      <td>
                          <img src="<?=$row["accident_photo_2"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1">
                        </td>

                      <td>
                          <img src="<?=$row["accident_photo_3"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1">
                        </td>

                      <td>
                          <img src="<?=$row["accident_photo_3"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1">
                        </td>
                  </tr>
                  </tbody>
              </table>
              <hr>



              <!------->
              <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Accident Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" class="form-control" value="<?php echo($_GET['id']); ?>" readonly /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Date</td>
                      <td><input type="date" class="form-control" value="<?=$row["accident_date"]?>"  /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Accident Number - رقم الحادث</td>
                      <td><input type="text" class="form-control" value="<?=$row["accident_number"]?>"  /></td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Insurance Company Name -  اسم شركة التأمين</td>
                      <td><input type="text" class="form-control" value="<?=$row["insurance_company_name"]?>"  /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance policy number - رقم وثيقة التأمين</td>
                      <td><input type="text" class="form-control" value="<?=$row["insurance_policy_number"]?>"  /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Mistake percentage -   نسبة الخطأ</td>
                      <td><input type="text" class="form-control " value="<?=$row["mistake_percentage"]?>"  /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Mistake percentage second party-  الطرف الثاني نسبة الخطأ</td>
                      <td><input type="text" class="form-control" value="<?=$row["mistake_percentage_second_party"]?>"  /></td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Plate Number  second party- الطرف الثاني رقم اللوحة</td>
                      <td><input type="text" class="form-control" value="<?=$row["plate_number_second_party"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance Company Name for second party- الطرف الثاني اسم شركة التأمين</td>
                      <td><input type="text" class="form-control" value="<?=$row["insurance_company_name_for_second_party"]?>"  /></td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Claim Number-     رقم المطالبة</td>
                      <td><input type="text" class="form-control" value="<?=$row["claim_number"]?>"  /></td> 
                  </tr>

                  <tr>
                      <td class="text-left ">Claim status-     حالة المطالبة</td>
                      <td><input type="text" class="form-control" value="<?=$row["claim_status"]?>"  /></td> 
                  </tr>

                  

                  <tr>
                      <td class="text-left ">Accident Status  -    حالة ملف الحادث</td>
                      <td>
                          <select class="form-control" >
                          <option value="<?=$row["progress_level"]?>"> <?=$row["progress_level"]?>  </option>

                              <option value="1">Damage assessment  (1) - تقدير الأضرار  </option>
                             
                              <option value="2">Insurance Claim (2) - رفع مطالبة إلى شركة التأمين</option>
                              <option value="3">Car Repair (3) - المركبة في الإصلاح</option>
                              <option value="4">Case Closed (4) - ملف الحادث مغلق</option>
                          </select>
                      </td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Attachment- المرفقات</td>
                      <td>
                          <a href="<?=$row["attachment"]?>" class="btn btn-info m-1">open</a>
                          <input type="file" class="form-control p-1" value="DSA 1854"/>

                        </td>
                  </tr>


</tbody>
</table>
<hr>
              <!------->

         <!-- Car information Table-->
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" class="form-control" value="<?=$row["car_id"]?>" readonly /></td> 
                  </tr>

                         
                  <?php 
                       $sql = "select * from `cars` where `id` =".$row["car_id"].";";
                       $result = $conn->query($sql);
                       $row2 = $result ->fetch_array(MYSQLI_ASSOC);
                  ?>


                  <tr>
                     <td class="text-left ">Door Number - رقم الباب</td>
                      <td><input type="text" class="form-control" value="<?=$row2["door_number"]?>"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Model - طراز المركبة</td>
                      <td><input type="text" class="form-control" value="<?=$row2["model"]?>"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Brand - الشركة المصنعة</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row2["brand"]?>" list="CarsBrands"/>
                          <datalist id="CarsBrands">
                              <option value="Toyota">
                              <option value="GMC">
                              <option value="chevrolet">    
                              <option value="Honda">
                              <option value="Chrysler"> 
                              <option value="Dodge"> 
                              <option value="Ford"> 
                              <option value="Genesis"> 
                              <option value="Hyundai"> 
                              <option value="Infiniti"> 
                              <option value="Jeep"> 
                              <option value="Land Rover">
                              <option value="Lexus"> 
                              <option value="Lincoln"> 
                              <option value="Maserati"> 
                              <option value="Mazda"> 
                              <option value="Mercedes-Benz"> 
                              <option value="Mitsubishi"> 
                              <option value="Nissan"> 
                              <option value="Porsche"> 
                              <option value="Ram"> 
                              <option value="Suzuki"> 
                              <option value="KIA">
                              <option value="Isusu">
                          </datalist>
                     </td>

                  </tr>


                  <tr>
                      <td class="text-left ">Year Of Make  - سنة الصنع</td>
                      <td><input type="number" class="form-control" value="<?=$row2["year_make"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Plate Number  - رقم اللوحة</td>
                      <td><input type="text" class="form-control" value="<?=$row2["plate_number"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Serial Number : الرقم التسلسلي</td>
                      <td><input type="number" class="form-control" value="<?=$row2["serial_number"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">VID :  رقم الهيكل</td>
                      <td><input type="text" class="form-control" value="<?=$row2["vid"]?>"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Color - اللون</td>
                      <td><input type="text" class="form-control" value="<?=$row2["car_color"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">seats - عدد المقاعد</td>
                      <td><input type="number" class="form-control" value="<?=$row2["seats"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Fuel Type - نوع الوقود</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row2["fuel_type"]?>" list="FuelTypeList"/>
                          <datalist id="FuelTypeList">
                              <option value="Octane 91">
                              <option value="Octane 95">  
                              <option value="Diesel">
                              <option value="Hybrid">  
                              <option value="Hydrogen">
                              <option value="Electric">     
                          </datalist>
                      </td>
                  </tr>



                  <tr>
                      <td class="text-left ">Car Status -  حالة المركبة بعد الحادث</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["car_accident_status"]?>"  list="CarStatusList"/>

                          <datalist id="CarStatusList">
                              <option value="Very Good 100%">
                              <option value="Good 80%">
                              <option value="Working 60%">
                              <option value="Under Maintenance">
                              <option value="Sold">
                              <option value="Damage 0%">
                          </datalist>

                     </td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>"/></td>
                  </tr>




                  


              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->



      


            <!---Car Value--->
            <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Repair Value - قيمة الإصلاح</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                

                  <tr>
                      <td class="text-left"> Repair Amount - قيمة الإصلاح </td>
                      <td class="w-50"><input type="text" class="form-control"   value="<?=$row["repair_amount"]?>"/></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Value-->



           <!---Car Owner--->
           <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Owner -  مالك المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Owner Name -  أسم المالك </td>
                      <td class="w-50"><input type="text" class="form-control"  value="<?=$row2["owner_name"]?>" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Owner ID -  رقم هوية المالك </td>
                      <td class="w-50"><input type="text" class="form-control"   value="<?=$row2["owner_id"]?>"/></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Owner-->



          
            <hr>


              <!---Car Owner--->
           <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Driver -  سائق  المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                   <tr>
                      <td class="text-left">Driver ID -  رقم السائق في النظام  </td>
                      <td class="w-50"><input type="text" class="form-control"  value="<?=$row["driver_id"]?>" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left">Driver Name -  أسم السائق </td>
                      <td class="w-50"><input type="text" class="form-control"  value="<?=$row["driver_name"]?>" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Driver Gov ID -  رقم هوية المالك </td>
                      <td class="w-50"><input type="text" class="form-control"   value="<?=$row["driver_gov_id"]?>"/></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Owner-->


           
          

       

         <!---->
         <hr>



         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
             <button class="btn btn-secondary m-1"><i class="fa-solid fa-print"></i> <br/>Print <br/> طباعة</button>
            
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update <br/> حفظ</button>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->


<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>