<?php 
require("../share/session.php"); 


if(isset($_POST["sql"]))
{

    $myfile = fopen("UserList.CSV", "w");
   
    
    
    $sql = "select * from `users` ".$_POST["sql"].";";
    $result = $conn->query($sql);

    fputs($myfile,"\xEF\xBB\xBF");

    fwrite($myfile,'id , full_name , arabic_name , gov_id , email, mobile_number, company, department , badge_number, job_title, nationality , permission_group , iban'."\n");

    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
         fwrite($myfile,$row["id"] .','. $row["full_name"] .','.$row["arabic_name"].','.$row["gov_id"]. ','.$row["email"].','.$row["mobile_number"].',' .$row["company"].','.$row["department"].','.$row["badge_number"]. ','.$row["job_title"]. ','.$row["nationality"]. ','.$row["permission_group"]. ','.$row["iban"]."\n");
    }

    fclose($myfile);

    header("location: UserList.CSV ");

}

?>
