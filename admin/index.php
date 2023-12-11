<?php
require "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body> 
    <div class="Dm" id="dashboard" >
    <h1>Welcome to the Admin Dashboard</h1>   
        <!-- Add more content and features here -->
    </div>
</body>
</html>
<style>
    .Dm{
        text-align: center;
    }
</style>
