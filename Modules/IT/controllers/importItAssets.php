<table>

<?php
require("../../../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

 


$csvFilePath = "../../../uploads/CSV/Assets.csv";




$row = 1;
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        if(isset($data[2]))
        {
            $date = strtotime($data[2]);
            $AcquiredDate = date('Y-m-d', $date);
        }
        else
        {
            $AcquiredDate = "";
        }
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); //id
        echo("<td>".$data[1]."</td>"); //serial Number
        echo("<td>".$AcquiredDate."</td>"); //AcquiredDate
        echo("<td>".$data[3]."</td>"); //Name
        echo("<td>".$data[4]."</td>"); //Email
        echo("<td>".$data[5]."</td>"); //location
        echo("<td>".$data[6]."</td>"); //Department
        echo("<td>".$data[7]."</td>"); //Category
        echo("<td>".$data[8]."</td>"); //Manufacturer
        echo("<td>".$data[9]."</td>"); //Model
        echo("<td>".$data[10]."</td>"); //Supplier
        echo("<td>".$data[11]."</td>"); //Condition
        echo("<td>".$data[12]."</td>"); //ComputerName
        echo("<td>".$data[13]."</td>"); //PO
        echo("<td>".$data[14]."</td>"); //InvoiceNumber
        echo("<td>".$data[15]."</td>"); //Description
        echo("<td>".$data[16]."</td>"); //InstalledBy
        echo("<td>".$data[17]."</td>"); //CheckedBy
        echo("<td>".$data[18]."</td>"); //PurchasePrice
        echo("<td>".$data[19]."</td>"); //Retired Date [this empty]
        echo("<td>".$data[20]."</td>"); //RetiredDate
        echo("<td>".$data[21]."</td>"); //RetiredCondition
        echo("<td>".$data[22]."</td>"); //Retired Condition [ this empty]
        echo("<td>".$data[23]."</td>"); //OldLocation
        echo("<td>".$data[24]."</td>"); //Attachments
        echo("<td>".$data[25]."</td>"); //Note
       

      
        //insert to it_assets table
        
       $sql = "insert IGNORE into `it_assets` (`asset_date`, `po_id`, `supplier_name`, `invoice_number`, `serial_number`, `location`, `department`, `category`, `manufacture`, `model`, `condition`, `description`, `purchased_price`, `note`) values 
       (
          '".$AcquiredDate."', 
          '".$data[13]."',
          '".$data[10]."',
          '".$data[14]."',
          '".$data[1]."',
          '".$data[5]."',
          '".$data[6]."',
          '".$data[7]."',
          '".str_replace("'", "",$data[8])."',
          '".str_replace("'", "",$data[9])."',
          '".str_replace("'", "", $data[11])."',
          '".$data[15]."',
          '".$data[18]."',
          '". str_replace("'", "", $data[25]) ."'
       )";

        $conn->query($sql);



    


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>