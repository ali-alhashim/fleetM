<?php require("share/session.php"); ?>

<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Settings" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="ALL" && $row["permission"] =="ALL")
   {
    $permissionResult = "valid";
    break;
   }
}

//--------------------------------------------------

if($permissionResult == "invalid")
{
    
    header("location: UserDetails.php?id=".$_SESSION["id"]);
}
?>


<?php 
require("share/key.php");
 ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="frameworks/jquery/dist/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="bg-dark " >

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3> Control Panel -  لوحة التحكم</h3>
       <hr>


<div class="accordion" id="accordionExample">
	
  <div class="card">
    <div class="card-header">
      <button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseOne">
              Database Connection
      </button>
    </div>
    <div class="collapse " id="collapseOne" data-parent="#accordionExample">
      <div class="card-body bg-lightGreen">

      
      <div class="row ">
        <div class="col-sm-3 text-left">
          <p class="mb-0">Server Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='<?php echo($serverAddress); ?>'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">Database Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='<?php echo($database) ?>'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">User Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='<?php echo($username) ?>'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">Password</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="password" value='<?php echo($password) ?>' class="form-control"/></p>
        </div>
      </div>
      <hr>


      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">Port</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="number" value='<?php echo($port) ?>' class="form-control"/></p>
        </div>
      </div>

      <hr>


      <div class="row text-center p-3">
      <div class="col-6 text-left">
         
           

          <a class="btn btn-akhBule m-1" href="controllers/DatabaseBackup.php" ><i class="fa-solid fa-database"></i> Database Backup </a>

          <a class="btn btn-akhBule m-1" href="controllers/uploadFolderBackup.php" ><i class="fa-solid fa-file-arrow-up"></i> Backup upload Folder [Fleet] </a>
          <a class="btn btn-akhBule m-1" href="controllers/uploadFolderBackupIT.php" ><i class="fa-solid fa-file-arrow-up"></i> Backup upload Folder [IT] </a>
</div>

          <div class="col-6 text-right">
          <form action="controllers/RestoreDatabase.php" method="POST" enctype="multipart/form-data" class="ml-5">
          <div class="row text-right">
          <input type="file" name="databaseFile" class="form-control p-1 w-50"/>
          <button class="btn btn-akhBule ml-1" ><i class="fa-solid fa-window-restore"></i> Restore </button>
          </div>
          </form>
         </div>

        </div>

        <hr>

        <form method="post" action="controllers/wipeAllUploadedDocuments.php">
        <div class="row">
       
          <div class="col-6 bg-light justify-content-center align-content-center p-2">
          Write here : wipe all uploaded documents
          </div>

          <div class="col-4 ">
        
         <input type="text" class="form-control w-100 m-0" placeholder="wipe all uploaded documents" name="answer"/>
          </div>

          <div class="col-2 ">
         <button class="form-control btn btn-danger"> <i class="fa-solid fa-eraser"></i> Wipe </button>
          </div>
      
        </div>
         </form>


        <hr>

        <form method="post" action="controllers/wipeAllDataTable.php">
        <div class="row">
       
          <div class="col-6 bg-light justify-content-center align-content-center p-2">
          Write here : wipe all Data Tables
          </div>

          <div class="col-4 ">
        
         <input type="text" class="form-control w-100 m-0" placeholder="wipe all Data Tables" name="answer"/>
          </div>

          <div class="col-2 ">
         <button class="form-control btn btn-danger"> <i class="fa-solid fa-eraser"></i> Wipe </button>
          </div>
      
        </div>
         </form>


        <hr>
        <?php


$handle = opendir('Backup');
$FileArray = [];

if ($handle) {
    while (($entry = readdir($handle)) !== FALSE) {

     
       
        if(strpos($entry,".sql") !==FALSE)
        {
         
        $FileArray[] = [filemtime('Backup/'.$entry), 'Backup/'.$entry];
        //echo("<a href='Backup/".$entry."' > <img src='gallery/icons/icons8_downloads_32px.png'/>".$entry ."</a>");
       // echo("<hr>");
        }
    }
}
 
closedir($handle);

rsort($FileArray);
foreach($FileArray as $DBfile)
{
  echo("<a href='".$DBfile[1]."' > <img src='gallery/icons/icons8_downloads_32px.png'/>".$DBfile[1] ."</a>");
  echo("<hr>");
}




?>
      

        
     


      
       
    




    </div>

    <hr>


             

              
      </div>
    </div>
  </div>
  
  <div class="card">
    <div class="card-header">
      <button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseTwo">
              Company -    الشركات 
      </button>
    </div>
    <div class="collapse" id="collapseTwo" data-parent="#accordionExample">
      <div class="card-body bg-lightBag">
      <div class="row m-3">

<div class="col-6 text-left">
<button class="btn btn-success" data-target="#AddCompanyModal" data-toggle="modal"><i class="fa-solid fa-plus"></i><br/>Add <br/> إضافة</button>
<?php require("Modals/AddCompanyModal.php"); ?>
</div>

<div class="col-6 text-right">
<!-- <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><br/>Delete <br/> حذف</button> -->
</div>
</div>
         <!-- Company list Table-->
        
         <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td>SN.</td>
                      <td>ID</td>
                      <td>Company Name <br/>  أسم الشركة</td>
                      <td>CR <br/>  رقم السجل التجاري</td>
                      <td>Logo URL <br/> شعار الشركة </td>
              
                  </tr>
              </thead>
              <tbody>

              <?php
                 $sql = "select `id`, `company_name`,  `company_CR`,   `company_logo` from `company`;";

                 $result = $conn->query($sql);

                 $count = 1;
                 while($row =$result ->fetch_array(MYSQLI_ASSOC))
                 {
                   echo("<tr>");
                   echo("<td>".$count."</td>");
                   echo('<td ><a href="CompanyDetails.php?id="'.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                   echo("<td>".$row["company_name"]."</td>");
                   echo("<td>".$row["company_CR"]."</td>");
                   echo('  <td><a href="'.$row["company_logo"].'" class="btn btn-info">open</a></td>');
                   echo("</tr>");
                     $count++;
                 }

              ?>

                 



                  





              </tbody>
          </table>
         <hr>

         <form action="controllers/updateSystemLogo.php" method="post" enctype="multipart/form-data" >
          
           <input type="file" name="SystemLogo" class="form-control p-1" required/>
           <br/>
           <input type="submit" value="update System Logo" class="form-control btn btn-dark w-25"/>
         </form>
         <!-- company list Table-->

      </div>
    </div>
  </div>




  <div class="card">
    <div class="card-header">
      <button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseDepartment">
              Department -    الأقسام 
      </button>
    </div>
    <div class="collapse" id="collapseDepartment" data-parent="#accordionExample">
      <div class="card-body bg-lightBrown">
      <div class="row m-3">

<div class="col-6 text-left">
<button class="btn btn-success" data-toggle="modal" data-target="#AddDepartmentModal"><i class="fa-solid fa-plus"></i><br/>Add <br/> إضافة</button>

<a class="btn btn-info p-1 ml-5" href="SyncManagerDepartmentWithUsers.php"><i class="fa-solid fa-arrows-rotate"></i> </br/>Sync Managers Department with users <br/> مزامنة رؤساء  الأقسام مع المستخدمين</a>

<?php require("Modals/AddDepartmentModal.php");?>
</div>

<div class="col-6 text-right">
<!-- <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><br/>Delete <br/> حذف</button> -->
</div>
</div>
         <!-- Department list Table-->
        
         <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td class='hidecolumns'>SN.</td>
                      <td>ID</td>
                      <td class='hidecolumns'>Company Name</td>
                      <td>Department Name <br/>  أسم القسم</td>
                      <td class='hidecolumns'>Department Manager ID <br/>  رقم  مدير القسم</td>
                      <td>Department Manager Name <br/>  أسم مدير القسم </td>
              
                  </tr>
              </thead>
              <tbody>

              <?php
              $sql = "select * from `department`;";

             $result = $conn->query($sql);

            $i =1;
           while( $row =$result ->fetch_array(MYSQLI_ASSOC))
                {
                 echo("<tr>");
                 echo("<td class='hidecolumns'>".$i."</td>");
                 echo('<td ><a href="DepartmentDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                 echo('<td class="hidecolumns">'.$row["company_name"].'</td>');
                 echo("<td>".$row["department_name"]."</td>");
                 echo("<td class='hidecolumns'>".$row["manager_id"]."</td>");     
                 echo("<td>".$row["manager_name"]."</td>");       
                      
                  echo("</tr>");
                  $i++;
                }
                  ?>








              </tbody>
          </table>
         <hr>
         <!--end Department list Table-->

      </div>
    </div>
  </div>








  <!----Permission Group -->
  <div class="card">
    <div class="card-header">
      <button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapse3">
      Permission Group -    مجموعة الصلاحيات 
      </button>
    </div>
    <div class="collapse" id="collapse3" data-parent="#accordionExample">
      <div class="card-body bg-lightRed">
      <div class="row m-3">

<div class="col-6 text-left">
<button class="btn btn-success" data-toggle="modal" data-target="#AddPermissionGroupModal"><i class="fa-solid fa-plus"></i><br/>Add <br/> إضافة</button>

<?php include("Modals/AddPermissionGroup.php"); ?>

</div>

<div class="col-6 text-right">
<!-- <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><br/>Delete <br/> حذف</button> -->
</div>
</div>
         <!-- Car Data Table-->
        
         <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td>SN.</td>
                      <td>ID</td>
                      <td> Permission Group <br/>  مجموعة الصلاحيات </td>
                      
              
                  </tr>
              </thead>
              <tbody>


              <?php
                  
               

                $sql = "select * from `permission_group`;";

                $result = $conn->query($sql);
                
                $i =0;
               while( $row =$result ->fetch_array(MYSQLI_ASSOC))
               {
                 echo("
                      
                 <tr>
                 <td>".++$i."</td>
                 <td> <a href='PermissionGroupDetails.php?id=".$row["id"]."' class='btn btn-info w-100'>".$row["id"]."</a> </td>
                 <td> ".$row["permission_group"]." </td>
                 </tr>

                 ");
               }

                

                
                
              ?>

                 





              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->

      </div>
    </div>
  </div>
  <!------------------------->



  <div class="card">
    <div class="card-header">
      <button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseEmail">
              System  E-mail
      </button>
    </div>
    <div class="collapse " id="collapseEmail" data-parent="#accordionExample">
      <div class="card-body bg-sliver">

      <form action="controllers/updateSystemEmail.php" method="POST">
      <div class="row ">
        <div class="col-sm-3 text-left">
          <p class="mb-0">SMTP Server </p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='smtp.gmail.com'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">SMTP port </p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='587'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">User Name</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="text" value='system.akte@gmail.com'  class="form-control"/></p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3 text-left">
          <p class="mb-0">Password</p>
        </div>
        <div class="col-sm-9">
          <p class="text-muted mb-0"><input type="password" value='_J:vh47jv-bD23q' class="form-control"/></p>
        </div>
      </div>
      <hr>


    

      


      <div class="row text-center p-3">
      <div class="col-6 text-left">
         
           

          <input type="submit" class="btn btn-akhBule m-1" value='Save ' />
              </form>
</div>

  
  
    
             
              </div><!-- .accordion -->

 
              </div>   </div></div>
<!--Work Space-->
              
<br/>
<br/>
<!-------------------------------------- Log Table -------------------------------------> 
<h3>Transaction History -   سجل العمليات</h3>
       <hr>


         <!--header of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
            Show - عرض
            <form action="Settings.php" method="GET" id="ShowRecords">
            <select class="pageNavigation" id="SelectShowRecord" onchange="limitRecordShowing()" name="perPage">

            <?php
              if(isset($_GET["perPage"]))
             {
            echo("<option value=".$_GET["perPage"].">".$_GET["perPage"]."</option>");
              }
            ?>

                <option value="10">10</option>
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="80">80</option>
                <option value="ALL">ALL</option>
            </select>

            <input type="hidden" name="pageNo" value="
            <?php
            if(isset($_GET["pageNo"]))
            {
              echo($_GET["pageNo"]);
            }
            else
            {
              echo("0");
            }
            ?>
            " />
            </form>

            Entries - سجلات
             </div>


             <script>
                 function limitRecordShowing()
                 {
                   document.getElementById("ShowRecords").submit();
                 }
            </script>


             <div class="col-6 text-right">
              
             <form action="Settings.php" method="GET">
             <select class=" pageNavigation" name="SearchBy">
                <option value="ALL">All - البحث في جميع الحقول</option>
                <option value="ID">ID</option>
                <option value="Email">Email</option>
                <option value="Name">Name</option>
                
                <option value="Date">Date</option>
                
               
             </select>
             
                 <input type="text" placeholder="Search" class="pageNavigation" name="SearchKey"/>
                 <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Search - بحث</button>

                 <input type="hidden" name="perPage" value="<?php if(isset($_GET["perPage"])){echo($_GET["perPage"]);}else{echo("10");}?>" />

                 </form>
             </div>
        
         </div>
         <div class="row m-3">

          

             <div class="col-6 text-right">
             <!--button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><br/>Delete <br/> حذف</button-->
             </div>
         </div>
         <!------------------->

<hr>
         <!-- Car Data Table-->
        
          <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td class='hidecolumns'>ID</td>
                      <td>Date</td>
                      <td class='hidecolumns'>Name </td>
                      <td>Email </td>
                      <td> Action </td>
                    
                     
                  
                  </tr>
              </thead>
              <tbody>

              <?php


                  $perPage = 10;
                  $startRecoard = 0;
                  $SQLSearch ="";



                  if(isset($_GET["pageNo"]))
                  {
                      if($_GET["pageNo"]>0)
                      {
                        $startRecoard = $_GET["pageNo"] * $perPage;
                      }
                  }


                  if(isset($_GET["perPage"]) && $_GET["perPage"] !="ALL" )
                  {
                    $perPage = $_GET["perPage"];  
                  }

                  $limit ="limit ". $startRecoard.",".$perPage;

                  if(isset($_GET["perPage"]) && $_GET["perPage"] =="ALL")
                  {
                    $limit ="";
                  }




                  //SQLSearch
                  if(isset($_GET["SearchBy"]))
                  {
                      if($_GET["SearchBy"] =="ALL")
                      {
                          // Search %like% for all columns
                          $SQLSearch ="where  `user_name` LIKE '%".$_GET["SearchKey"]."%' or  `email` LIKE '%".$_GET["SearchKey"]."%' or `action_date` LIKE '%".$_GET["SearchKey"]."%' or `action` LIKE '%".$_GET["SearchKey"]."%' ";
                      }
                      else if($_GET["SearchBy"] =="ID")
                      {
                          // Search for `id` column =
                          
                          $SQLSearch ="where `id`=".$_GET["SearchKey"];
                      }
                     
                    
                      else if($_GET["SearchBy"]=="Email")
                      {
                        $SQLSearch ="where `email` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Name")
                      {
                        $SQLSearch ="where `user_name` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Date")
                      {
                        $SQLSearch ="where `action_date` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                     
                      else
                      {
                        $SQLSearch = "";
                      }
                  }

                 
                 $sql = "select `id`,  `action_date`, `user_name`,  `email`, `action` from `log` $SQLSearch order by `id` DESC  $limit ; ";

                 $result = $conn->query($sql);
                
                 while($row = $result->fetch_array(MYSQLI_ASSOC))
                 {
                     echo("<tr>");
                 
                     echo("<td class='hidecolumns'>".$row["id"]."</td>");
                   
                     echo("<td>".$row["action_date"]."</td>");
                     echo("<td class='hidecolumns'>".$row["user_name"]."</td>");
                     echo("<td>".$row["email"]."</td>");
                     echo("<td>".$row["action"]."</td>");
                    
                  
                     echo("</tr>");

                     $count++;
                 }

              ?>

                



                



                      
                  </tr>

              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->

         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
                 <?php
                 $sql = "SELECT count(id) FROM `log` $SQLSearch;";
                 $result = $conn->query($sql);
                 $TotalUsers = $result->fetch_row()[0];
                 ?>
             Showing <?=$startRecoard?> to <?=$perPage+$startRecoard?> of <?= $TotalUsers?> entries
             </div>

             <div class="col-6 text-right"> <!---Start next back-->
              <div class="row text-right">
                  <form action="Settings.php" method="GET">
                 <button class="btn btn-dark" onclick="this.form.submit()"><i class="fa-solid fa-caret-left"></i> Back</button>
                 <input type="hidden" name="pageNo" value="<?php
                  if(isset($_GET["pageNo"]))
                  {
                      if($_GET["pageNo"]>0)
                      {
                          $pageNo = $_GET["pageNo"] -1;
                      }
                      else
                      {
                        $pageNo = 0 ; 
                      }

                      echo($pageNo);
                  }
                  else
                  {
                    echo(0); 
                  }
                  ?>"/>
                  </form>

                 <input type="number" value="<?php
                  if(isset($_GET["pageNo"]))
                      {
                      echo($_GET['pageNo']);
                      }
                      else
                      {
                      echo(0);
                      }
                      ?>" class="pageNavigation" id="currentPage"/>

                   <form action="Settings.php" method="GET">
                 <button class="btn btn-dark" onclick="this.form.submit()">Next <i class="fa-solid fa-caret-right"></i></button>
                 <input type="hidden" name="pageNo" value="<?php
                  if(isset($_GET["pageNo"]))
                  {
                      if($_GET["pageNo"]<=$TotalUsers)
                      {
                          $pageNo = $_GET["pageNo"] +1;
                      }
                      else
                      {
                        $pageNo = 0 ; 
                      }

                      echo($pageNo);
                  }
                  else
                  {
                    echo(0); 
                  }
                  ?>"/>
                 </form>

                 </div>
             </div> <!---end back next---->
        
         </div>
         <!------------------->
         
     <hr>
     

 <!--------------------------------------end Log Table ---------------------------------->  
<br/>
<br/>
<h3> - Import Data from CSV - </h3>
 <table class="carDataTable ">
<tr>
<td> <a class="btn btn-danger w-100" href="./controllers/importCarListCSV.php">import car list from CSV file</a> </td>

<td> <a class="btn btn-info w-100" href="controllers/ActiveDirectorySync.php" >Sync user list With Active Directory </a></td>

 <td><a class="btn btn-info w-100" href="controllers/importUserBadgeNo.php" >import badge namber from CSV [oneHR] </a></td>

 <td><a class="btn btn-info w-100" href="controllers/importUserGovID.php" >import GOV ID namber from CSV [Admin] </a></td>
</tr>
<tr>
<td> <a class="btn btn-info w-100" href="controllers/importCarUser.php" >import Car User from CSV [Transportation] </a></td>

<td> <a class="btn btn-info w-100" href="controllers/importProfilePhoto.php" >import Users photo from [Bio Time] </a></td>

<td> <a class="btn btn-info w-100" href="controllers/importGetEmployees.php">import importGetEmployees.csv</a></td>
<td> <a class="btn btn-info w-100" href="Modules/IT/controllers/importItAssets.php">import IT Asset CSV</a></td>
<td> <a class="btn btn-info w-100" href="Modules/IT/controllers/importUsersItAssets.php">import Users IT Asset CSV</a></td>
</tr>
</table>

<br/>
<br/>

<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>