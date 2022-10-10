<?php require("share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
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
       <h3>Request Details - تفاصيل الطلب</h3>
     
       

       

        
       <?php 
                          $sql = "select * from requestes_for_cars where `id` =".$_GET['id'].";";
                          $result = $conn->query($sql);
                          $row = $result->fetch_array(MYSQLI_ASSOC);
                   ?>



              <hr>


              <!-- Request Case -->
<div class="stepper-wrapper">
      <div class="stepper-item <?php if($row["status"] >=1){echo("completed");} ?>">
        <div class="step-counter">1</div>
        <div class="step-name"> Request Sent <br/>  تم إرسال الطلب</div>
      </div>
      <div class="stepper-item <?php if($row["status"] >=2){echo("completed");} ?>">
      
        <div class="step-counter">2</div>
        <div class="step-name">Transportation Department Approval <br/>   موافقة قسم النقل</div>
      </div>
      <div class="stepper-item <?php if($row["status"] >=4){echo("completed");} ?>">
        <div class="step-counter">3</div>
        <div class="step-name">Request Case Closed <br/>   تم إغلاق الطلب </div>
      </div>
    </div>
<!-- end Request Case -->

         <!-- Car information Table-->
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Request Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" class="form-control" value="<?php echo($_GET['id']); ?>" disabled /></td> 
                  </tr>

                


                  <tr>
                     <td class="text-left ">Request Type - نوع الطلب</td>
                      <td>
                          <select class="form-control">
                              <?php
                              echo("<option>".$row["request_type"]."</option>");
                              ?>
                              <option>New Car - سيارة جديدة</option>
                             
                              <option>Replacement Car - سيارة بديله</option>
                           
                             
                              <option>Car Service -  طلب صيانة</option>
                          </select>
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Name   - أسم الموظف</td>
                      <td><input type="text" class="form-control" value="<?=$row["full_name"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">ID Number  -   رقم الموظف في النظام</td>
                      <td><input type="text" class="form-control" value="<?=$row["user_id"]?>" disabled /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Badge Number  - رقم الموظف</td>
                      <td><input type="text" class="form-control" value="<?=$row["badge_number"]?>"/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Company - الشركة </td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["company"]?>" list="CompanyList"/>
                          <datalist id="CompanyList">
                              <option value="AKH">
                              <option value="NAIZAK">
                              <option value="ISG">    
                              <option value="STARLIGHT">
                              <option value="FARM"> 
                              
                          </datalist>
                     </td>

                  </tr>


                  <tr>
                      <td class="text-left ">Department  - القسم </td>
                      <td><input type="text" class="form-control" value="<?=$row["department"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Report to  - المدير المباشر </td>
                      <td>
                          <input type="text" value="<?=$row["report_to"]?>"  class="form-control"/>
                        </td>
                  </tr>

               

                  <tr>
                      <td class="text-left ">Attachment -  مرفقات  </td>
                      <td>
                      <a href="<?=$row["file_url"]?>" target="_blank" class="btn btn-info m-1" >open</a>
                          <input type="file" class="form-control p-1" />
                      </td>
                  </tr>




                 


                  <tr>
                      <td class="text-left ">E-mail -   البريد البريدالإلكتروني</td>
                      <td><input type="email" class="form-control" value="<?=$row["email"]?>"/></td>
                  </tr>

                    
                  <tr>
                      <td class="text-left ">Mobile -    رقم الجوال</td>
                      <td><input type="text" class="form-control" value="<?=$row["mobile"]?>"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Telphone Ext. -    رقم التحويله</td>
                      <td><input type="text" class="form-control" value="<?=$row["telphone_ext"]?>"/></td>
                  </tr>




                  


                  

                 


                  <tr>
                     <td class="text-left ">Request Date - تاريخ الطلب</td>
                      <td><input type="text" class="form-control" value="<?=$row["request_date"]?>" readonly/></td>
                  </tr>


                  


                  <tr>
                      <td class="text-left ">Request Status - حالة الطلب</td>
                      <td>
                         
                          <input type="text" id="statusList" class="form-control" value="<?=$row["status"]?>" disabled/>
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">response  - الرد </td>
                      <td>
                         
                          <input type="text" id="response" class="form-control" value="<?=$row["transportation_response"]?>" disabled/>
                             
                      </td>
                  </tr>



                  

                  <tr>
                      <td class="text-left ">justification - التبرير</td>
                      <td><input type="text" class="form-control" name="<?=$row["justification"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" class="form-control" value=" <?=$row["note"]?> "/></td>
                  </tr>




                  


              </tbody>
          </table>
       
         <hr>




          

        



         <!--footer of table-->
         <div class="row m-3 ">

         <div class="col-6 center-block text-center">
         <button class="btn bg-success" onclick="ApproveRequest()"> <i class="fa-solid fa-circle-check"></i> Approve</button>
         </div>

         <div class="col-6 center-block text-center">
         <button class="btn bg-danger" onclick="RejectRequest()"> <i class="fa-solid fa-circle-xmark"></i> Reject</button>
         </div>
        
         </div>
         <!------------------->
     <hr>

     <form method="post" action="controllers/ApproveRequest.php" id="ApproveRequestForm">
         <input type="hidden" name="RequestID" value="<?=$_GET["id"]?>"/>
     </form>


     <form method="post" action="controllers/RejectRequest.php" id="RejectRequestForm">
         <input type="hidden" name="RequestID" value="<?=$_GET["id"]?>"/>
     </form>

     <script>
         function ApproveRequest()
         {
            document.getElementById("ApproveRequestForm").submit();
         }
         function RejectRequest()
         {
            document.getElementById("RejectRequestForm").submit();
         }
     </script>


    </div>
<!--Work Space-->
<br/>


<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>