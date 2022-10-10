<?php require("share/session.php"); ?>


<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permission Group Details</title>
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
       <h3> Permission Group Details -   تفاصيل مجموعة الصلاحيات</h3>
       <hr>
       <?php
       if(isset($_GET["id"]))
       {
        $sql = "select * from `permission_group` where `id`=".$_GET["id"].";";
        $result = $conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
       }
        
       ?>

       <table class="carDataTable">
           <thead>
               <tr>
                   <td>ID</td>
                   <td>Permission Group</td>
                   <td>Created by </td>
                   <td>Creation Date </td>
               </tr>
            
           </thead>
           <tbody>
           <tr >
                   <td><?=$row["id"]?></td>
                   <td><?=$row["permission_group"]?></td>
                   <td><?=$row["createdby"]?></td>
                   <td><?=$row["creation_date"]?></td>
               </tr>
           </tbody>
         
       </table>
       <br/>
       <table class="carDataTable">
           <thead>
               <tr>
                   <td>ID</td>
                   <td>module</td>
                   <td>object</td>
                   <td>permission</td>
               </tr>
           </thead>
           <tbody>
               <?php
               $sql = "select * from `permission` where `permission_group_id` =".$_GET["id"].";";
               $result = $conn->query($sql);
               while($row = $result ->fetch_array(MYSQLI_ASSOC))
               {
                   echo("<tr>");
                   echo("<td>".$row["id"]."</td>");
                   echo("<td>".$row["module"]."</td>");
                   echo("<td>".$row["object"]."</td>");
                   echo("<td>".$row["permission"]."</td>");
                   echo("</tr>");
               }
               ?>
           </tbody>
       </table>
     

      </div>
    
  <!------------------------->





  
  
    




     
<!--Work Space-->



<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
<?php
$conn->close();
?>