<?php
require("include/config.php");
    $id = $_GET["id"];
    $query = "DELETE FROM users WHERE id=$id";
    if(mysqli_query($conn,$query)){
        header("location:index.php");
    }

?>