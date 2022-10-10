<?php require("../../share/session.php"); ?>



<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";

$permissionResult = "invalid";
$permissionType = "";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Profile_page" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    $permissionType ="readonly";
    break;
   }

   if($row["object"] =="Profile_page" && $row["permission"] =="ALL")
   {
    $permissionResult = "valid";
    $permissionType ="edit";
    break;
   }


   if($row["object"] =="Profile_page" && $row["permission"] =="E")
   {
    $permissionResult = "valid";
    $permissionType ="edit";
    break;
   }


   if($row["object"] =="ALL" && $row["permission"] =="ALL")
   {
    $permissionResult = "valid";
    $permissionType = "full";
    break;
   }
}
//-------------------------------------------

$disabledInput = "disabled";

if($permissionType == "full" || $permissionType == "edit")
{
  // you can edit profile
  $disabledInput = " ";
}


// here to check you can read others profile users
if($_GET["id"]!=$_SESSION["id"])
{
    while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Users" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="ALL" && $row["permission"] =="ALL")
   {
    $permissionResult = "valid";
    break;
   }
   
   else
   {
    $permissionResult = "invalid";  
   }
}
}

//--------------------------------------------------

if($permissionResult == "invalid")
{
    header("location: profile.php?id=".$_SESSION["id"]);
}
?>


<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="../../frameworks/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

                        <?php 
                          $sql = "select * from users where `id` =".$_GET['id'].";";
                          $result = $conn->query($sql);
                          $rowz = $result->fetch_array(MYSQLI_ASSOC);
                         ?>




<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">


    <!------------------------>   
<section>
  <div class="container py-5">
    <div class="row">
      <div class="col">
       
      </div>
    </div>

    <div class="row">

      <div class="col-lg-4">
        <div class="card ">
          <div class="card-body text-center">

            <img src="../../<?=$rowz["profile_photo"]?>" alt="avatar" class="rounded-circle img-fluid bg-dark" style="width: 150px;" id="photoAvtar">
            <hr>

            <form action="../../controllers/uploadProfilePhoto.php" method="post" enctype="multipart/form-data" id="profileFormID">

            <input type="file" class="text-center center-block file-upload btn-primary"  id="ProfilePhoto" name="ProfilePhoto" onchange="form.submit()">

            <input type="hidden" value="<?=$rowz["id"]?>" name="userID"/>

            </form>

                          
                  


            <h5 class="my-3"><?=$rowz["arabic_name"]?></h5>
            <p class="text-muted mb-1"><?=$rowz["job_title"]?></p>
            <p class="text-muted mb-4">Age : 
                <?php

               $currentDate = date("Y-m-d");

               $birthDate   = $rowz["date_of_birth"];

                $age = date_diff(date_create($birthDate), date_create($currentDate));
                echo($age->format("%y"));
             ?></p>


            <div class="d-flex justify-content-center mb-2">
              
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["full_name"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["email"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["telphone_ext"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["mobile_number"]?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["office_address"]?></p>
              </div>
            </div>
<hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Join Date</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?=$rowz["join_date"]?></p>
              </div>
            </div>
          </div>
        </div>


       
      </div>
    </div>
  </div>
<!---->
  






</section>
<!------------------------> 



    <br/>
    
     
       

       <div class="subNav">
       <div class="row align-items-center justify-content-center">

             <button class="btn btn-info m-4 w-20-300" data-toggle="modal" data-target="#ResetPasswordModal"><i class="fa-solid fa-lock"></i><br/>Reset Password </button>
           
             <?php include("../../Modals/ResetPasswordModal.php"); ?>
       

           
             

             <button class="btn btn-info m-4 w-20-300" data-toggle="modal" data-target="#NewITRequestModal"><i class="fa-solid fa-envelope-open-text"></i> <i class="fa-solid fa-screwdriver-wrench"></i> <br/>New IT Request </button>
             <?php include("Modals/NewITRequestModal.php"); ?>
            
             
           
         </div>
       </div>

        




              <hr>

         <!-- Car information Table-->
         <form action="controllers/EditUser.php" method="post" enctype="multipart/form-data" id="editUserForm">
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>User Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" name="UserID" class="form-control" value="<?php echo($_GET['id']); ?>" readonly  /></td> 
                  </tr>

                  




                  <tr>
                     <td class="text-left ">Name -  الأسم</td>
                      <td><input type="text" name="full_name" class="form-control" value="<?=$rowz["full_name"]?>"  <?=$disabledInput?>/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">AR Name -  الأسم</td>
                      <td><input type="text" name="arabic_name" class="form-control" value="<?=$rowz["arabic_name"]?>" <?=$disabledInput?>/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">GOV. ID -  رقم الهوية</td>
                      <td><input type="text" name="GovID" class="form-control" value="<?=$rowz["gov_id"]?>" <?=$disabledInput?>/></td>
                  </tr>

                  <tr>
                     <td class="text-left ">Brith date -  تاريخ  الميلاد</td>
                      <td><input type="date" name="DOB" class="form-control" value="<?=$rowz["date_of_birth"]?>" <?=$disabledInput?>/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Badge Number  - رقم الموظف</td>
                      <td><input type="text" name="BadgeNo" class="form-control" value="<?=$rowz["badge_number"]?>" <?=$disabledInput?>/></td>
                  </tr>



                  <tr>
                      <td class="text-left ">Company - الشركة </td>
                      <td>
                          <input type="text" name="company" class="form-control" value="<?=$rowz["company"]?>" list="CompanyList" <?=$disabledInput?>/>
                          <!------Company list from company table--------->
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
                      <td><input type="text" name="Department" class="form-control" value="<?=$rowz["department"]?>" <?=$disabledInput?>/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Job Title  - المسمى الوظيفي </td>
                      <td><input type="text" name="jobTitle" class="form-control" value="<?=$rowz["job_title"]?>" <?=$disabledInput?>/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Report to  - المدير المباشر </td>
                      <td>
                          <select class="form-control" name="ReportTo" <?=$disabledInput?>>
                              <option value="<?=$rowz["report_to"]?>"><?=$rowz["report_to"]?></option>
                              <!----list of managers---->
                          </select>
                        </td>
                  </tr>

               

                  <tr>
                      <td class="text-left ">Driving License Soft Copy - صورة من رخصة القيادة</td>
                      <td>
                      <a href="<?=$rowz["driving_license_url"]?>" target="_blank" class="btn btn-info m-1" >open</a>
                          <input type="file" class="form-control p-1" name="DrivingLicenseURL" />
                      </td>
                  </tr>




                  <tr>
                      <td class="text-left ">Office Address - عنوان المكتب </td>
                      <td><input type="text" name="officeAddress" class="form-control" value="<?=$rowz["office_address"]?>" <?=$disabledInput?>/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">E-mail -   البريد البريدالإلكتروني</td>
                      <td><input type="email" name="email" class="form-control" value="<?=$rowz["email"]?>" <?=$disabledInput?>/></td>
                  </tr>

                    
                  <tr>
                      <td class="text-left ">Mobile -    رقم الجوال</td>
                      <td><input type="text" name="mobile" class="form-control" value="<?=$rowz["mobile_number"]?>" <?=$disabledInput?>/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Telphone Ext. -    رقم التحويله</td>
                      <td><input type="text" name="TelphoneExt" class="form-control" value="<?=$rowz["telphone_ext"]?>" <?=$disabledInput?>/></td>
                  </tr>




                 


                  <tr>
                      <td class="text-left ">Permission Group :    الصلاحيات </td>
                      <td>
                         
                         <select id="PermissionList"  class="form-control" name="permissionGroup" <?=$disabledInput?>>
                             <option id="<?=$rowz["permission_group_id"]?>" value="<?=$rowz["permission_group"]?>"><?=$rowz["permission_group"]?></option>
                             
                             <?php
                             $sql = "select `id`, `permission_group` from `permission_group`;";
                             $result2 = $conn->query($sql);
                             while($row5 = $result2->fetch_array(MYSQLI_ASSOC))
                             {
                                 echo(' <option id="'.$row5["id"].'" value="'.$row5["permission_group"].'">'.$row5["permission_group"].'</option>');
                             }
                             ?>
                            
                         </select>

                         <input type="hidden" name="PermissionID" id="PermissionID"/>

                         <script>
                             //here change hidden value for permission ID
                             $("#PermissionList").change(function() 
                             {
                              let id = $("#PermissionList").children(":selected").attr("id");
                              document.getElementById("PermissionID").value = id;
                              });
                         </script>

                      </td>
                  </tr>


                  <tr>
                     <td class="text-left ">Creation Date - تاريخ الإنشاء</td>
                      <td><input type="text" class="form-control" value="<?=$rowz["creation_date"]?>" readonly /></td>
                  </tr>


                  <tr>
                     <td class="text-left ">Join Date - تاريخ التوظيف</td>
                      <td><input type="date" name="JoinDate" class="form-control" value="<?=$rowz["join_date"]?>" <?=$disabledInput?>/></td>
                  </tr>


                  <tr>
                      <td class="text-left "> Last Login -  أخر تسجيل دخول</td>
                      <td><input type="text" class="form-control" value="<?=$rowz["last_login"]?>" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Status</td>
                      <td>
                         
                          <select id="statusList" class="form-control" name="status" <?=$disabledInput?>>
                              <option value="<?=$rowz["status"]?>">  <?=$rowz["status"]?> </option>
                              <option value="Active">  Active </option>
                              <option value="Deactive">Deactive</option>  
                          </select>
                      </td>
                  </tr>



                



                  <tr>
                      <td class="text-left ">Note - ملاحظات</td>
                      <td><input type="text" name="note" class="form-control" value="<?=$rowz["note"]?>" <?=$disabledInput?>/></td>
                  </tr>




                  


              </tbody>
          </table>
          </form>
         <hr>


        

           <!-- Car Data Table-->
        
           <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td colspan="11" class="bg-dark">
                        <h4>IT Asset under This user    </h4>
                      </td>
                  </tr>
                  <tr>
                      <td class='hidecolumns'>SN.</td>
                      <td>Asset ID</td>
                      <td>Category</td>
                      <td class='hidecolumns'>Model</td>
                      <td class='hidecolumns'>Manufacture</td>
                      <td>Serial Number </td>
                      <td class='hidecolumns'> Description </td>
                     
                      <td>Received Date   </td>
                      <td>Return Date    </td>
                      <td class='hidecolumns'>Condition</td>
                      <td>Document</td>
                      
                  
                  </tr>
              </thead>
              <tbody>

              <?php

              $sql = "select `category`, `manufacture`, `description`, `model`,  `condition`, `serial_number`,  `asset_id`, `received_date`, `handover_date`, `asset_url`  from `it_users_assets` where `user_id` =".$_GET["id"]." order by `received_date` DESC";
              $result = $conn->query($sql);
              $count =1;
              while($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                  

                  echo("<tr>");
                  echo("<td class='hidecolumns'>". $count."</td>");
                  echo(' <td ><a href="AssetDetails.php?id='.$row["asset_id"].'" class="btn btn-info w-100">'.$row["asset_id"].'</a></td>');
                  echo("<td>".$row["category"]."</td>");
                  echo("<td class='hidecolumns'>".$row["model"]."</td>");
                  echo("<td class='hidecolumns'>".$row["manufacture"]."</td>");
                  echo("<td>".$row["serial_number"]."</td>");
                  echo("<td class='hidecolumns'>".$row["description"]."</td>");
              
                  echo("<td>".$row["received_date"]."</td>");
                  echo("<td>".$row["handover_date"]."</td>");
                  echo("<td class='hidecolumns'>".$row["condition"]."</td>");
                  echo("<td class='hidecolumns'> <a href='".$row["asset_url"]."' target='_blank' >open</a></td>");
                  echo("</tr>");
                  $count++;
              }
              ?>

                 


                 

              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->


         <!--- Request --->
         <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td colspan="11" class="bg-dark">
                        <h4>User IT Request </h4>
                      </td>
                  </tr>
                  <tr>
                      <td>SN.</td>
                      <td>ID</td>
                      <td>Request </td>
                    
                      <td class="w-50">Justification <br/>  </td>
                     
                      <td>Date    </td>
                    
                      <td> Response  </td>
                      
                  
                  </tr>
              </thead>
              <tbody>
            <?php
              $sql = "select `id`,  `request_type`  ,`justification` ,`creation_date`,`response` from `it_requests` where `requester_id` =".$_GET["id"];
              $result = $conn->query($sql);
              $count =1;
              while($row = $result->fetch_array(MYSQLI_ASSOC))
              {
                 echo("<tr>");
                 echo("<td>".$count."</td>");
                 echo(' <td ><a href="requestDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                 echo("<td>".$row["request_type"]."</td>");
                 echo("<td>".$row["justification"]."</td>");
                 echo("<td>".$row["creation_date"]."</td>");
                 echo("<td>".$row["response"]."</td>");
                 echo("</tr>");
                 $count++;
              }
               ?>
                
                    
                    
                      
                  
              </tbody>
         </table>
         <hr>
         <!-------------->



         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
             <button class="btn btn-secondary m-1"><i class="fa-solid fa-print"></i> <br/>Print <br/> </button>
            
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1" onclick="editUser()" <?=$disabledInput?>><i class="fa-solid fa-floppy-disk"></i> <br/>update <br/> </button>

            <script>
                function editUser()
                {
                    document.getElementById("editUserForm").submit();
                }

           </script>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->



<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>