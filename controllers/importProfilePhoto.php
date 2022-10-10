<?php
// Add users profile form ../uploads/Users_ProfilePhoto/photo/

require("../share/session.php");


if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{

    $profileFolder = "../uploads/Users_ProfilePhoto/photo/";

    function addProfile($photoName, $conn)
{
    $pattern = '/[A-Z]/i';

    $sql = "select `id`, `badge_number` from `users`;";
    $result = $conn->query($sql);
    while($row = $result->fetch_array(MYSQLI_ASSOC))
    {
        if(str_contains($row["badge_number"],'A'))
        {
          
        
        $badgeNo = preg_replace($pattern, '', $row["badge_number"]);
        $badgeNoX = (int) $badgeNo;
         
         if($photoName == $badgeNoX.".jpg")
         {
          echo($row["id"]);
          echo("<br>");
          $sql = "update `users` set `profile_photo` ='uploads/Users_ProfilePhoto/photo/".$badgeNoX.".jpg' where `id` =".$row["id"].";";
          $conn->query($sql);
          break;
         }
        }
        
    }
}
   



$handle = opendir($profileFolder);


if ($handle) {
    while (($entry = readdir($handle)) !== FALSE) {

     
       
        if(strpos($entry,".jpg") !==FALSE)
        {
         
       
            addProfile($entry,$conn);

           // echo($entry."<br>");
       
        }
    }
}






try
{



  // add action to log table

  $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','Sync users profile photo');";
  $conn->query($sql);

// end adding action

header("Location: ../Settings.php");

}
catch(Exception $e)
{
echo($e->getMessage());
}


} 

?>