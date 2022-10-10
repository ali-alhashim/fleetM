
<?php require("../../share/session.php"); ?>

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


       <h3> Reports </h3>
       

      
               <hr>
               <h3> [ Asset User Register Report ] </h3>
               <form action="print/printAssetUserRegisterReport.php" method="post">
                 <table class=" carDataTable">
                   <thead>
                   <tr>
                     <td>User Name</td>
                     <td>Department</td>
                    
                     <td>Email</td>
                     <td>Asset Register Date</td>
                     <td>Category</td>
                     
                   </tr>
                   </thead>
                   <tr>

                   <td>
                       <!--list cars department from cars table --->
                       <input type="text" name="UserName" class="form-control" list="userList">
                       <datalist id="userList">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`user_name`) from `it_users_assets`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["user_name"]."</option>");
                         }
                         ?>
                       </datalist>
                     </td>

                     <td>
                       <!--list cars department from cars table --->
                       <select name="UserDepartment" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`department`) from `it_users_assets`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["department"]."</option>");
                         }
                         ?>
                       </select>
                     </td>

                  


                     <td>
                     <select name="UserEmail" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`email`) from `it_users_assets`;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["email"]."</option>");
                         }
                         ?>
                       </select>
                     </td>


                     <td>
                     <select name="received_date" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`received_date`) from `it_users_assets` order by `received_date` DESC;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["received_date"]."</option>");
                         }
                         ?>
                       </select>
                     </td>


                     <td>
                     <select name="category" class="form-control">
                         <option>All</option>
                         <?php
                         $sql = "select DISTINCT(`category`) from `it_users_assets` order by `category` DESC;";
                         $result = $conn->query($sql);
                         while($row = $result->fetch_array(MYSQLI_ASSOC))
                         {
                           echo("<option>".$row["category"]."</option>");
                         }
                         ?>
                       </select>
                     </td>

                   


                   </tr>
                 </table>
                 <br/>
               <button type="submit"  class="btn btn-info m-1 w-25"> Report   <i class='fa-solid fa-magnifying-glass'></i></button>
               </form>
               <hr>
   
  
  

           

          
           
     
    




  
  
    
  
</div><!-- .accordion -->

 
</div>  <!--Work Space-->


<script src="../../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>