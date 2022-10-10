<?php require("../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <script src="../../frameworks/jquery/dist/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>Asset Details</h3>
     
       <hr>

       <div class="subNav">
       <div class="row align-items-center justify-content-center">

    
       <button class="btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#SaleThisAssetModal">
            <i class="fa-solid fa-hand-holding-dollar"></i><br/>Sale this Asset    
       </button>  
      


          <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#AddNewUserForThisAssetModal">
             <i class="fa-solid fa-plus "></i><br/>Add New User for this asset<br/>      
           </button>

           <?php require("Modals/AddNewUserForThisAssetModal.php"); ?>

          <button class=" btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#AddAssetMaintenanceModal">
          <i class="fa-solid fa-screwdriver-wrench"></i><br/>Asset Maintenance<br/>    
          </button>

          <?php require("Modals/AddAssetMaintenanceModal.php"); ?>

        

         <button class="  btn btn-info m-2 w-20-300" data-toggle="modal" data-target="#ReceiveAssetFromLastUserModal">
           <i class="fa-solid fa-arrow-rotate-left"></i><br/>Receive Asset From last user <br/>      
         </button>

         <?php require("Modals/ReceiveAssetFromLastUserModal.php"); ?>

</div>
       </div>

        

<hr>

<!--Car photo--->

<?php
$sql = "select * from `it_assets` where `id` = ".$_GET["id"].";";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<form method="POST" action="controllers/EditAsset.php" enctype="multipart/form-data">
<table class="carDataTable">
              <thead>
                  <tr >
                      <td>Asset photo 1</td>
                      <td>Asset photo 2</td>
                      <td>Asset photo 3</td>
                      <td>Asset photo 4</td>
                  </tr>
              </thead>

              <tbody>
              <tr>
                      <td>
                          <img src="<?=$row["asset_photo1"]?>"  class=" carPhoto " alt="..." onclick="window.open(this.src, '_blank');" id="imgFrontPhoto" />

                          <input type="file"  name="frontPhoto" id="frontPhoto" class="form-control p-1" onchange="onFileSelected(event, 'imgFrontPhoto');" />
                      </td>

                      <td>
                          <img src="<?=$row["asset_photo2"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />

                          <input type="file" class="form-control p-1" name="backPhoto"/>
                        </td>

                      <td>
                          <img src="<?=$row["asset_photo3"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1" name="rightPhoto"/>
                        </td>

                      <td>
                          <img src="<?=$row["asset_photo4"]?>" class="carPhoto " onclick="window.open(this.src, '_blank');" />
                          <input type="file" class="form-control p-1" name="leftPhoto"/>
                        </td>
                  </tr>
                  </tbody>
              </table>
              <hr>

         <!-- Car information Table-->

                   <script>
                    function onFileSelected(event, imgID) {
                        
                     var selectedFile = event.target.files[0];
                     var reader = new FileReader();

                     var imgtag = document.getElementById(imgID);
                     imgtag.title = selectedFile.name;

                     reader.onload = function(event) 
                     {
                     imgtag.src = event.target.result;
                     };

                      reader.readAsDataURL(selectedFile);
                    }

                    </script>
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Asset Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td>
                          <input type="text" name="carID" class="form-control" value="<?php echo($_GET['id']); ?>" readonly />
                     </td> 
                  </tr>




                  <tr>
                     <td class="text-left ">creation date</td>
                      <td><input type="text" class="form-control" value="<?=$row["creation_date"]?>" name="creation_date" readonly/></td>
                  </tr>



                  <tr>
                     <td class="text-left ">po id</td>
                      <td><input type="text" class="form-control" value="<?=$row["po_id"]?>" name="po_id"/></td>
                  </tr>



                  <tr>
                      <td class="text-left "> supplier id</td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["supplier_id"]?>"  name="supplier_id"/>
                         
                     </td>

                  </tr>


                  <tr>
                      <td class="text-left "> supplier name</td>
                      <td><input type="text" class="form-control" value="<?=$row["supplier_name"]?>" name="supplier_name"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">invoice number</td>
                      <td><input type="text" class="form-control" value="<?=$row["invoice_number"]?>" name="invoice_number"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Serial Number</td>
                      <td><input type="text" class="form-control"  value="<?=$row["serial_number"]?>" name="SerialNumber"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">location</td>
                      <td><input type="text" class="form-control" value="<?=$row["location"]?>" name="location"/></td>
                  </tr>


                  <tr>
                     <td class="text-left ">department </td>
                      <td><input type="text" class="form-control" value="<?=$row["department"]?>" name="department"/></td>
                  </tr>


                  <tr>
                      <td class="text-left "> category</td>
                      <td><input type="text" class="form-control" value="<?=$row["category"]?>" name="category"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">manufacture</td>
                      <td>
                          <input type="text" class="form-control"   value="<?=$row["manufacture"]?>" name="manufacture"/>
                         
                      </td>
                  </tr>



               


                  <tr>
                      <td class="text-left ">model </td>
                      <td><input type="text" class="form-control"  value="<?=$row["model"]?>" name="InspectionExpiration"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">condition </td>
                      <td><input type="text" class="form-control"  value="<?=$row["condition"]?>" name="condition"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">description</td>
                      <td><input type="text" class="form-control" value="<?=$row["description"]?>" name="description"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">purchased price</td>
                      <td><input type="text" class="form-control" value="<?=$row["purchased_price"]?>" name="purchased_price"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">purchased date</td>
                      <td><input type="text" class="form-control" value="<?=$row["purchased_date"]?>" name="purchased_date"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">asset date</td>
                      <td><input type="text" class="form-control" value="<?=$row["asset_date"]?>" name="asset_date"/></td>
                  </tr>
                   
                  


                  <tr>
                      <td class="text-left ">Note</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>" name="Note"/></td>
                  </tr>




                  


              </tbody>
          </table>
         <hr>
         <!-- end Car Data Table-->



      

      


     




        

            <!---Car Users--->
            <hr>


            <div class="row m-3">

<div class="col-6 text-left">


</div>

<div class="col-6 text-right">
  

</div>


</div>


         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="8"><h5>Asset Users </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>Asset User ID</td>
                      <td>ID</td>
                     
                      <td>Name </td>
                      <td>Email  </td>
                      <td>Department  </td>
                      <td>Received Date  </td>
                      <td>Return Date  </td> 
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php

              $sql = "select *
                      from `it_users_assets` where `asset_id`=".$_GET["id"]." order by `id`    DESC;";
              $result = $conn->query($sql);

              while($row1 = $result->fetch_array(MYSQLI_ASSOC))
              {
                  echo("<tr>");
                  echo('<td><a href="AssetUserDetails.php?id='.$row1["id"].'" class="btn btn-info"> '.$row1["id"].'</a>  </td>');
                  echo('<td><a href="profile.php?id='.$row1["user_id"].'" class="btn btn-info"> '.$row1["user_id"].'</a>  </td>');
                
                 echo("<td>".$row1["user_name"]."</td>");
            
                 echo("<td>".$row1["email"]."</td>");

                
             
                echo("<td>".$row1["department"]."</td>");

                echo("<td>".$row1["received_date"]."</td>");
               
                echo("<td>".$row1["handover_date"]."</td>");
             
                if($row1["asset_url"] !="")
                {
                    echo('<td> <a href="'.$row1["asset_url"].'" class="btn btn-secondary" target="_blank">open [ '.$row1["id"].' ]</a> </td>');
                }
                else
                {
                    echo("<td></td>");
                }
               
            

             echo("</tr>");
              }
                

                 ?>


              </tbody>
         </table>
         <hr>
         <!---end Car users-->

<br/>

         <!--Car Accident-->


         <div class="row">
             <div class="col-6 text-left">
            
             </div>
             <div class="col-6 text-right">
           
             </div>
         </div>
        

         <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="9"><h5>Asset Maintenance  </h5></td>
                   
                  
                  </tr>
                  <tr class="bg-dark">
                      <td>ID</td>
                      <td>Date</td>
                      <td>Description</td>
                      <td>Cost Price</td>
                      <td>Warranty</td>
                      <td>Maintenance By</td>
                   
                      <td><i class="fa-solid fa-link"></i></td>
                  </tr>
              </thead>
              <tbody>

              <?php
                $sql = "select `id`, `maintenance_date`,  `description`, `maintenance_cost`, `warranty`, `maintenance_by`, `maintenance_url` from `it_asset_maintenance` where `asset_id` =".$_GET["id"]." order by `maintenance_date` desc"; 
                        

                $result = $conn->query($sql);
                while($row2 = $result->fetch_array(MYSQLI_ASSOC))
                {
                   echo("<tr>");
                   echo('<td><a href="MaintenanceDetails.php?id='.$row2["id"].'" class="btn btn-info"> '.$row2["id"].'</a></td>');
                   echo("<td>".$row2["maintenance_date"]."</td>");
                   echo("<td>".$row2["description"]."</td>");
                   echo("<td>".$row2["maintenance_cost"]."</td>");
                   echo("<td>".$row2["warranty"]."</td>");
                   echo("<td>".$row2["maintenance_by"]."</td>");
                   
                   echo("<td><a class='btn btn-secondary' href='".$row2["maintenance_url"]."' target='_blank'>open<a/></td>");
                   echo("</tr>");
                }        
              ?>


               
                
             


              </tbody>
         </table>

         <!---->
         <hr>





         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">

             <a class="btn btn-secondary m-1" href="print/printAssetDetails.php?id=<?=$_GET["id"]?>"><i class="fa-solid fa-print"></i> <br/>Print  </a>
             
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update  </button>
            

                 
             </div>
        
         </div>
         <!------------------->
     <hr>


    </div>
<!--Work Space-->
            </form>
            <!--?php require("Modals/SaleThisCarModal.php"); ?-->

<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>