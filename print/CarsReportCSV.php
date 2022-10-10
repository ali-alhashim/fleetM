<?php

require("../share/session.php"); 

$myfile = fopen("CarsReport.CSV", "w");

$search = $_POST["sql"];

$sql = "select * from `cars` $search  order by `registration_expiration` DESC";
$result = $conn->query($sql);
fputs($myfile,"\xEF\xBB\xBF");
fwrite($myfile,'ID, status, brand, model, year_make, plate_number, serial_number, department, registration_expiration '."\n");
while($row = $result->fetch_array(MYSQLI_ASSOC))
{
fwrite($myfile,$row["id"] .','. $row["car_status"] .','.$row["brand"].','.$row["model"].','.$row["year_make"].','.$row["plate_number"].','.$row["serial_number"].','.$row["department"].','.$row["registration_expiration"]."\n");
}

fclose($myfile);

header("location: CarsReport.CSV");

?>