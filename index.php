<?php

session_start();

if(isset( $_SESSION["session"]))
{
    if( $_SESSION["session"] == "valid")
    {
        header("Location:dashboard.php");
    }
    else
    {
        session_destroy();
    }
}

?>
<?php require("share/key.php"); ?>

<!DOCTYPE html>
<html lang="en">
     <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login C-Panel</title>
    <link rel="stylesheet" href="frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">

    <div class="container d-flex  text-center justify-content-center h-100 align-items-center">

  
     <div class=" bg-light  text-center justify-content-center  p-5 loginBox">
         <img src="<?=$SystemLogo?>" width="100" class="m-5"/>

         <form class="group-control p-5" action="dashboard.php" method="post">

           <select class="form-control w-100" name="ModuleList">

              <option value="Fleet">   Fleet Managment - نظام إدارة المركبات </option>
              <option value="IT">   IT Managment - نظام إدارة تقنية المعلومات </option>
              <option value="GOV">   GOV Managment - نظام إدارة  العلاقات الحكومية </option>
              <option value="HR">   HR - نظام إدارة   الموارد البشرية </option>
              <option value="Worksho">   Workshop Managment - نظام إدارة  الورش </option>
           </select>
     

      
             <input type="text"     name="email"  class="form-control mb-2 " placeholder="Email -  البريد الإلكتروني" required/>
             <input type="password" name="password" class="form-control mb-2 " placeholder="Password - كلمة المرور" required/>
             <input type="submit" value="Login - دخول" class="btn form-control btn-akhBule"/>
         </form>

         <hr>
   


         <?php
        date_default_timezone_set('Asia/Riyadh');

         echo(date("Y-m-d h:i:s A"));
         ?>

     </div>
 




    </div>


<script src="../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>