<?php require("share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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
       <h3>Notifications  -   الإشعارات</h3>
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
               
                <option value="RequestID">Request ID</option>
                <option value="responseDate">Response Date</option>
                <option value="notifcationDate">Notifcation Date</option>
                <option value="ID">Notifcation ID</option>
              
                <option value="Response">Response </option>
               
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
                      <td>ID</td>
                      <td>Date</td>
                      <td>Request ID <br/> رقم الطلب</td>
                     
                      
                      <td>By <br/> من</td>
                      <td> Brief <br/> الإشعار</td>
                      <td>Response <br/>  الرد</td>
                    
                     
                  
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

                 
                 $sql = "select `id`,  `notifcation_date`, `request_id`,  `requester_name`,  `response`, `brief` from `notifcations` where `user_id` = ".$_SESSION["id"]." $SQLSearch  $limit ; ";

                 $result = $conn->query($sql);
                 $count = 1;
                 while($row = $result->fetch_array(MYSQLI_ASSOC))
                 {
                     echo("<tr>");
                     echo("<td>$count</td>");
                     echo('<td >'.$row["id"].'</td>');
                     echo("<td>".$row["notifcation_date"]."</td>");
                     echo('<td ><a href="requestDetails.php?id='.$row["request_id"].'" class="btn btn-info w-100">'.$row["request_id"].'</a></td>');
                    
                     
                     echo("<td>".$row["requester_name"]."</td>");
                     echo("<td>".$row["brief"]."</td>");
                     echo("<td>".$row["response"]."</td>");
                   
                   
                    
                  
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