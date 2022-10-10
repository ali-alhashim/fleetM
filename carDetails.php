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
    <script src="frameworks/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Car Details-تفاصيل المركبة</h3>
     
       <hr>

       <div class="subNav">
       <div class="row align-items-center justify-content-center">

    
       <button class="btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#SaleThisCarModal">
            <i class="fa-solid fa-hand-holding-dollar"></i><br/>Sale this car <br/>  بيع المركبة
       </button>  
      


          <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#AddNewCarDriverModal">
             <i class="fa-solid fa-plus "></i><br/>Add New Car Driver <br/>  إضافة مستخدم جديد لــ المركبة
           </button>

           <?php require("Modals/AddNewCarDriverModal.php"); ?>

          <button class=" btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#AddCarAccidentModal">
           <i class="fa-solid fa-car-crash"></i><br/>Accident<br/>  حادث  
          </button>

          <?php require("Modals/AddCarAccidentModal.php"); ?>

          <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#AddCarInsuranceModal">
             <i class="fa-solid fa-shield"></i><br/>   Car insurance <br/>  تأمين السيارة 
          </button>

          <?php require("Modals/AddCarInsuranceModal.php"); ?>

         <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#handoverCarModal">
           <i class="fa-solid fa-arrow-rotate-left"></i><br/>Receive Car From last user <br/>  إستلام المركبة من آخر مستخدم
         </button>

         <?php require("Modals/handoverCarModal.php"); ?>

</div>
       </div>

        

<hr>

<!--Car photo--->

<?php
$sql = "select * from cars where `id` = ".$_GET["id"].";";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<form method="POST" action="controllers/EditCar.php" enctype="multipart/form-data">
<table class="carDataTable">
              <thead>
                  <tr >
                      <td>Front photo</td>
                      <td>Back photo </td>
                      <td>Right photo </td>
                      <td>Left photo </td>
                  </tr>
              </thead>

              <tbody>
              <tr>
                      <td>
                          <img src="<?=$row["image_front_url"]?>"  class=" carPhoto " alt="..." onclick="window.open(this.src, '_blank');" id="imgFrontPhoto" />

                          <input type="file"  name="frontPhoto" id="frontPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgFrontPhoto');" />
                      </td>

                      <td>
                          <img src="<?=$row["image_back_url"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />

                          <input type="file" class="form-control p-1" name="backPhoto"/>
                        </td>

                      <td>
                          <img src="<?=$row["image_right_url"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1" name="rightPhoto"/>
                        </td>

                      <td>
                          <img src="<?=$row["image_left_url"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1" name="leftPhoto"/>
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

                     reader.onload = function(event) 
                     {
                     imgtag.src = event.target.result;
                     };

                      reader.readAsDataURL(selectedFile);
                    }

                    </script>
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td>
                          <input type="text" name="carID" class="form-control" value="<?php echo($_GET['id']); ?>" readonly />
                     </td> 
                  </tr>




                  <tr>
                     <td class="text-left ">Door Number - رقم الباب</td>
                      <td><input type="text" class="form-control" value="<?=$row["door_number"]?>" name="doorNumber"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Model - طراز المركبة</td>
                      <td><input type="text" class="form-control" value="<?=$row["model"]?>" name="model"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Brand - الشركة المصنعة</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["brand"]?>" list="CarsBrands" name="Brand"/>
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
                      <td><input type="number" class="form-control" value="<?=$row["year_make"]?>" name="yearMake"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Plate Number  - رقم اللوحة</td>
                      <td><input type="text" class="form-control" value="<?=$row["plate_number"]?>" name="PlateNumber"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Serial Number : الرقم التسلسلي</td>
                      <td><input type="number" class="form-control"  value="<?=$row["serial_number"]?>" name="SerialNumber"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">VID :  رقم الهيكل</td>
                      <td><input type="text" class="form-control" value="<?=$row["vid"]?>" name="VID"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Color - اللون</td>
                      <td><input type="text" class="form-control" value="<?=$row["car_color"]?>" name="color"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">seats - عدد المقاعد</td>
                      <td><input type="number" class="form-control" value="<?=$row["seats"]?>" name="seats"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Fuel Type - نوع الوقود</td>
                      <td>
                          <input type="text" class="form-control" value="Octane 91" list="FuelTypeList" value="<?=$row["fuel_type"]?>" name="FuelType"/>
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
                      <td class="text-left ">Car Status - حالة المركبة</td>
                      <td>
                        

                          <select id="CarStatusList" class="form-control"  name="CarStatus">
                              <option value="<?=$row["car_status"]?>"><?=$row["car_status"]?></option>
                             <option value="working">working - تعمل</option>
                              <option value="Sold">Sold - مباعة </option>
                              <option value="total loss">total loss - خسارة كلية </option>
                              <option value="stolen"> stolen - مسروقه </option>
                              <option value="exported abroad"> exported abroad - مصدرة بالخارج </option>
                              <option value="under maintenance">under maintenance - تحت الصيانة </option>
                            </select>

                     </td> 
                  </tr>



                  <tr>
                      <td class="text-left ">Inspection Expiration - تاريخ إنتهاء الفحص</td>
                      <td><input type="date" class="form-control"  value="<?=$row["inspection_expiration"]?>" name="InspectionExpiration"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Odometer -   ممشى المركبة</td>
                      <td><input type="text" class="form-control"  value="<?=$row["odometer"]?>" name="Odometer"/></td>
                  </tr>
                   
                  


                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>" name="Note"/></td>
                  </tr>




                  


              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->



         <!--Car License Registration-->

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car License Registration - رخصة التسجيل</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Registration License expiration - تاريخ إنتهاء رخصة السير</td>
                      <td class="w-50"><input type="date" class="form-control" value="<?=$row["registration_expiration"]?>"  name="LicenseExpiration"/></td> 
                  </tr>


                  <tr>
                      <td class="text-left">Registration License Soft Copy - نسخة إلكترونية من رخصة التسجيل</td>
                      <td class="w-50">
                      
                      
                      <a href="<?=$row["registration_url"]?>" target="_blank" class="btn btn-info m-1" >open</a>
                    
                     
                     
                    
                     
                      <input type="file" class="form-control p-1" name="LicenseSoftCopy">
                      
                      
                     
                      </td> 
                  </tr>

              </tbody>
         </table>


         <!---Car Accessories--->
         <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Accessories - اكسسوارات المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left"> GPS. Tracking - جهاز تعقب</td>
                      <td class="w-50"><input type="checkbox" class="form-control" value="1" name="GPS"   <?php if($row["gps_tracking"] =="1")echo("checked");?>/></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Fuel Chip - شريحة وقود</td>
                      <td class="w-50"><input type="checkbox" class="form-control" value="1" name="FuelChip" <?php if($row["fuel_chip"] =="1")echo("checked");?>/></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Accessories-->


            <!---Car Value--->
            <hr>
         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Car Value - قيمة المركبة</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left">Purchased Date - تاريخ الشراء </td>
                      <td class="w-50"><input type="date" class="form-control" name="PurchasedDate"  value="<?=$row["purchased_date"]?>" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Purchased Amount - قيمة الشراء </td>
                      <td class="w-50"><input type="text" class="form-control" name="PurchasedAmount"    value="<?=$row["purchased_price"]?>"/></td> 
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
                      <td class="w-50"><input type="text" class="form-control"  value="<?=$row["owner_name"]?>" name="OwnerName" /></td> 
                  </tr>

                  <tr>
                      <td class="text-left"> Owner ID -  رقم هوية المالك </td>
                      <td class="w-50"><input type="text" class="form-control"   value="<?=$row["owner_id"]?>" name="OwnerID"/></td> 
                  </tr>

              </tbody>
         </table>
         <!---end Car Owner-->

        

            <!---Car Users--->
            <hr>


            <div class="row m-3">

<div class="col-6 text-left">


</div>

<div class="col-6 text-right">
  

</div>


</div>


         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="8"><h5>Car Users -  مستخدمون المركبة </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>ID</td>
                     
                      <td>Name - الأسم</td>
                      <td>Mobile Number - رقم الجوال</td>
                      <td>Project - المشروع</td>
                      <td>Received Date - تاريخ الإستلام</td>
                      <td>Return Date - تاريخ التسليم</td> 
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php

              $sql = "select `driver_id`, `driver_name`, `mobile_number`, `project`, `received_date`,`handover_date`, `id`  
                      from `car_users` where `car_id`=".$_GET["id"]." order by `received_date` DESC;";
              $result = $conn->query($sql);

              while($row1 = $result->fetch_array(MYSQLI_ASSOC))
              {
                  echo("<tr>");
                  echo('<td><a href="UserDetails.php?id='.$row1["driver_id"].'" class="btn btn-info"> '.$row1["driver_id"].'</a>  </td>');
                
                 echo("<td>".$row1["driver_name"]."</td>");
            
                 echo("<td>".$row1["mobile_number"]."</td>");

                
             
                echo("<td>".$row1["project"]."</td>");

                echo("<td>".$row1["received_date"]."</td>");
               
                echo("<td>".$row1["handover_date"]."</td>");
             
            
                echo('<td> <a href="CarUserDetails.php?id='.$row1["id"].'" class="btn btn-secondary">open [ '.$row1["id"].' ]</a> </td>');
            

             echo("</tr>");
              }
                

                 ?>


              </tbody>
         </table>
         <hr>
         <!---end Car users-->

<br/>

         <!--Car Accident-->


         <div class="row">
             <div class="col-6 text-left">
            
             </div>
             <div class="col-6 text-right">
           
             </div>
         </div>
        

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="9"><h5>Car Accident -  حوادث المركبة </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>ID</td>
                      <td>Date</td>
                      <td>Driver Name <br/> أسم السائق</td>
                      <td>Mistake Percentage<br/> نسبة الخطأ</td>
                      <td>Second Party Mistake Percentage <br/>الطرف الثاني نسبة الخطأ</td>
                      <td>Location <br/> الموقع</td>
                      <td>Accident Number <br/> رقم الحادث</td>
                      <td> Status <br/> حالة الحادث</td> 
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php
                $sql = "select `id`, `accident_date`, `driver_name`, `mistake_percentage`, 
                        `mistake_percentage_second_party`, `location`, `accident_number`,`progress_level`, `attachment`
                         from `car_accident` where `car_id` =".$_GET["id"];

                $result = $conn->query($sql);
                while($row2 = $result->fetch_array(MYSQLI_ASSOC))
                {
                   echo("<tr>");
                   echo('<td><a href="AccidentDetails.php?id='.$row2["id"].'" class="btn btn-info"> '.$row2["id"].'</a></td>');
                   echo("<td>".$row2["accident_date"]."</td>");
                   echo("<td>".$row2["driver_name"]."</td>");
                   echo("<td>".$row2["mistake_percentage"]."</td>");
                   echo("<td>".$row2["mistake_percentage_second_party"]."</td>");
                   echo("<td>".$row2["location"]."</td>");
                   echo("<td>".$row2["accident_number"]."</td>");
                   echo("<td>".$row2["progress_level"]."</td>");
                   echo("<td><a class='btn btn-secondary' href='".$row2["attachment"]."' >open<a/></td>");
                   echo("</tr>");
                }        
              ?>


               
                
             


              </tbody>
         </table>

         <!---->
         <hr>


         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="10"><h5>Car insurance -   تأمين السيارة </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>ID</td>
                      <td>Company Name</td>
                      <td>Policy Number <br/> رقم الوثيقة</td>
                      <td>Insurance coverage<br/>  تغطية التأمين</td>
                      <td>Second Party Amount <br/>مبلغ التحمل</td>
                      <td>Insurance Area <br/> تغطية التأمين الجغرافية</td>
                      <td>Start Date <br/> تاريخ بداية التأمين </td>
                      <td>Expiration Date <br/> تاريخ الإنتهاء </td>
                      <td>Note <br/>  ملاحظات</td> 
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php
               
               $sql = "select `id`,`company_name`,`policy_number`,`insurance_class`, `excess_amount`,`insurance_area`, `insurance_start`,   `insurance_expiration`,`note`, `document_url`      from `insurance` where `car_id` =".$_GET['id'].";";
               $result = $conn->query($sql);
               while($row3 = $result->fetch_array(MYSQLI_ASSOC))
               {
                  echo("<tr>");
                  echo('<td> <a href="InsuranceDetails.php?id='.$row3["id"].'" class="btn btn-info"> '.$row3["id"].'</a></td>');
                  echo("<td>".$row3["company_name"]."</td>");
                  echo("<td>".$row3["policy_number"]."</td>");
                  echo("<td>".$row3["insurance_class"]."</td>");
                  echo("<td>".$row3["excess_amount"]."</td>");
                  echo("<td>".$row3["insurance_area"]."</td>");
                  echo("<td>".$row3["insurance_start"]."</td>");
                  echo("<td>".$row3["insurance_expiration"]."</td>");
                  echo("<td>".$row3["note"]."</td>");
                  echo('<td>  <a target="_blank" href="'.$row3["document_url"].'" class="btn btn-secondary">open</a>  </td>');
                  echo("</tr>");
               }
              ?>
                
              
               
                
                 
              

                 

                
                
               


              </tbody>
         </table>



         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">

             <a class="btn btn-secondary m-1" href="print/printCarDetails.php?id=<?=$_GET["id"]?>"><i class="fa-solid fa-print"></i> <br/>Print <br/> طباعة</a>
             
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update <br/> تعديل</button>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->
            </form>
            <?php require("Modals/SaleThisCarModal.php"); ?>

<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>