<?php require("../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Details</title>
    <link rel="stylesheet" href="../../frameworks/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../share/site.css"/>
    <link href="gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-dark " stytle="height: 100vh">

<!--Main Menu-->
<?php include("share/mainMenu.php"); ?>
<!--End Main Menu -->

<!--Work Space-->

    <div class="container-fluid bg-light" id="WorkSpace">
    <br/>
       <h3>IT Supplier Details </h3>
     
       

       

        
       <?php 
                          $sql = "select * from `it_supplier` where `id` =".$_GET['id'].";";
                          $result = $conn->query($sql);
                          $row = $result->fetch_array(MYSQLI_ASSOC);
                   ?>



              <hr>


           
         <!-- Car information Table-->
         <form method="POST" action="controllers/updateSupplier.php" enctype="multipart/form-data">
        
          <table class="carDataTable ">
              <thead>
                  <tr >
                    
                      <td colspan="2"><h5>Supplier Information</h5></td>
                   
                  
                  </tr>
              </thead>
              <tbody>

                  <tr>
                      <td class="text-left ">ID</td>
                      <td><input type="text" name="supplierID" class="form-control" value="<?php echo($_GET['id']); ?>" readonly /></td> 
                  </tr>

                


                  


                  <tr>
                      <td class="text-left ">Supplier Name      </td>
                      <td><input type="text" class="form-control" value="<?=$row["supplier_name"]?>" name="supplier_name"/></td>
                  </tr>


                  <tr>
                      <td class="text-left ">Website     </td>
                      <td>
                          <input type="text" class="form-control" value="<?=$row["website"]?>"  name="website"/>
                          <a target="_blank" href="<?=$row["website"]?>">open website </a>
                     </td>
                  </tr>


                  <tr>
                      <td class="text-left ">contact name  </td>
                      <td><input type="text" class="form-control" value="<?=$row["contact_name"]?>" name="contact_name"/></td>
                  </tr>



               


                  <tr>
                      <td class="text-left ">contact email   </td>
                      <td><input type="text" class="form-control" value="<?=$row["contact_email"]?>" name="contact_email"/></td>
                  </tr>


                

               

               




                 


                  

                    
                  <tr>
                      <td class="text-left ">contact_mobile</td>
                      <td><input type="text" class="form-control" value="<?=$row["contact_mobile"]?>" name="contact_mobile"/></td>
                  </tr>

                




                  


                  

                 


                  <tr>
                     <td class="text-left ">address  </td>
                      <td><input type="text" class="form-control" value="<?=$row["address"]?>" name="address"/></td>
                  </tr>


                  


                  <tr>
                      <td class="text-left "> due_payment </td>
                      <td>
                         
                          <input type="text" id="statusList" class="form-control" value="<?=$row["due_payment"]?>" name="due_payment"/>
                             
                      </td>
                  </tr>


                  <tr>
                      <td class="text-left ">payment_terms</td>
                      <td>
                         
                          <input type="text" id="response" class="form-control" value="<?=$row["payment_terms"]?>" name="payment_terms"/>
                             
                      </td>
                  </tr>



                  <tr>
                      <td class="text-left "> C.R. Number </td>
                      <td>
                         
                          <input type="text" id="statusList" class="form-control" value="<?=$row["cr_number"]?>" name="cr_number"/>
                             
                      </td>
                  </tr>

                  <tr>
                      <td class="text-left "> VAT. Number </td>
                      <td>
                         
                          <input type="text" id="statusList" class="form-control" value="<?=$row["vat_id"]?>" name="vat_id"/>
                             
                      </td>
                  </tr>

                 




                  


              </tbody>
          </table>
        
         <hr>




          

        



          <!--footer of table-->
          <div class="row m-3">
             <div class="col-6 text-left">

             
             
             </div>

             <div class="col-6 text-right">
                 

            
            <button class="btn btn-success m-1"><i class="fa-solid fa-floppy-disk"></i> <br/>update  </button>
            </form>

                 
             </div>
        
         </div>
         <!------------------->
     <hr>

   


    </div>
<!--Work Space-->
<br/>


<script src="../../frameworks/jquery/dist/jquery.min.js"></script>
<script src="../../frameworks/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>