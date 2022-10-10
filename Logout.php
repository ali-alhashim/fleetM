<?php require("share/session.php"); ?>

<?php
 if(session_destroy())
 {
    header("Location:index.php");
 }

?>

<?php
$conn->close();
?>