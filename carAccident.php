<?php require("share/session.php"); ?>



<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="CarsAccident" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }


   if($row["object"] =="CarsAccident" && $row["permission"] =="ALL")
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
    <title>Cars Accident</title>
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
       <h3>Car Accident - حوادث المركبات</h3>
       <hr>


         <!--header of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
            Show - عرض
            <select class=" pageNavigation">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
            Entries - سجلات
             </div>

             <div class="col-6 text-right">
             <select class=" pageNavigation p-2">
                <option>All - البحث في جميع الحقول</option>
                <option>ID</option>
                <option>Plate Number - رقم اللوحة</option>
                <option>VID -  رقم الهيكل</option>
                <option>Serial Number -   الرقم التسلسلي</option>
                <option>Brand - الشركة المصنعة</option>
                <option>Door Number - رقم الباب</option>
                <option>Badge Number - رقم الموظف</option>
                <option>Accident Number - رقم الحادث</option>
                <option> Date - تاريخ الحادث </option>
            </select>
                 <input type="text" placeholder="Search" class="pageNavigation"/>
                 <button class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i> Search - بحث</button>
                 
             </div>
        
         </div>
         <div class="row m-3">

             <div class="col-6 text-left">
            <!--button class="btn btn-success"><i class="fa-solid fa-plus"></i><br/>Add <br/> إضافة</button-->
             </div>

             <div class="col-6 text-right">
            <!-- <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i><br/>Delete <br/> حذف</button> -->
             </div>
         </div>
         <!------------------->

<hr>
         <!-- Car Data Table-->
        
          <table class="  table-hover carDataTable">
              <thead>
                  <tr>
                      <td class='hidecolumns'>SN.</td>
                      <td>ID</td>
                      <td>Model <br/> طراز المركبة</td>
                      <td class='hidecolumns'>Brand <br/> الشركة المصنعة</td>
                      <td>Year Of Make <br/> سنة الصنع</td>
                      <td> Plate Number <br/> رقم اللوحة </td>
                     
                      <td> Date <br/> تاريخ الحادث </td>
                      <td > Mistake percentage <br/> نسبة الخطأ </td>
                      <td class='hidecolumns'> Mistake percentage Second Party <br/>  نسبة الخطأ الطرف الثاني </td>
                      <td class='hidecolumns'> Accident Number <br/> رقم الحادث </td>
                      <td class='hidecolumns'> Location <br/> موقع الحادث </td>
                      <td>Status </br> الحالة</td>
                      
                  </tr>
              </thead>
              <tbody>
                       
              <?php
                 $count = 1;
                 $sql = "select `id`,`car_id`, `accident_date`, `accident_number`, `mistake_percentage`,`mistake_percentage_second_party`, `location`, `car_accident_status`    from `car_accident`;";
                 $result = $conn->query($sql);

                 while($row = $result->fetch_array(MYSQLI_ASSOC))
                 {
                     $sql = "select * from `cars` where `id`=".$row["car_id"].";";
                     $result2 = $conn->query($sql);
                     $row2 = $result2->fetch_array(MYSQLI_ASSOC);
                     echo("<tr>");
                     echo("<td class='hidecolumns'>".$count."</td>");
                     echo('<td><a href="AccidentDetails.php?id='.$row["id"].'" class="btn btn-info w-100">'.$row["id"].'</a></td>');
                     echo("<td>".$row2["model"]."</td>");
                     echo("<td class='hidecolumns'>".$row2["brand"]."</td>");
                     echo("<td>".$row2["year_make"]."</td>");
                     echo("<td>".$row2["plate_number"]."</td>");
                     echo("<td>".$row["accident_date"]."</td>");
                     echo("<td>".$row["mistake_percentage"]."</td>");
                     echo("<td class='hidecolumns'>".$row["mistake_percentage_second_party"]."</td>");
                     echo("<td class='hidecolumns'>".$row["accident_number"]."</td>");
                     echo("<td class='hidecolumns'>".$row["location"]."</td>");
                     echo("<td>".$row["car_accident_status"]."</td>");
                     echo("</tr>");
                 }

              ?>
                 



                  



                

              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->

         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">
             Showing 1 to 10 of 639 entries
             </div>

             <div class="col-6 text-right">
                 <button class="btn btn-dark"><i class="fa-solid fa-caret-left"></i> Back</button>
                 <input type="number" value="1" class="pageNavigation"/>
                 <button class="btn btn-dark">Next <i class="fa-solid fa-caret-right"></i></button>
                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->


<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>