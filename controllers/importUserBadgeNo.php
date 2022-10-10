<table>

<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

 


$csvFilePath = "../uploads/CSV/oneHR3.csv";




$row = 1;
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[0]."</td>"); //Badge
        echo("<td>".$data[1]."</td>"); //name en
        echo("<td>".$data[2]."</td>"); //	arabic name
        echo("<td>".$data[3]."</td>"); //	email
        echo("<td>".$data[4]."</td>"); //	dob
        echo("<td>".$data[5]."</td>"); //	Gender
       
      

        $sql = "update users set
               `badge_number` = '".$data[0]."', 
               `arabic_name`  = '".$data[2]."',  
               `date_of_birth` = '".$data[4]."',
               `gender` = '".$data[5]."'
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