<?php
include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}

$id = $_GET['id'];

if (isset($_POST['simpan_kategori']) && $_POST['simpan_kategori'] == "SIMPAN") {
    $nama = $_POST['nama'];
    $query = mysqli_query($con, "update kategori set nama_kategori = '$nama' where id_kategori = '$id'");

    if ($query) {
        header("location:list_kategori.php");
    }
}

$query = mysqli_query($con, "select * from kategori where id_kategori = '$id'");
$data = mysqli_fetch_assoc($query);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <style>
        .wrap {
        display: flex;
        flex-direction: column;
        width: 200%;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 30px auto;
            padding: 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="wrap">
    <h1>Edit Kategori</h1>
    <form method="post" action="">
        <label for="nama">Nama Kategori:</label>
        <input type="text" name="nama" value="<?= $data['nama_kategori']; ?>"><br>
        <input type="submit" name="simpan_kategori" value="SIMPAN">
    </form>
    </div>
</body>
</html>
