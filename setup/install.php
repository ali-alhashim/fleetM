

<!DOCTYPE html>
<html lang="en">
     <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Install</title>
    <link rel="stylesheet" href="../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark" stytle="height: 100vh">

    <div class="container d-flex  text-center justify-content-center  align-items-center">

  
     <div class=" bg-light  text-center justify-content-center  p-5 loginBox">


     <?php 

   // Create Database 
    $mysqli = new mysqli($_POST['serverAddress'], $_POST['username'], $_POST['password']);

    if ($mysqli->query("CREATE DATABASE IF NOT EXISTS ".$_POST["databaseName"] .";")) {
        printf("Database ".$_POST["databaseName"]." created successfully.<hr>");


        //---------upload SystemLogo to [gallery folder]
        if(isset($_FILES['SystemLogo']))
        {
         if (move_uploaded_file($_FILES["SystemLogo"]["tmp_name"], "../gallery/".$_FILES["SystemLogo"]["name"])) 
         {
           
           
            $SystemLogo = "gallery/".$_FILES["SystemLogo"]["name"];
           
         }
         else
         {
            $SystemLogo = "";
         }
        }
        //----------------------------------------------


          // create share/key.php 
          
          $myfile = fopen("../share/key.php", "w");
          fwrite($myfile,"<?php \n");
          fwrite($myfile,"\$serverAddress =\"".$_POST['serverAddress']."\";\n");
          fwrite($myfile,"\$username =\"".$_POST['username']."\";\n");
          fwrite($myfile,"\$password =\"".$_POST['password']."\";\n");
          fwrite($myfile,"\$database =\"".$_POST['databaseName']."\";\n");
          fwrite($myfile,"\$port =\"".$_POST['port']."\";\n");
          fwrite($myfile,"\$SystemLogo =\"". $SystemLogo."\";\n");
          fwrite($myfile,"?>");
          fclose($myfile);
       

     }






     ?>


    <!----------import the files ------>
    <?php require("../share/connection.php"); ?>


         
    <!------------- Create users table ------------>
     <?php require("database/users.php"); ?>
      
     <!------------- Create permission group table -------->
     <?php require("database/permission_group.php"); ?>

     <!------------- Create permission table ---------->
     <?php require("database/permissions.php"); ?>

       <!------------- Create Cars table ---------->
       <?php require("database/cars.php"); ?>

       <!------------- Create Car users table ---------->
       <?php require("database/car_users.php"); ?>

           <!------------- Create Company table ---------->
           <?php require("database/company.php"); ?>

           <!------------- Create Department table ---------->
           <?php require("database/department.php"); ?>


             <!------------- Create insurance table ---------->
             <?php require("database/insurance.php"); ?>

             <!------------- Create car Accident table ---------->
             <?php require("database/car_accident.php"); ?>

             <!------------- Create log table ---------->
             <?php require("database/log.php"); ?>

               <!------------- Create  Requests for cars table ---------->
               <?php require("database/requestes_for_cars.php"); ?>

                 <!------------- Create  Sold  cars table ---------->
                 <?php require("database/sold_cars.php"); ?>


                  <!------------- Create  notifcations table ---------->
                  <?php require("database/notifcations.php"); ?>




                    <!------------- IT Module Tables ---------->

                      <!------------- Create  IT Assets table ---------->
                      <?php require("database/it_assets.php"); ?>
                      <?php require("database/it_users_assets.php"); ?>

                      <?php require("database/it_requests.php"); ?>

                      <?php require("database/it_suppliers.php"); ?>

                      <!-- PO Table -->
                      <?php require("database/it_po.php"); ?>
                      <?php require("database/it_po_line.php"); ?>
                      <!-- invoice Table -->
                      <?php require("database/it_invoice.php"); ?>
                      <?php require("database/it_invoice_line.php"); ?>
                      <?php require("database/payment_receipt.php"); ?>
                      <?php require("database/payment_receipt_line.php"); ?>
                      
                      <?php require("database/it_asset_maintenance.php"); ?>
                      <!-- Delivery Note Table -->
                      <?php require("database/delivery_note.php"); ?>
                      <?php require("database/delivery_note_line.php"); ?>


                      <!-------------------HR-------------------------------> 
                      
                      <?php require("database/attendance_device.php"); ?>
                      <?php require("database/users_calendar.php"); ?>
                      <!---------------------------------------------------->
                     


       <!----------------Back Button-------------------->
       <hr>
       <a class="btn btn-akhBule" href="../index.php">Login</a>
       <hr>
     </div>
    </div>


<script src="../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>