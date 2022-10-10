<?php require("../../../share/session.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!----Created By Ali alhashim----->
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Report</title>
   
    <link href="../../../gallery/favicon.ico" rel="shortcut icon" type="image/x-icon">
   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">

    <link rel="stylesheet" href="../../../print/ReportStyle.css">
    <script src="../../../frameworks/jquery/dist/jquery.min.js"></script>
    <script src="../../../frameworks/qrcode/qrcode.min.js"></script>

    <style>@page { size: A4 }</style>

</head>
<body >


<section class="sheet padding-10mm">

    <!-- Write HTML just like a web page -->

    <img src="../../../<?=$SystemLogo?>" class="logo"/>
    <br/>
    <?php
   $sql = "select * from `it_users_assets` where `id` = ".$_GET["id"].";";
   $resultH = $conn->query($sql);
   $rowH = $resultH->fetch_array(MYSQLI_ASSOC)
    ?>
    <div class="page-title">Asset Register #:<b> <?=$rowH["id"]?></b> [Print Date : <?=date("Y-m-d")?>]</div>
    <hr>
    <br/>
    <table class="carTable">
        <tr>
            <td colspan="2" style="background:#DCDCDC !important">User Information</td>
       </tr>
       <tr>
           <td style="text-align:left !important">Name :</td> <td style="text-align:left !important"><?=$rowH["user_name"]?></td>
       </tr>
       <tr>
       <td style="text-align:left !important">Email :</td> <td style="text-align:left !important"><?=$rowH["email"]?></td>
       </tr>

       <tr>
       <td style="text-align:left !important">Location :</td> <td style="text-align:left !important"><?=$rowH["location"]?></td>
       </tr>

       <tr>
       <td style="text-align:left !important">Department :</td> <td style="text-align:left !important"><?=$rowH["department"]?></td>
       </tr>

     

  
        <tr>
            <td colspan="2" style="background:#DCDCDC !important">IT Asset Information</td>
       </tr>
       <tr>
           <td style="text-align:left !important">Asset ID :</td> <td style="text-align:left !important"><?=$rowH["asset_id"]?></td>
       </tr>
       <tr>
           <td style="text-align:left !important">Serial Number :</td> <td style="text-align:left !important"><?=$rowH["serial_number"]?></td>
       </tr>
       <tr>
       <td style="text-align:left !important">Category :</td> <td style="text-align:left !important"><?=$rowH["category"]?></td>
       </tr>

       <tr>
       <td style="text-align:left !important">Model :</td> <td style="text-align:left !important"><?=$rowH["model"]?></td>
       </tr>

       <tr>
       <td style="text-align:left !important">Manufacture :</td> <td style="text-align:left !important"><?=$rowH["manufacture"]?></td>
       </tr>

       <tr>
       <td style="text-align:left !important">Description :</td> <td style="text-align:left !important"><?=$rowH["description"]?></td>
       </tr>

     

    </table>
    
   

    <hr>

    <table class="carTable">
    

       <tr style="background:#DCDCDC !important">
        <td>Prepared by</td>
        <td>Checked and approved by</td>
        <td>Received by</td>
       
       </tr>

       <tr>
           <td style="height:60px !important"></td>
           <td></td>
           <td></td>
         
        </td>
    </table>

    <hr>
    <br/>
    <div style="width:100%;text-align: center !important;">
    <div id="qrcode" style="width:90px;height:90px;margin:15px"></div>
    </div>
    <br/>
    <br/>

    <script>
        var qrcode = new QRCode("qrcode",{
            width: 128,
    height: 128,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
        });

        let textCode = "Asset ID:<?=$rowH["asset_id"]?> \n"+
                       "Asset Register:<?=$rowH["id"]?> \n"+
                       "User ID:<?=$rowH["user_id"]?>\n"+
                       "Creation Date:<?=$rowH["creation_date"]?>\n";
                      
        qrcode.makeCode(textCode);
    </script>

<br/>
    

  </section>

</body>
</html>