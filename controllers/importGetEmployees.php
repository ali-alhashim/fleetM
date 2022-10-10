
<style> 
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding: 5px;
}
</style>
<table>

<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

 


$csvFilePath = "../uploads/CSV/GetEmployees.csv";




$row = 1;
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); // Badge
        
        echo("<td>".$data[4]."</td>"); // arabic name
        
        echo("<td>".$data[8]."</td>"); // Nationality
        echo("<td>".$data[12]."</td>"); // iqama_job_ar
        echo("<td>".$data[13]."</td>"); // DoB
       
        echo("<td>".$data[22]."</td>"); // IBAN
       
        echo("<td>".$data[25]."</td>"); // email
        echo("<td>".$data[26]."</td>"); // NationalID

        $sql = "update users set
               `badge_number` = '".$data[0]."', 
               `arabic_name`  = '".$data[4]."', 
               `nationality`  = '".$data[8]."', 
               `date_of_birth` = '".$data[13]."',
               `gov_id` = '".$data[26]."',
               `iban`   = '".$data[22]."',
               `iqama_job_ar` = '".$data[12]."'
                where `email` = '".$data[25]."'           
              ";
       

       $conn->query($sql);


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>