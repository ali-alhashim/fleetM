<table>

<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
function HijriToJD($HijriDate)
{
   $dateArray = explode("/",$HijriDate);
  $y =(int)$dateArray[2];
  $m =(int)$dateArray[1];
  $d= (int)$dateArray[0];

  

    return (int)((11 * $y + 3) / 30) + 354 * $y + 
      30 * $m - (int)(($m - 1) / 2) + $d + 1948440 - 385;
 }
 


$csvFilePath = "../uploads/CSV/akhCarList.csv";




$row = 1;
if (($handle = fopen($csvFilePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      
       
        $row++;
     
        echo("<tr>");
        echo("<td>".$data[1]."</td>"); //Email
        echo("<td>".$data[2]."</td>"); //ArabicName
        echo("<td>".$data[3]."</td>"); //	GOVID
        echo("<td>".$data[4]."</td>"); //	DEPARTMENT
        echo("<td>".$data[5]."</td>"); //	PLATENO
        echo("<td>".$data[6]."</td>"); //	PlateType
        echo("<td>".$data[7]."</td>"); //	BRAND
        echo("<td>".$data[8]."</td>"); //	MODEL
        echo("<td>".$data[9]."</td>"); //	YEARMake
        echo("<td>".$data[10]."</td>"); //	SerialNo
        echo("<td>".$data[11]."</td>"); //	VID
        echo("<td>".$data[12]."</td>"); //	Color
        $purchased_date = jdtogregorian(HijriToJD($data[13]));
        echo("<td>".$purchased_date."</td>"); //		purchased_date
        
        $registration_expiration = jdtogregorian(HijriToJD($data[14]));

        echo("<td>". $registration_expiration."</td>");

        echo("<td>".$data[15]."</td>"); //	car status


        $sql = "insert into `cars` 
        (`vid`, `door_number`, `plate_number`, `body_type`,  `brand`,  
         `model`,  `year_make`, 
           `seats`,   `note`, 
         `registration_expiration`,     `owner_name`,   `owner_id`,   `fuel_type`, `car_status`,
         `gps_tracking`,  `fuel_chip`, `purchased_price`, `purchased_date`, 
         `serial_number`, `car_color`,`department`)
    
         values
         (
             '".$data[11]."',
              'Door Number', 
              '".$data[5]."',
             'Body Type',
              '".$data[7]."',
               '".$data[8]."',
             '".$data[9]."', 
             '5',
              'Note',
             '".date("Y-m-d",strtotime($registration_expiration))."',
             'شركة العبدالكريم',
              '100007',
              'Fuel type',
             '".$data[15]."',
              0, 
              0,
              0,
              '".date("Y-m-d",strtotime($purchased_date))."',
             '".$data[10]."',
              '".$data[12]."',
              '".$data[4]."'  
         )
        ";

        $conn->query($sql);


        echo("</tr>");

    }
    fclose($handle);
}
}

?>
</table>