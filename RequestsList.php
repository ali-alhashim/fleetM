<?php require("share/session.php"); ?>




<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="RequestsList" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="RequestsList" && $row["permission"] =="ALL")
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

<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests List</title>
    <link rel="stylesheet" href="frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="frameworks/jquery/dist/jquery.min.js"></script>
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Requests List -  قائمة الطلبات</h3>
       <hr>


         <!--header of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
            Show - عرض
            <form action="RequestsList.php" method="GET" id="ShowRecords">
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
              
             <form action="RequestsList.php" method="GET">
             <select class=" pageNavigation" name="SearchBy">
                <option value="ALL">All - البحث في جميع الحقول</option>
                <option value="ID">ID</option>
                <option value="Email">Email</option>
                <option value="Company">Company</option>
                <option value="Department">Department</option>
                <option value="Name">Name -  الأسم</option>
                <option value="Mobile">Mobile - رقم الجوال</option>
                <option value="BadgeNumber">Badge Number - رقم الموظف</option>
                <option value="Status">Status - الحالة</option>
               
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
                      <td>SN.</td>
                      <td>Date</td>
                      <td>Request ID <br/> رقم الطلب</td>
                      <td>User ID <br/> رقم المرسل </td>
                      <td>Name <br/> الأسم</td>
                     
                      <td> Department <br/>  القسم </td>
                      <td>Badge Number </br/> رقم الموظف</td>
                      <td>Request Type </br/>  نوع الطلب</td>
                    
                      <td>Mobile </br> رقم الجوال </td>
                     
                      <td> Status <br/> الحاله </td>
                      <td>Response</td>
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
                          $SQLSearch ="where  `full_name` LIKE '%".$_GET["SearchKey"]."%' or  `email` LIKE '%".$_GET["SearchKey"]."%' or `badge_number` LIKE '%".$_GET["SearchKey"]."%' or `department` LIKE '%".$_GET["SearchKey"]."%' ";
                      }
                      else if($_GET["SearchBy"] =="ID")
                      {
                          // Search for `id` column =
                          
                          $SQLSearch ="where `id`=".$_GET["SearchKey"];
                      }
                      else if($_GET["SearchBy"]=="Company")
                      {
                        $SQLSearch ="where `company` LIKE '".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Department")
                      {
                        $SQLSearch ="where `department` LIKE '".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Email")
                      {
                        $SQLSearch ="where `email` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Name")
                      {
                        $SQLSearch ="where `full_name` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="BadgeNumber")
                      {
                        $SQLSearch ="where `badge_number` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Status")
                      {
                        $SQLSearch ="where `status` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Mobile")
                      {
                        $SQLSearch ="where `mobile` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else
                      {
                        $SQLSearch = "";
                      }
                  }

                 
                 $sql = "select `id`,  `request_date`, `user_id`,  `full_name`, `request_type`, `department`, `badge_number`, `status`, `mobile`, `transportation_response` from `requestes_for_cars` $SQLSearch  order by `request_date` DESC $limit ; ";

                 $result = $conn->query($sql);
                 $count = 1;
                 while($row = $result->fetch_array(MYSQLI_ASSOC))
                 {
                     echo("<tr>");
                     echo("<td>$count</td>");
                     echo("<td>".$row["request_date"]."</td>");
                     echo('<td ><a href="requestDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                     echo('<td ><a href="UserDetails.php?id='.$row["user_id"].'" class="btn btn-info w-100">'.$row["user_id"].'</a></td>');
                     echo("<td>".$row["full_name"]."</td>");
                    
                     echo("<td>".$row["department"]."</td>");
                     echo("<td>".$row["badge_number"]."</td>");
                    
                     echo("<td>".$row["request_type"]."</td>");
                     echo("<td>".$row["mobile"]."</td>");
                     echo("<td>".$row["status"]."</td>");
                     echo("<td>".$row["transportation_response"]."</td>");
                    
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
                 $sql = "SELECT count(id) FROM `requestes_for_cars` $SQLSearch;";
                 $result = $conn->query($sql);
                 $TotalUsers = $result->fetch_row()[0];
                 ?>
             Showing <?=$startRecoard?> to <?=$perPage+$startRecoard?> of <?= $TotalUsers?> entries
             </div>

             <div class="col-6 text-right"> <!---Start next back-->
              <div class="row text-right">
                  <form action="RequestsList.php" method="GET">
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

                   <form action="RequestsList.php" method="GET">
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


    </div>
<!--Work Space-->



<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>