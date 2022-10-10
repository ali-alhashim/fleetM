<?php require("../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>IT Request Details </h3>
     
       

       

        
       <?php 
                          $sql = "select * from `it_requests` where `id` =".$_GET['id'].";";
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
        <div class="step-name">IT Department Approval </div>
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
                     <td class="text-left ">Request Type   </td>
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
                      <td class="text-left ">Name     </td>
                      <td><input type="text" class="form-control" value="<?=$row["requester_name"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Requester Id      </td>
                      <td><input type="text" class="form-control" value="<?=$row["requester_id"]?>" disabled /></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Badge Number  </td>
                      <td><input type="text" class="form-control" value="<?=$row["badge_number"]?>"/></td>
                  </tr>



               


                  <tr>
                      <td class="text-left ">Department   </td>
                      <td><input type="text" class="form-control" value="<?=$row["department"]?>"/></td>
                  </tr>


                

               

               




                 


                  

                    
                  <tr>
                      <td class="text-left ">Mobile</td>
                      <td><input type="text" class="form-control" value="<?=$row["mobile"]?>"/></td>
                  </tr>

                




                  


                  

                 


                  <tr>
                     <td class="text-left ">Request Date  </td>
                      <td><input type="text" class="form-control" value="<?=$row["creation_date"]?>" /></td>
                  </tr>


                  


                  <tr>
                      <td class="text-left "> Status </td>
                      <td>
                         
                          <input type="text" id="statusList" class="form-control" value="<?=$row["status"]?>" />
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">Response</td>
                      <td>
                         
                          <input type="text" id="response" class="form-control" value="<?=$row["response"]?>" />
                             
                      </td>
                  </tr>

                  <tr>
                      <td class="text-left ">Description </td>
                      <td><input type="text" class="form-control" value="<?=$row["description"]?>"/></td>
                  </tr>

                  

                  <tr>
                      <td class="text-left ">Justification </td>
                      <td><input type="text" class="form-control" value="<?=$row["justification"]?>"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Response Note </td>
                      <td><input type="text" class="form-control" value=" <?=$row["response_note"]?> " id="response_noteS" /></td>
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
         <input type="hidden" name="response_note" id="response_noteH"/>
     </form>


     <form method="post" action="controllers/RejectRequest.php" id="RejectRequestForm">
         <input type="hidden" name="RequestID" value="<?=$_GET["id"]?>"/>
     </form>

     <script>
         function ApproveRequest()
         {
            document.getElementById("response_noteH").value = document.getElementById("response_noteS").value;
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


<script src="../../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>