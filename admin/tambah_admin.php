<?php
include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}


if (isset($_POST['tambah_admin']) && $_POST['tambah_admin'] == "TAMBAH") {
    // Validasi input (tambahkan validasi sesuai kebutuhan)
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);

    $query = mysqli_query($con, "INSERT INTO admin (nama_admin, user_admin, pass_admin) VALUES ('$nama', '$user', '$pass')");
    
    if ($query) {
        header('Location: list_admin.php');
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <style>
    .wrap {
        display: flex;
        flex-direction: column;
        width: 90%;
    }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #ffffff;
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
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

        input[type="text"],
        input[type="password"] {
            width: 95%;
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
    <h1>Tambah Admin</h1>
    <form action="" method="post">
        <div>
            <label for="nama">Nama Admin:</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="user">Username:</label>
            <input type="text" name="user" id="user" required>
        </div>

        <div>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass" required>
        </div>

        <input type="submit" name="tambah_admin" value="TAMBAH">
    </form>
    </div>
</body>
</html>

