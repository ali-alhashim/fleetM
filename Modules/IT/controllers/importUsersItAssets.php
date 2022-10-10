<style> 
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
</style>
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
            $receivedDate = date('Y-m-d', $date);
        }
        else
        {
          $receivedDate = "";
        }

        if(isset($data[20]))
        {
            $date = strtotime($data[20]);
            $handoverDate = date('Y-m-d', $date);

            if($handoverDate=="1970-01-01")
            {
                $handoverDate ="0000-00-00";
            }
        }
        else
        {
            $handoverDate ="";
        }
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); //id
        echo("<td>".$data[1]."</td>"); //serial Number
        echo("<td>".$receivedDate."</td>"); //AcquiredDate
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
        echo("<td>".$handoverDate."</td>"); //RetiredDate
        echo("<td>".$data[21]."</td>"); //RetiredCondition
        echo("<td>".$data[22]."</td>"); //Retired Condition [ this empty]
        echo("<td>".$data[23]."</td>"); //OldLocation
        echo("<td>".$data[24]."</td>"); //Attachments
        echo("<td>".$data[25]."</td>"); //Note
       

      
        $sql = "select `id` from `it_assets` where `serial_number` = '".$data[1]."';";
        $resultA = $conn->query($sql);
        $rowA = $resultA->fetch_array(MYSQLI_ASSOC);

        $sql = "select `full_name`, `id` from `users` where `email` = '".$data[4]."' ;";
        $resultU = $conn->query($sql);
        $rowU = $resultU->fetch_array(MYSQLI_ASSOC);


        if(isset($rowU["full_name"]))
        {
            $fullName = $rowU["full_name"];
        }
        else
        {
            $fullName = $data[3];
        }

        if(isset($rowU["id"]))
        {
            $idU = $rowU["id"];
        }
        else
        {
            $idU =0;
        }
       
       
       
        
       $sql = "insert IGNORE into `it_users_assets` (`asset_id`, `user_name`, `user_id`, `email`, `received_date`,  `handover_date`, `serial_number`, `location`, `department`, `category`, `manufacture`, `model`, `condition`, `computer_name`, `description`, `prepared_by`, `checked_by`, `note`) values 
       (
          '".$rowA["id"]."', 
          '".$fullName."',
          '".$idU."',
          '".$data[4]."',
          '".$receivedDate."',
          '".$handoverDate."',
          '".$data[1]."',
          '".$data[5]."',
          '".$data[6]."',
          '".$data[7]."',
          '".$data[8]."',
          '".str_replace("'","",$data[9])."',
          '".$data[11]."',
          '".$data[12]."',
          '".$data[15]."',
          '".$data[16]."',
          '".$data[17]."',
          '".str_replace("'", "",$data[25])."'
       )";

        $conn->query($sql);



    


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>