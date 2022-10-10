<?php require("../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Report</title>
   
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
    <div class="page-title">Fleet Managment <br/> Employees Report - تقرير الموظفين</div>
    <hr>
    
    <table class="carTable">
        <thead>
            <tr>
                <td>#</td>
                <td class="hidecolumns">ID</td>
                <td class="hidecolumns">badge_number </td>
                <td>full_name </td>
                <td class="hidecolumns">arabic_name   </td>
                <td>gov_id </td>
                <td>mobile_number</td>
                <td> department </td>
                <td class="hidecolumns">email</td>
                <td>nationality</td>
                <td>date_of_birth</td>
            </tr>
        </thead>
        <tbody>
            <?php

            

            
         
           

            $counter =1;
            $sql = "select * from `users`    order by `date_of_birth` DESC ";
            $result = $conn->query($sql);
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
               
                


                echo'
                <tr >
                
                <td>'.$counter.'</td>
                <td class="hidecolumns">'.$row["id"].'</td>
                <td>'.$row["badge_number"].'</td>
                <td class="hidecolumns">'.$row["full_name"].'</td>
                <td>'.$row["arabic_name"].'</td>
                <td>'.$row["gov_id"].'</td>
                <td>'.$row["mobile_number"].'</td>
                <td class="hidecolumns">'.$row["department"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["nationality"].'</td>
                <td>'.$row["date_of_birth"].'</td>
            </tr>
                ';
                $counter++;
            }
            ?>
          
        </tbody>
    </table>

<br/>
    

  </section>

</body>
</html>