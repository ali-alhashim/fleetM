
<?php require("../../share/session.php"); ?>



<?php
//-----------------------------------------------
$sql = "select `module`,  `object`, `permission`  from `permission` where `permission_group_id` = ".$_SESSION["permission_group_id"].";";
$permissionResult = "invalid";
$result = $conn->query($sql);
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
   if($row["object"] =="Dashboard" && $row["permission"] =="R")
   {
    $permissionResult = "valid";
    break;
   }

   if($row["object"] =="Dashboard" && $row["permission"] =="ALL")
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Dashboard</h3>
       <hr>
        <br/>
       
        <br/>
      
   <div class="row justify-content-center">    

        <div class="card border-secondary mb-3 m-5 w-100" >
  <div class="card-header">Statistics By Category</div>
  <div class="card-body text-secondary">
  
  <table class="carDataTable table-hover">
      <thead>
      <tr>
          <td> Category </td>
          <td> Total </td>
     </tr>
   </thead>
   <tbody>
       <?php

       $sql = "select DISTINCT(`category`) from `it_assets`";
       $result = $conn->query($sql);
                     while($row = $result->fetch_array(MYSQLI_ASSOC))
                     {
                        echo("<tr>");
                        echo("<td>".$row["category"]."</td>");
                        $sql2 = "SELECT count(id) FROM `it_assets` where `category` ='".$row["category"]."';";
                        $result2 = $conn->query($sql2);
                        $TotalOwnerCars = $result2->fetch_row()[0];
                        echo("<td>".$TotalOwnerCars."</td>");

                        echo("</tr>");
                     }

       ?>
   </tbody>
  </table>   

  </div>
</div>






</div>    

</div>
<!--Work Space-->
</br>

<script src="../../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>