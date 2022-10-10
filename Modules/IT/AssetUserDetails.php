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
       <h3>Asset User Details</h3>
     
       <hr>

       <div class="subNav">
       <div class="row align-items-center justify-content-center">

    
       
      


          

        

        

        

</div>
       </div>

        

<hr>

<!--Car photo--->

<?php
$sql = "select * from `it_users_assets` where `id` = ".$_GET["id"].";";
$result = $conn->query($sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
?>
<form method="POST" action="controllers/UpdateAssetUserDetails.php" enctype="multipart/form-data">


         <!-- Car information Table-->

                
         
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Asset User Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td>
                          <input type="text" name="AssetUserID" class="form-control" value="<?php echo($_GET['id']); ?>" readonly />
                     </td> 
                  </tr>


                  <tr>
                      <td class="text-left ">Asset ID</td>
                      <td>
                          <input type="text" name="asset_id" class="form-control" value="<?=$row['asset_id']?>" readonly />
                     </td> 
                  </tr>




                  <tr>
                     <td class="text-left ">creation date</td>
                      <td><input type="text" class="form-control" value="<?=$row["creation_date"]?>" name="creation_date" readonly/></td>
                  </tr>



                 



                

                  <tr>
                      <td class="text-left ">Serial Number</td>
                      <td><input type="text" class="form-control"  value="<?=$row["serial_number"]?>" name="SerialNumber" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">location</td>
                      <td><input type="text" class="form-control" value="<?=$row["location"]?>" name="location" /></td>
                  </tr>


                  <tr>
                     <td class="text-left ">department </td>
                      <td><input type="text" class="form-control" value="<?=$row["department"]?>" name="department" /></td>
                  </tr>


                  <tr>
                      <td class="text-left "> category</td>
                      <td><input type="text" class="form-control" value="<?=$row["category"]?>" name="category" readonly/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">manufacture</td>
                      <td>
                          <input type="text" class="form-control"   value="<?=$row["manufacture"]?>" name="manufacture" readonly/>
                         
                      </td>
                  </tr>



               


                  <tr>
                      <td class="text-left ">model </td>
                      <td><input type="text" class="form-control"  value="<?=$row["model"]?>" name="model" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">condition </td>
                      <td><input type="text" class="form-control"  value="<?=$row["condition"]?>" name="condition"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">description</td>
                      <td><input type="text" class="form-control" value="<?=$row["description"]?>" name="description" readonly/></td>
                  </tr>


                

                  <tr>
                      <td class="text-left ">Received Date</td>
                      <td><input type="text" class="form-control" value="<?=$row["received_date"]?>" name="received_date" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Handover Date</td>
                      <td><input type="date" class="form-control" value="<?=$row["handover_date"]?>" name="handover_date" /></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User Name</td>
                      <td><input type="text" class="form-control" value="<?=$row["user_name"]?>" name="user_name" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User ID</td>
                      <td><input type="text" class="form-control" value="<?=$row["user_id"]?>" name="user_id" readonly/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">User Email</td>
                      <td><input type="text" class="form-control" value="<?=$row["email"]?>" name="email" readonly/></td>
                  </tr>
                   
                  


                  <tr>
                      <td class="text-left ">Note</td>
                      <td><input type="text" class="form-control" value="<?=$row["note"]?>" name="Note"/></td>
                  </tr>

                  <tr>
                      <td class="text-left ">Document</td>
                      <td><input type="file" class="form-control p-1"  name="document"/></td>
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


        





         <!--footer of table-->
         <div class="row m-3">
             <div class="col-6 text-left">

             <a class="btn btn-secondary m-1" href="print/printAssetUserDetails.php?id=<?=$_GET["id"]?>"><i class="fa-solid fa-print"></i> <br/>Print  </a>
             
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