<?php
// Add new IT PO Delivery

require("../../../share/session.php");

// po_id, DeliveryDate, DeliveryAddress, ReceivedBy, note, ID_, itemNo_, itemDescription_, POQuantity_, ReceiveQuantity_
// receivedQuantity_, remaining_quantity_, totalItems, DeliveryID


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to Add PO Delivery Note


   $sql = "insert into `delivery_note` (`id`, `po_id`, `delivery_date`, `delivery_address`, `received_by`, `note`, `total_items`) 
           values(
                   '".$_POST["DeliveryID"]."',
                   '".$_POST["po_id"]."',
                   '".$_POST["DeliveryDate"]."',
                   '".$_POST["DeliveryAddress"]."',
                   '".$_POST["ReceivedBy"]."',
                   '".$_POST["note"]."',
                   '".$_POST["totalItems"]."'
                 );";
     
    $conn->query($sql);


    $count = 1;

    while($count <= $_POST["totalItems"])
    { 
        // insert into Delivery note line table
        $sql = "insert into `delivery_note_line` (`delivery_id`, `item_no`, `description`, `po_quantity`, `delivery_quantity`)
        values(
                '".$_POST["DeliveryID"]."',
                '".$_POST["itemNo_$count"]."',
                '".$_POST["itemDescription_$count"]."',
                '".$_POST["POQuantity_$count"]."',
                '".$_POST["ReceiveQuantity_$count"]."'
              )
        ";
        $conn->query($sql);


        // update po line table for [remaining quantity] and  [Received Quantity]

        $remainingQuantity = $_POST["remaining_quantity_$count"] - $_POST["ReceiveQuantity_$count"] ;

        $sql = "select `received_quantity` from `it_po_line` where po_id = '".$_POST["po_id"]."' and `id` = '".$_POST["ID_$count"]."';";
        $resultZ = $conn->query($sql);
        $rowZ = $resultZ->fetch_array(MYSQLI_ASSOC);
        $receivedQuantity = $_POST["ReceiveQuantity_$count"] + $rowZ["received_quantity"];


        $sql = "update `it_po_line` 
                set
                `remaining_quantity` = '$remainingQuantity',
                `received_quantity` = '$receivedQuantity'
                 where `po_id` = '".$_POST["po_id"]."' and `id` = '".$_POST["ID_$count"]."'
               ";
               $conn->query($sql);

        $count++;
    }



    try
    {
    

          // add action to log table

 $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Added New PO Delivery Note  PO ID # ".$_POST["po_id"]."');";
 $conn->query($sql);

// end adding action


     header("Location: ../PODetails.php?id=".$_POST["po_id"]);

    }
    catch(Exception $e)
    {
      echo($e->getMessage());
    }

}

?>