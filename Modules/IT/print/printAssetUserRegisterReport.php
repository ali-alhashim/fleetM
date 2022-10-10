<?php require("../../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset User Register Report</title>
   
    <link href="../../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

    <link rel="stylesheet" href="ReportStyle.css">

    <style>@page { size: A4 }</style>

</head>
<body>


<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->

    <img src="../../../<?=$SystemLogo?>" class="logo"/>
    <br/>
    <div class="page-title">Asset User Register Report  </div>
    <hr>
    
    <table class="carTable">
        <thead>
            <tr>
                <td class="hidecolumns">#</td>
                <td class="hidecolumns">ID </td>
                <td>asset ID </td>
                <td class="hidecolumns">Creation Date</td>
                <td>User Name  </td>
                <td>User ID</td>
                <td>Email </td>
                <td class="hidecolumns">Location  </td>
                <td>Department</td>
                <td>Category</td>
                <td>Description</td>
                <td>Received Date</td>
                <td>Handover Date</td>
            </tr>
        </thead>
        <tbody>
            <?php

         //UserName, UserDepartment, UserEmail, received_date, category

            $filterCounter =0;

            if($_POST["UserName"] !="All" or $_POST["UserDepartment"] !="All" or $_POST["UserEmail"] !="All" or $_POST["received_date"] !="All" or $_POST["category"] !="All")
            {
                $search = " where ";
            }
            else
            {
                $search =" ";
            }
           

            if($_POST["UserName"] !="All")
            {
                $search = $search. "  `user_name` like '".$_POST["UserName"]."%' ";

                $filterCounter ++;
            }


            if($_POST["UserDepartment"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `department` ='".$_POST["UserDepartment"]."' ";
                $filterCounter ++;
            }


            if($_POST["UserEmail"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `email` ='".$_POST["UserEmail"]."' ";
                $filterCounter ++;
            }



            if($_POST["received_date"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `received_date` ='".$_POST["received_date"]."' ";
                $filterCounter ++;
            }


            if($_POST["category"] !="All")
            {
                if( $filterCounter>0)
                {
                    $search = $search." and ";
                }
                $search = $search. "  `category` ='".$_POST["category"]."' ";
                $filterCounter ++;
            }


            
            
           

            $counter =1;
            $sql = "select * from `it_users_assets` $search  order by `received_date` DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_array(MYSQLI_ASSOC))
            {
                
                


                echo'
                <tr>
                
                <td class="hidecolumns">'.$counter.'</td>
                <td class="hidecolumns">'.$row["id"].'</td>
                <td>'.$row["asset_id"].'</td>
                <td class="hidecolumns">'.$row["creation_date"].'</td>
                <td>'.$row["user_name"].'</td>
                <td>'.$row["user_id"].'</td>
                <td>'.$row["email"].'</td>
                <td class="hidecolumns">'.$row["location"].'</td>
                <td>'.$row["department"].'</td>
                <td>'.$row["category"].'</td>
                <td>'.$row["description"].'</td>
                <td>'.$row["received_date"].'</td>
                <td>'.$row["handover_date"].'</td>
            </tr>
                ';
                $counter++;
            }
            ?>
          
        </tbody>
    </table>

<br/>
    

  </section>

  
  <form action="AssetUserReportCSV.php" method="post">
  <input type="hidden" value="<?=$search?>" name="sql"/>
  <input type="submit" style="background:#DEB887; padding:10px; margin:20px; text-decoration:none; color:black; border-radius:5px"value="Download CSV"> 
  </form>

  <br/>
  <br/>

</body>
</html>