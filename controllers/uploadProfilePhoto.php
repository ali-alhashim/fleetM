<?php
/**Action to add new car */
require("../share/session.php");
// Expected to receive request with post :
// ProfilePhoto, userID

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to upload profile photo



    if (!file_exists("../uploads/Users_ProfilePhoto/".$_POST["userID"]."/")) {
        mkdir("../uploads/Users_ProfilePhoto/".$_POST["userID"]."/", 0777, true);
    }


     // upload   Attachment
 if(isset($_FILES['ProfilePhoto']))
 {
  if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"], "../uploads/Users_ProfilePhoto/".$_POST["userID"]."/".$_POST["userID"].$_FILES["ProfilePhoto"]["name"])) 
  {
    
    
     $ProfilePhoto = "uploads/Users_ProfilePhoto/".$_POST["userID"]."/".$_POST["userID"].$_FILES["ProfilePhoto"]["name"];
    
  }
  else
  {
     $ProfilePhoto = "";
  }



}

$sql = "update `users` set `profile_photo` = '$ProfilePhoto' where `id` =".$_POST["userID"].";";

try
{
 $conn->query($sql);


    // add action to log table

    $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','upload profile photo ');";
    $conn->query($sql);

  // end adding action

  header("Location: ../UserDetails.php?id=".$_POST["userID"]);

}
catch(Exception $e)
{
    echo($e->getMessage());
}


}//end valid session



?>