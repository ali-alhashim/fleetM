<?php
session_start();
//ob_start();

require("connection.php");


if(!isset($_SESSION["session"]))
{
// set session after verify user Credential 



$sql = "select `id`, `email`, `mobile_number`, `full_name`, `password`, `permission_group`, `permission_group_id`, `profile_photo` from users where email ='".$_POST["email"]."'  LIMIT 1;";

$result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

if ( password_verify( $_POST["password"] , $row["password"]) )
{
    // 'Password is valid!';
    $_SESSION["full_name"] = $row["full_name"];
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $row["email"];
    $_SESSION["mobile"] = $row["mobile_number"];
    $_SESSION["session"] = "valid";
    $_SESSION["permission_group"] = $row["permission_group"];
    $_SESSION["permission_group_id"] = $row["permission_group_id"];
    $_SESSION["profile_photo"] = $row["profile_photo"];


     // add action to log table

     $sql = "insert into `log`( `user_name`,  `email`, `action`) values('".$_SESSION["full_name"]."', '".$_SESSION["email"]."','User Login');";
     $conn->query($sql);

   // end adding action


} 
else {

       // 'Invalid password.';
      //back to login
      header("Location: index.php");
}

}


?>