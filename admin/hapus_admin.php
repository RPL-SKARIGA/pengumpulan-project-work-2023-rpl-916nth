<?php

include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}


$id = $_GET['id'];

$query = mysqli_query($con, "DELETE FROM `admin` WHERE id_admin = '$id'");


if($query){
    header("location:list_admin.php");
    exit(); // Make sure to exit to prevent further code execution
}


?>
