
<?php require("share/session.php"); ?>

<?php



if(isset($_POST["ModuleList"]))
{
    if($_POST["ModuleList"] == "IT")
    {
        echo("IT");
        header("location: Modules/IT/index.php");
    }
}

?>






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
    <title>Dashboard</title>
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
       <h3>Dashboard - لوحة المعلومات</h3>
       <hr>
        <br/>
       
        <br/>
      
       <hr>

       <div class="accordion" id="accordionExample">
	
		<div class="card">
			<div class="card-header">
				<button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseOne">
                Cars Statistics by Owner - مجموع المركبات حسب المالك
				</button>
			</div>
			<div class="collapse show" id="collapseOne" data-parent="#accordionExample">
				<div class="card-body">

                <table class="carDataTable ">
              <thead>
                 
                  <tr class="bg-dark">
                     
                      <td>Owner Name </br> أسم المالك</td>
                      <td>Cars Total<br/> مجموع المركبات </td>
                  
                  </tr>
              </thead>
              <tbody>
                

                  <?php
                     $sql = "select DISTINCT(`owner_name`) from `cars`;";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_array(MYSQLI_ASSOC))
                     {
                        echo("<tr>");
                        echo("<td>".$row["owner_name"]."</td>");
                        $sql2 = "SELECT count(id) FROM `cars` where `owner_name` ='".$row["owner_name"]."';";
                        $result2 = $conn->query($sql2);
                        $TotalOwnerCars = $result2->fetch_row()[0];
                        echo("<td>".$TotalOwnerCars."</td>");

                        echo("</tr>");
                     }
                  ?>

                  

                  <tr>
                     
                      <td> All - المجموع </td>
                      <?php
                 $sql = "SELECT count(id) FROM `cars` ;";
                 $result = $conn->query($sql);
                 $TotalAllCars = $result->fetch_row()[0];
                 echo("<td>". $TotalAllCars."</td>");
                 ?>
                  </tr>


              </tbody>
                </table>



				</div>
			</div>
		</div>
		
		<div class="card">
			<div class="card-header">
				<button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseTwo">
                Cars Statistics by Accessories - مجموع المركبات حسب الإضافات
				</button>
			</div>
			<div class="collapse" id="collapseTwo" data-parent="#accordionExample">
				<div class="card-body">
                <table class="carDataTable ">
              <thead>
                 
                  <tr class="bg-dark">
                      <td>SN</td>
                      <td>Accessories Name </br> أسم الإضافة</td>
                      <td>Cars Total<br/> مجموع المركبات </td>
                  
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>GPS</td>
                      <?php
                 $sql = "SELECT count(id) FROM `cars` where `gps_tracking` = 1 ;";
                 $result = $conn->query($sql);
                 $TotalAllCars = $result->fetch_row()[0];
                 echo("<td>". $TotalAllCars."</td>");
                 ?>
                  </tr>


                  <tr>
                      <td>2</td>
                      <td>Fuel Chip</td>
                      <?php
                 $sql = "SELECT count(id) FROM `cars` where `fuel_chip` = 1 ;";
                 $result = $conn->query($sql);
                 $TotalAllCars = $result->fetch_row()[0];
                 echo("<td>". $TotalAllCars."</td>");
                 ?>
                  </tr>


                


              </tbody>
                </table>

				</div>
			</div>
		</div>




		
		<div class="card">
			<div class="card-header">
				<button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapseThree">
                Cars Statistics by Status Documents - مجموع المركبات حسب حالة المستندات 
				</button>
			</div>
			<div class="collapse" id="collapseThree" data-parent="#accordionExample">
				<div class="card-body">
                <table class="carDataTable ">
              <thead>
                 
                  <tr class="bg-dark">
                      <td>SN</td>
                      <td>Document </br> أسم الوثيقة</td>
                      <td>Cars Total<br/> مجموع المركبات </td>
                  
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>1</td>
                      <td>Expired Registration License  [Working]<br/> رخصة السير المنتهيه</td>
                      <?php
                       date_default_timezone_set('Asia/Riyadh');
                       $counter =0;
                      $sql = "select `registration_expiration`, `id` from `cars` where `car_status` = 'Working';";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_array(MYSQLI_ASSOC))
                      {
                         $today = date("Y-m-d");

                         if($today > $row["registration_expiration"])
                         {
                            $counter++;
                         }

                      }
                      ?>
                      <td><?=$counter?></td>


                    </tr>
                    <tr>

                      <td>1</td>
                      <td>Valid Registration License  [Working]<br/> رخصة السير ساريه</td>
                      <?php
                       date_default_timezone_set('Asia/Riyadh');
                       $counter =0;
                      $sql = "select `registration_expiration`, `id` from `cars` where `car_status` = 'Working';";
                      $result = $conn->query($sql);
                      while($row = $result->fetch_array(MYSQLI_ASSOC))
                      {
                         $today = date("Y-m-d");

                         if($today < $row["registration_expiration"])
                         {
                            $counter++;
                         }

                      }
                      ?>
                      <td><?=$counter?></td>
                  </tr>


                  


                


                


              </tbody>
                </table>
				</div>
			</div>
		</div>



        <div class="card">
			<div class="card-header ">
				<button class="btn btn-akhBule w-100" data-toggle="collapse" data-target="#collapse4th">
                Cars Statistics by Status - مجموع المركبات حسب الحالة
				</button>
			</div>
			<div class="collapse" id="collapse4th" data-parent="#accordionExample">
				<div class="card-body">
                <table class="carDataTable ">
              <thead>
                 
                  <tr class="bg-dark">
                      
                      <td>Status </br>  الحالة</td>
                      <td>Cars Total<br/> مجموع المركبات </td>
                  
                  </tr>
              </thead>
              <tbody>
              

                    

                  <?php
                     $sql = "select DISTINCT(`car_status`) from `cars`;";
                     $result = $conn->query($sql);
                     while($row = $result->fetch_array(MYSQLI_ASSOC))
                     {
                        echo("<tr>");
                        echo("<td>".$row["car_status"]."</td>");
                        $sql2 = "SELECT count(id) FROM `cars` where `car_status` ='".$row["car_status"]."';";
                        $result2 = $conn->query($sql2);
                        $TotalOwnerCars = $result2->fetch_row()[0];
                        echo("<td><a class='btn btn-info w-50' href='carsData.php?SearchBy=status&SearchKey=".$row["car_status"]."&perPage=ALL'>".$TotalOwnerCars."</a></td>");

                        echo("</tr>");
                     }
                  ?>


                  


                


              </tbody>
                </table>

				</div>
			</div>
		</div>

      
		
	</div><!-- .accordion -->


         <!-- statics-->
         <div class="statics">


            <!--------->
        
<!--------------->


  

  








<!--------------->



          
      

        

        


    </div>
<!--Work Space-->
</br>

<script src="frameworks/jquery/dist/jquery.min.js"></script>
<script src="frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

<?php
$conn->close();
?>