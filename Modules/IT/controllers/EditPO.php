<?php
require("../../../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    // check also he have permission to edit PO 

    $sql = "update `it_po` set
             
             `shipping_address` = '".$_POST["shipping_address"]."',
             `job_title` = '".$_POST["job_title"]."',
             `status` = '".$_POST["status"]."'

              where `id` = '".$_POST["po_id"]."';
           ";
           
           $conn->query($sql);



    $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Edit PO #".$_POST["po_id"]."');";
    $conn->query($sql);

   header("Location: ../PODetails.php?id=".$_POST["po_id"]);

}

?>