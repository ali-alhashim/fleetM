<?php
require("../share/session.php");

if(isset($_SESSION["session"]) && $_SESSION["session"] == "valid" )
{
    //check also he have permission to reset user password

    $sql = "update `users` set `password`='".password_hash("000000",PASSWORD_DEFAULT)."' where `id`=".$_GET["id"].";";
    $result = $conn->query($sql);

    header("Location: ../UserDetails.php?id=".$_GET["id"]);
}
?>