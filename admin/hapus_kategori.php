<?php

include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}


$id = $_GET['id'];

$query = mysqli_query($con,"DELETE FROM kategori WHERE id_kategori = '$id'");

if ($query) {
    header('location:list_kategori.php');
}
