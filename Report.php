
<?php require("share/session.php"); ?>

<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Report" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }


   if($row["object"] =="Report" && $row["permission"] =="ALL")
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
    <title>Reports</title>
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


       <h3> Reports - التقارير </h3>
       

      
               <hr>
               <h3> [ Cars Report ] </h3>
               <form action="print/printCarsReport.php" method="post">
                 <table class=" carDataTable">
                   <thead>
                   <tr>
                     <td>Car Status</td>
                     <td>Department</td>
                     <td>Brand</td>
                     <td>Model</td>
                     <td>Year Make</td>
                     <td>Registration Expiration</td>
                     
                   </tr>
                   </thead>
                   <tr>

                   <td>
                       <!--list cars department from cars table --->
                       <select name="carStatus" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`car_status`) from `cars`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["car_status"]."</option>");
                         }
                         ?>
                       </select>
                     </td>

                     <td>
                       <!--list cars department from cars table --->
                       <select name="carDepartment" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`department`) from `cars`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["department"]."</option>");
                         }
                         ?>
                       </select>
                     </td>

                     <td>
                     <select name="carBrand" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`brand`) from `cars`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["brand"]."</option>");
                         }
                         ?>
                       </select>
                     </td>


                     <td>
                     <select name="carModel" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`model`) from `cars`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["model"]."</option>");
                         }
                         ?>
                       </select>
                     </td>


                     <td>
                     <select name="carYearMake" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`year_make`) from `cars` order by `year_make` DESC;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["year_make"]."</option>");
                         }
                         ?>
                       </select>
                     </td>

                     <td>
                     <select name="RegistrationExpiration" class="form-control">
                         <option>All</option>
                         <option value="M1">After 1 Month</option>
                         <option value="M2">After 2 Month</option>
                         <option value="M3">After 3 Month</option>
                         <option>Expired</option>
                     </select>
                     </td>


                   </tr>
                 </table>
                 <br/>
               <button type="submit"  class="btn btn-info m-1 w-25"> Report   <i class='fa-solid fa-magnifying-glass'></i></button>
               </form>
               <hr>
   
  
  

           

          
              <hr>
              <h3> [ Cars Users Report ] </h3>
              <form action="print/CarsUsersReport.php" method="post">
              <button type="submit"  class="btn btn-info m-1 w-25"> Report   <i class='fa-solid fa-magnifying-glass'></i></button>
              </form>
              <hr>


              <hr>
              <h3> [ Users Report ] </h3>
              <form action="print/usersReport.php" method="post">
              <table class=" carDataTable">
                   <thead>
                   <tr>
                     
                     <td>Department</td>
                     <td>Nationality</td>
                     <td>Permission</td>
                     <td>Company</td>
                     
                     
                   </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>
                       <select name="department" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`department`) from `users`";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["department"]."</option>");
                         }
                         ?>
                           </select>
                        </td>


                         <td>
                       <select name="nationality" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`nationality`) from `users`";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["nationality"]."</option>");
                         }
                         ?>
                           </select>
                        </td>



                        <td>
                       <select name="permission_group" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`permission_group`) from `users`";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["permission_group"]."</option>");
                         }
                         ?>
                           </select>
                        </td>


                        <td>
                       <select name="company" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`company`) from `users`";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["company"]."</option>");
                         }
                         ?>
                           </select>
                        </td>
                     
                     </tr>
                   </tbody>
              </table>
                        </br>
              <button type="submit"  class="btn btn-info m-1 w-25"> Report   <i class='fa-solid fa-magnifying-glass'></i></button>
              </form>
              <hr>
            
     
    




  
  
    
  
</div><!-- .accordion -->

 
</div>  <!--Work Space-->


<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>