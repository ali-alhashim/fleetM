<?php require("../../share/session.php"); ?>


<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Users" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="Users" && $row["permission"] =="ALL")
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
    <title>Assets List</title>
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

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Assets List  </h3>
       <hr>


         <!--header of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
            Show 
            <form action="Assets.php" method="GET" id="ShowRecords">
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

            Entries  
             </div>


             <script>
                 function limitRecordShowing()
                 {
                   document.getElementById("ShowRecords").submit();
                 }
            </script>


             <div class="col-6 text-right">
              
             <form action="Assets.php" method="GET">
             <select class=" pageNavigation" name="SearchBy">
                <option value="ALL">All  </option>
                <option value="ID">ID</option>
                <option value="Email">Email</option>
                <option value="category">category</option>
                <option value="Department">Department</option>
                <option value="Name">Name  </option>
                <option value="description">Description</option>
                <option value="BadgeNumber">Badge Number</option>
                <option value="Condition">Condition</option>
                <option value="Date">Date</option>
               
             </select>
             
                 <input type="text" placeholder="Search" class="pageNavigation" name="SearchKey"/>
                 <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Search</button>

                 <input type="hidden" name="perPage" value="<?php if(isset($_GET["perPage"])){echo($_GET["perPage"]);}else{echo("10");}?>" />

                 </form>
             </div>
        
         </div>
         <div class="row m-3">

             <div class="col-6 text-left">
            <button class="btn btn-success" data-toggle="modal" data-target="#AddNewITAssetModal"><i class="fa-solid fa-plus"></i><br/>Add <br/> </button>

            
             </div>

             <?php include("Modals/AddNewITAssetModal.php"); ?>

             <div class="col-6 text-right">
              
             <button class="btn btn-info" id="Download-button-CSV" onclick="sendCSVForm()"><i class="fa-solid fa-file-csv"></i><br/>Download CSV<br/>      </button>
              <!------------------- html to csv script -----------------> 
              <script type="text/javascript">

               function sendCSVForm()
               {
                 document.getElementById("userlistCSVForm").submit();
               }

              </script>

              <!-------------------------------------------------------->
             </div>
         </div>
         <!------------------->

<hr>
         <!-- Car Data Table-->
        
          <table class="  table-hover carDataTable" id="usersListTable">
              <thead>
                  <tr>
                      <td class='hidecolumns'>SN.</td>
                      <td>ID</td>
                      <td class='hidecolumns'>Serial Number</td>
                      <td>Category </td>
                      <td class='hidecolumns'>Manufacture</td>
                      <td> Model  </td>
                      <td> Condition  </td>
                      <td class='hidecolumns'> Description </td>
                     
                      <td class='hidecolumns'>Date </td>
                  
                  </tr>
              </thead>
              <tbody>

              <?php


                  $perPage = 10;
                  $startRecoard = 0;
                  $SQLSearch ="";
                  $SQLFrom = "from `it_assets`";



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
                          $SQLSearch ="where  `serial_number` LIKE '%".$_GET["SearchKey"]."%' or
                                              `location` LIKE '%".$_GET["SearchKey"]."%'  or 
                                              `manufacture` LIKE '%".$_GET["SearchKey"]."%' or 
                                              `description` LIKE '%".$_GET["SearchKey"]."%' or 
                                              `model` LIKE '%".$_GET["SearchKey"]."%'  or 
                                              `department` LIKE '%".$_GET["SearchKey"]."%'  or 
                                              `manufacture` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"] =="ID")
                      {
                          // Search for `id` column =
                          
                          $SQLSearch ="where `id`=".$_GET["SearchKey"];
                      }
                      else if($_GET["SearchBy"]=="category")
                      {
                        $SQLSearch ="where `category` LIKE '".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Department")
                      {
                        $SQLSearch ="where `department` LIKE '".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Email")
                      {
                        //search in assets users
                        $SQLSearch ="where `email` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Name")
                      {
                         //search in 2 table
                        $SQLFrom = "from `it_assets`, `it_users_assets`"; 
                        $SQLSearch ="where   `it_users_assets`.`user_name` like '%".$_GET["SearchKey"]."%' and `it_assets`.`id` = `it_users_assets`.`asset_id` ";
                      }
                      else if($_GET["SearchBy"]=="BadgeNumber")
                      {
                         //search in assets users
                        $SQLSearch ="where `badge_number` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="condition")
                      {
                        $SQLSearch ="where `condition` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="description")
                      {
                        
                        $SQLSearch ="where `description` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else if($_GET["SearchBy"]=="Date")
                      {
                        
                        $SQLSearch ="where `asset_date` LIKE '%".$_GET["SearchKey"]."%'";
                      }
                      else
                      {
                        $SQLSearch = "";
                      }
                  }

                 
                 $sql = "select `it_assets`.`id`,  `it_assets`.`serial_number`, `it_assets`.`category`,  `it_assets`.`manufacture`, `it_assets`.`model`, `it_assets`.`condition`, `it_assets`.`description`,  `it_assets`.`asset_date` $SQLFrom $SQLSearch order by `asset_date`   DESC  $limit ; ";

                 $result = $conn->query($sql);
                 $count = 1;
                 while($row = $result->fetch_array(MYSQLI_ASSOC))
                 {
                     echo("<tr>");
                     echo("<td class='hidecolumns'>$count</td>");
                     echo('<td ><a href="AssetDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                     echo("<td class='hidecolumns'>".$row["serial_number"]."</td>");
                     echo("<td>".$row["category"]."</td>");
                     echo("<td class='hidecolumns'>".$row["manufacture"]."</td>");
                     echo("<td>".$row["model"]."</td>");
                     echo("<td>".$row["condition"]."</td>");
                     echo("<td class='hidecolumns'>".$row["description"]."</td>");
                   
                     echo("<td class='hidecolumns'>".$row["asset_date"]."</td>");
                     echo("</tr>");

                     $count++;
                 }

              ?>

                

                  <form method="POST" action="print/AssetsListCSV.php" id="userlistCSVForm">
                    <input type="hidden" name="sql" value="<?=$SQLSearch?>"/>
                  </form>

                



                      
                  </tr>

              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->

         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
                 <?php
                 $sql = "SELECT count(id) FROM  `it_assets` $SQLSearch;";
                 $result = $conn->query($sql);
                 $TotalUsers = $result->fetch_row()[0];
                 ?>
             Showing <?=$startRecoard?> to <?=$perPage+$startRecoard?> of <?= $TotalUsers?> entries
             </div>

             <div class="col-6 text-right"> <!---Start next back-->
              <div class="row text-right">
                  <form action="Assets.php" method="GET">
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

                   <form action="Assets.php" method="GET">
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



<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>