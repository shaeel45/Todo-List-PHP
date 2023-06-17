<?php 
 require('include/config.php');
 if(isset($_POST['btnsubmit'])){
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    if($name!= '' && $age!=''){
        $query = "INSERT INTO users (username,age) value ('$name','$age')";
        if(mysqli_query($conn,$query)){
            header("location:index.php");
        }
    }
 }
?>