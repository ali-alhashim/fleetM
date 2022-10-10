<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :
// ProfilePhoto, userID

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to upload system logo photo




    if(isset($_FILES['SystemLogo']))
 {
  if (move_uploaded_file($_FILES["SystemLogo"]["tmp_name"], "../gallery/".$_FILES["SystemLogo"]["name"])) 
  {
    
    
     $SystemLogo = "gallery/".$_FILES["SystemLogo"]["name"];
    
  }
  else
  {
     $SystemLogo = "";
  }


  $myfile = fopen("../share/key.php", "a");
  fwrite($myfile,"\n <?php \$SystemLogo =\"". $SystemLogo."\"; ?>\n");
  fclose($myfile);

  header("location: ../Settings.php");



}

}

?>