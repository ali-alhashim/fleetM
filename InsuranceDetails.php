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
       <h3>Insurance  Details - تفاصيل التأمين</h3>
     
       

      

        




              <hr>

         <!-- Car information Table-->
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Insurance Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" class="form-control" value="<?php echo($_GET['id']); ?>" readonly /></td> 
                  </tr>


                  <?php
                  $sql = "select * from `insurance` where `id` =".$_GET['id'].";";
                  $result = $conn->query($sql);
                  $row = $result->fetch_array(MYSQLI_ASSOC);
                  ?>

                  <tr>
                     <td class="text-left ">Company Name -  أسم الشركة</td>
                      <td><input type="text" class="form-control" value="<?=$row["company_name"]?>"/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">Policy Number -  رقم الوثيقة</td>
                      <td><input type="text" class="form-control" value="<?=$row["policy_number"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance coverage  - تغطية التأمين</td>
                      <td>
                          <select  class="form-control" >
                              <option value="<?=$row["insurance_class"]?>"><?=$row["insurance_class"]?></option>
                              <option value="Comprehensive">Comprehensive - شامل</option>
                              <option value="Third Party Insurance">Third Party Insurance - تأمين ضد الغير</option>
                          </select>
                        </td>
                  </tr>



                


                  <tr>
                      <td class="text-left ">Second Party Amount  - مبلغ التحمل </td>
                      <td><input type="text" class="form-control" value="<?=$row["excess_amount"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insurance Area  - تغطية التأمين الجغرافية </td>
                      <td>
                          <select class="form-control">
                          <option value="<?=$row["insurance_area"]?>"><?=$row["insurance_area"]?></option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="GCC">GCC</option>
                          </select>
                        </td>
                  </tr>

               

                  <tr>
                      <td class="text-left ">Insurance Soft Copy - صورة من  وثيقة التأمين</td>
                      <td>
                      <a href="<?=$row["document_url"]?>" target="_blank" class="btn btn-info m-1" >open</a>
                          <input type="file" class="form-control p-1" />
                      </td>
                  </tr>


                 


                  <tr>
                     <td class="text-left ">Star Date - تاريخ البداء</td>
                      <td><input type="date" class="form-control" value="<?=$row["insurance_start"]?>" /></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Expiration Date - تاريخ الإنتهاء</td>
                      <td><input type="date" class="form-control" value="<?=$row["insurance_expiration"]?>" /></td>
                  </tr>


                 


                

                  <tr>
                      <td class="text-left ">Insured Value -    القيمة المقدرة للمركبة</td>
                      <td><input type="text" class="form-control" value="<?=$row["insured_value"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Type of repair -      نوع الإصلاح</td>
                      <td>
                          <select class="form-control">
                          <option value="<?=$row["type_repair"]?>"><?=$row["type_repair"]?></option>
                              <option value="Agency">Agency - وكالة</option>
                              <option value="Workshop">Workshop - ورش</option>
                          </select>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Insure car accessories -    تأمين ملحقات المركبة</td>
                      <td><input type="checkbox" class="form-control"  <?php if($row["insure_car_accessories"] ==1)echo("checked"); ?>/></td>
                  </tr>


                 


                  <tr>
                      <td class="text-left ">Car ID - رقم المركبة في النظام</td>
                      <td>
                          <a  class="btn btn-info w-100" href="carDetails.php?id=<?=$row["car_id"]?>"><?=$row["car_id"]?></a>
                    </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Amount - قيمة التأمين</td>
                      <td><input type="text" class="form-control" value="<?=$row["insurance_amount"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>"/></td>
                  </tr>


                  




                  


              </tbody>
          </table>
       
         <hr>




        


       



         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
             <button class="btn btn-secondary m-1"><i class="fa-solid fa-print"></i> <br/>Print <br/> طباعة</button>
            
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update <br/> تعديل</button>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>

<!--Work Space-->
</br>


<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>