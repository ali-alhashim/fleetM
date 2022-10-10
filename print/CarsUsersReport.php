<?php

// userID, full_name, Department, heHasCar
require("../share/session.php");

if(isset($_POST["heHasCar"]))
{
  //echo("he has car");

  if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to show user report

    $heHasCar ="yas";
    
}


}
else
{
   //echo("without Car");
}

?>

<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars users report</title>
   
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

    <link rel="stylesheet" href="ReportStyle.css">

    <style>@page { size: A4 }</style>

</head>
<body >


<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->

    <img src="../<?=$SystemLogo?>" class="logo"/>
    <br/>
    <div class="page-title">Fleet Managment <br/> Car Users Report - بيانات مستخدمين المركبات</div>
    <hr>
    
    
       
        
            <?php

            $count =1;
           

                   $sql = "select * from car_users ;";
                   $result = $conn->query($sql);
                   while($row = $result->fetch_array(MYSQLI_ASSOC))
                   {

                   echo '
                   '.$count.'
                   <table class="carTable">
                   <thead>

                   
                       
                       <td>ID </td>
                       <td>Brand <br/> الشركة المصنعة</td>
                       <td>Model <br/> طراز المركبة</td>
                       <td>Year of make <br/>  سنة الصنع</td>
                       <td>Plate Number  <br/>  رقم اللوحة </td>
                       <td>serial number  <br/>   الرقم التسلسلي </td>
                       <td> note <br/> ملاحظات</td>
                   </tr>
               </thead>
               <tbody>';

                    $sql = "select * from cars where `id` = ".$row["car_id"]." ;";
                    $resultx = $conn->query($sql);
                    $rowC = $resultx->fetch_array(MYSQLI_ASSOC);

                    echo'<tr>
                    
                    <td>'.$rowC["id"].'</td>
                    <td>'.$rowC["brand"].'</td>
                    <td>'.$rowC["model"].'</td>
                    <td>'.$rowC["year_make"].'</td>
                    <td>'.$rowC["plate_number"].'</td>
                    <td>'.$rowC["serial_number"].'</td>
                    <td>'.$rowC["note"].'</td>
                    </tr>
                   
                    '; 
                     $sql = "select `badge_number` from `users` where `id` =".$row["driver_id"].";";
                     $resultU = $conn->query($sql);
                     $rowU = $resultU->fetch_array(MYSQLI_ASSOC);
                    echo '
                  
                    <thead>
                         <tr>
                        
                         <td>ID</td>
                         <td colspan="2">Driver Name</td>
                         <td> Badge Number </td>
                         <td>Department</td>
                         <td>Recevied Date</td>
                         <td>handover Date</td>
                         </tr>
                         </thead>

                         <tbody>
                         <tr>
                        
                         <td>'.$row["driver_id"].'</td>
                         <td colspan="2">'.$row["driver_name"].'</td>
                         <td><b>'.$rowU["badge_number"].'</b></td>
                         <td>'.$row["department"].'</td>
                         <td>'.$row["received_date"].'</td>
                         <td>'.$row["handover_date"].'</td>
                         </tr>


                        
                         </tbody>
                         </table>
                         <br/>
                    ';


                    

                  
                    $count++;


                   


                   

                   }


          
            ?>
           
      

<br/>
    

  </section>

</body>
</html>