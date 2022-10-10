<?php require("../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars Report</title>
   
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
    <div class="page-title">Fleet Managment <br/> Cars Report - تقرير المركبات</div>
    <hr>
    
    <table class="carTable">
        <thead>
            <tr>
                <td class="hidecolumns">#</td>
                <td class="hidecolumns">ID </td>
                <td>Status </td>
                <td class="hidecolumns">Brand <br/> الشركة المصنعة</td>
                <td>Model <br/> طراز المركبة</td>
                <td>Year of make <br/>  سنة الصنع</td>
                <td>Plate Number  <br/>  رقم اللوحة </td>
                <td class="hidecolumns">Seiral Number  <br/>  الرقم التسلسلي  </td>
                <td>Department  <br/>   القسم  </td>
                <td>Registration expiration <br/> تاريخ إنتهاء الإستمارة</td>
            </tr>
        </thead>
        <tbody>
            <?php

            // carStatus, carDepartment, carBrand, carModel, carYearMake
            // RegistrationExpiration

            $filterCounter =0;

            if( $_POST["carStatus"] !="All" or $_POST["carDepartment"] !="All" or $_POST["carBrand"] !="All" or $_POST["carModel"] !="All" or $_POST["carYearMake"] !="All" or $_POST["RegistrationExpiration"] !="All")
            {
                $search = " where ";
            }
            else
            {
                $search =" ";
            }
           

            if($_POST["carStatus"] !="All")
            {
                $search = $search. "  `car_status` ='".$_POST["carStatus"]."' ";

                $filterCounter ++;
            }


            if($_POST["carDepartment"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `department` ='".$_POST["carDepartment"]."' ";
                $filterCounter ++;
            }


            if($_POST["carBrand"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `brand` ='".$_POST["carBrand"]."' ";
                $filterCounter ++;
            }



            if($_POST["carModel"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `model` ='".$_POST["carModel"]."' ";
                $filterCounter ++;
            }


            if($_POST["carYearMake"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `year_make` ='".$_POST["carYearMake"]."' ";
                $filterCounter ++;
            }


            
            if($_POST["RegistrationExpiration"] !="All")
            {
                date_default_timezone_set('Asia/Riyadh');
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }

                if($_POST["RegistrationExpiration"] =="M1")
                {
                    $dateAfterM1 = strtotime("+1 months",strtotime(date("Y-m-d")));

                    $search = $search. " `registration_expiration` > '".date("Y-m-d")."' and  `registration_expiration` < '".date("Y-m-d",$dateAfterM1)."' ";
                }
                else if($_POST["RegistrationExpiration"] =="M2")
                {
                    $dateAfterM1 = strtotime("+2 months",strtotime(date("Y-m-d")));

                    $search = $search. " `registration_expiration` > '".date("Y-m-d")."' and  `registration_expiration` < '".date("Y-m-d",$dateAfterM1)."' ";
                }
                else if ($_POST["RegistrationExpiration"] =="M3")
                {
                    $dateAfterM1 = strtotime("+3 months",strtotime(date("Y-m-d")));

                    $search = $search. " `registration_expiration` > '".date("Y-m-d")."' and  `registration_expiration` < '".date("Y-m-d",$dateAfterM1)."' ";
                }
                else if($_POST["RegistrationExpiration"] =="Expired")
                {
                    $search = $search. "  `registration_expiration` < '".date("Y-m-d")."' ";
                }
               




                $filterCounter ++;
            }
           

            $counter =1;
            $sql = "select * from `cars` $search  order by `registration_expiration` DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                if($row["registration_expiration"] < date("Y-m-d"))
                {
                    $expired = "class='expired-red'";
                }
                else
                {
                    $expired = "";  
                }
                


                echo'
                <tr '.$expired.'>
                
                <td class="hidecolumns">'.$counter.'</td>
                <td class="hidecolumns">'.$row["id"].'</td>
                <td>'.$row["car_status"].'</td>
                <td class="hidecolumns">'.$row["brand"].'</td>
                <td>'.$row["model"].'</td>
                <td>'.$row["year_make"].'</td>
                <td>'.$row["plate_number"].'</td>
                <td class="hidecolumns">'.$row["serial_number"].'</td>
                <td>'.$row["department"].'</td>
                <td>'.$row["registration_expiration"].'</td>
            </tr>
                ';
                $counter++;
            }
            ?>
          
        </tbody>
    </table>

<br/>
    

  </section>

  
  <form action="CarsReportCSV.php" method="post">
  <input type="hidden" value="<?=$search?>" name="sql"/>
  <input type="submit" style="background:#DEB887; padding:10px; margin:20px; text-decoration:none; color:black; border-radius:5px"value="Download CSV"> 
  </form>

  <br/>
  <br/>

</body>
</html>