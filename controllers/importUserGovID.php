<table>

<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

 


$csvFilePath = "../uploads/CSV/akhEmail.csv";




$row = 1;
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); //Badge
        echo("<td>".$data[1]."</td>"); //name en
        echo("<td>".$data[2]."</td>"); //	ID
        echo("<td>".$data[3]."</td>"); //	email
      
       
      

        $sql = "update users set
               `badge_number` = '".$data[0]."', 
               `gov_id`  = '".$data[2]."'
              
             
                where `email` = '".$data[3]."'           
              ";
       

        $conn->query($sql);


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>