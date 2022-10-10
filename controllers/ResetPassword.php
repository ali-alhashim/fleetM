<?php
require("../share/session.php");
// Expected to receive request with post :
// CurrentPassword, NewPassword, ConfirmPassword, UserID

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to change his password

    $sql = "select `id`,  `password`  from `users` where id =".$_POST["UserID"]."  LIMIT 1;";

    $result = $conn->query($sql);

$row = $result->fetch_array(MYSQLI_ASSOC);

if ( password_verify( $_POST["CurrentPassword"] , $row["password"]) )
{
    // 'Password is valid!';

    if($_POST["NewPassword"] == $_POST["ConfirmPassword"])
    {
        // New password Match update user password
        $sql = "update `users` set `password`='".password_hash($_POST["NewPassword"],PASSWORD_DEFAULT)."' where `id`=".$_POST["UserID"].";";
        $result = $conn->query($sql);
        header("Location: ../UserDetails.php?id=".$_POST["UserID"]);
    }
    else
    {
        echo("Password not Match");
    }
}
else
{
    echo("password not correct!");
}

}


?>