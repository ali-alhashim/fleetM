<?php require("share/session.php"); ?>



<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="CarsList" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="CarsList" && $row["permission"] =="ALL")
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
    <title>Cars List</title>


    


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">

    <!----------jquery ------------------------------------------->
    <script src="frameworks/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
    <!--------------date timepicker---------------->
    
    
    <!--------------date timepicker---------------->

    <link rel="stylesheet" href="frameworks/bootstrap/dist/css/bootstrap.min.css" />

</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Car Data - بيانات المركبات</h3>
       <hr>


         <!--header of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
            Show - عرض
            <form action="carsData.php" method="GET" id="ShowRecords">
            <select class=" pageNavigation" onchange="limitRecordShowing()" name="perPage">
            <?php
              if(isset($_GET["perPage"]))
             {
            echo("<option value=".$_GET["perPage"].">".$_GET["perPage"]."</option>");
              }
            ?>
                <option>10</option>
                <option>20</option>
                <option>40</option>
                <option>80</option>
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

             <form action="carsData.php" method="GET">
             <select class=" pageNavigation" name="SearchBy">
                <option value="ALL">All - البحث في جميع الحقول</option>
                <option value="ID">ID</option>
                <option value="Department">Department - القسم</option>
                <option value="Plate">Plate Number - رقم اللوحة</option>
                <option value="Brand">Brand - الشركة المصنعة</option>
                <option value="DoorNo">Door Number - رقم الباب</option>
                <option value="yearOfmake"> Year Of Make -  سنة الصنع</option>
                <option value="RegistrationExpiration"> Registration Expiration  </option>
                <option value="RegistrationValid">Registration Valid</option>
                <option value="status"> status - الحاله</option>
            </select>
                 <input type="text" placeholder="Search" class="pageNavigation"  name="SearchKey"/>
                 <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Search - بحث</button>
                 <input type="hidden" name="perPage" value="<?php if(isset($_GET["perPage"])){echo($_GET["perPage"]);}else{echo("10");}?>" />
             </form>
             </div>
        
         </div>
         <div class="row m-3">

             <div class="col-6 text-left">
            <button class="btn btn-success " data-toggle="modal" data-target="#AddCarModal"><i class="fa-solid fa-plus"></i><br/>Add <br/> إضافة</button>

           

            <?php
            include("Modals/AddCarModal.php");
             ?>

            
        


             </div>

             <div class="col-6 text-right">
        
             </div>
         </div>
         <!------------------->

<hr>
         <!-- Car Data Table-->
        
          <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td class="hidecolumns">SN.</td>
                      <td>ID</td>
                      <td>Model <br/> طراز المركبة</td>
                      <td class='hidecolumns'>Brand <br/> الشركة المصنعة</td>
                      <td>Year Of Make <br/> سنة الصنع</td>
                      <td> Plate Number <br/> رقم اللوحة </td>
                      <td class='hidecolumns'> VID </br> رقم الهيكل </td>
                      <td> Department <br/> القسم </td>
                      <td class='hidecolumns'>Status </br> الحالة</td>
                  
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
          $SQLSearch ="where  `vid` LIKE '%".$_GET["SearchKey"]."%' or
                              `door_number` LIKE '%".$_GET["SearchKey"]."%' or
                              `serial_number` LIKE '%".$_GET["SearchKey"]."%' or
                              `plate_number` LIKE '%".$_GET["SearchKey"]."%' or
                              `model` LIKE '%".$_GET["SearchKey"]."%' ";
      }
      else if($_GET["SearchBy"] =="ID")
      {
          // Search for `id` column =
          
          $SQLSearch ="where `id`=".$_GET["SearchKey"];
      }
      else if($_GET["SearchBy"]=="Plate")
      {
        $SQLSearch ="where `plate_number` LIKE '%".$_GET["SearchKey"]."%'";
      }
      else if($_GET["SearchBy"]=="Brand")
      {
        $SQLSearch ="where `brand` LIKE '".$_GET["SearchKey"]."%'";
      }
      else if($_GET["SearchBy"]=="DoorNo")
      {
        $SQLSearch ="where `door_number` LIKE '%".$_GET["SearchKey"]."%'";
      }
      else if($_GET["SearchBy"]=="yearOfmake")
      {
        $SQLSearch ="where `year_make` LIKE '%".$_GET["SearchKey"]."%'";
      }
      else if($_GET["SearchBy"]=="Department")
      {
        $SQLSearch ="where `department` LIKE '%".$_GET["SearchKey"]."%'";
      }
      else if($_GET["SearchBy"]=="status")
      {
        $SQLSearch ="where `car_status` LIKE '%".$_GET["SearchKey"]."%'";
      }

      else if($_GET["SearchBy"]=="RegistrationExpiration")
      {
        $SQLSearch ="where `registration_expiration` < '".date("Y-m-d")."' and `car_status` LIKE '%".$_GET["SearchKey"]."%'";
      }

      else if($_GET["SearchBy"]=="RegistrationValid")
      {
        $SQLSearch ="where `registration_expiration` > '".date("Y-m-d")."' and `car_status` LIKE '%".$_GET["SearchKey"]."%'";
      }
     
      else
      {
        $SQLSearch = "";
      }
  }





                    $sql = "select `id`, `model`, `brand`, `year_make`,  `plate_number`, `vid`, `car_color`,`car_status`, `department` from `cars` $SQLSearch  order by `id` DESC  $limit  ;   ";

                    $result = $conn->query($sql);
                    $count = 1;
                    while( $row = $result->fetch_array(MYSQLI_ASSOC))
                    {
                       echo("<tr>");
                       echo("<td class='hidecolumns'>".$count."</td>");

                       echo(' <td ><a href="carDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                       echo("<td>".$row["model"]."</td>");
                       echo("<td class='hidecolumns'>".$row["brand"]."</td>");
                       echo("<td>".$row["year_make"]."</td>");
                       echo("<td>".$row["plate_number"]."</td>");
                       echo("<td class='hidecolumns'>".$row["vid"]."</td>");
                       echo("<td>".$row["department"]."</td>");
                       echo("<td class='hidecolumns'>".$row["car_status"]."</td>");
                       echo("</tr>");
                       $count++;
                    }
              ?>

                 
                  
                      
                 



                  


                

              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->

         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
             <?php
                 $sql = "SELECT count(id) FROM `cars` $SQLSearch;";
                 $result = $conn->query($sql);
                 $TotalUsers = $result->fetch_row()[0];
                 ?>

             Showing <?=$startRecoard?> to <?=$perPage+$startRecoard?> of <?= $TotalUsers?> entries
             </div>

             <div class="col-6 text-right"> <!---Start next back-->


              <div class="row text-right">
                  <form action="carsData.php" method="GET">

                    <div class="col-md-4">
                 <button class="btn btn-dark" onclick="this.form.submit()">Back<i class="fa-solid fa-caret-left"></i> </button>
                  </div>

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

                  <div class="col-md-4">
                 <input type="number" value="<?php
                  if(isset($_GET["pageNo"]))
                      {
                      echo($_GET['pageNo']);
                      }
                      else
                      {
                      echo(0);
                      }
                      ?>" class="form-control" id="currentPage"/>
                      </div>

                   <form action="carsData.php" method="GET">
               <div class="col-md-4">
                 <button class="btn btn-dark " onclick="this.form.submit()">Next <i class="fa-solid fa-caret-right"></i></button>
                    </div>
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






</body>
</html>
<?php
$conn->close();
?>