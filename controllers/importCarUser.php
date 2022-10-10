<table>

<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

 


$csvFilePath = "../uploads/CSV/AkhCarUsers.csv";





if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      
       
      
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); //   gov id
        echo("<td>".$data[1]."</td>"); //   department
        echo("<td>".$data[2]."</td>"); //   serial number
        echo("<td>".$data[3]."</td>"); //   vid
     


        $sql = "select `id` from `cars` where `serial_number`='".$data[2]."' or `vid` ='".$data[3]."';";
        $result =  $conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        
       
        

        $sql1 = "select `full_name`,`id`, `company`  from `users` where   `gov_id`='".$data[0]."';";
        $result1 =  $conn->query($sql1);
        $row1 = $result1->fetch_array(MYSQLI_ASSOC);
        


        if($row1["full_name"] !=null && $row["id"] !=null)
        {
            $sql2 = " insert IGNORE into `car_users` (`driver_name`, `driver_id`, `car_id`, `department`)
            values(
                    '". $row1["full_name"]."',
                     ".$row1["id"].",
                     ".$row["id"].",
                    '".$data[1]."'); ";



           try
           {
            $conn->query($sql2);
           }
           catch(Exception $e)
           {
               echo($e->getMessage());
           }
           
        }
      


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>