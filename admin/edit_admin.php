<?php
include "layout/header.php";
if(!$_SESSION['login']){
    header('location:login.php');
}

$id = $_GET['id'];
if (isset($_POST['simpan_admin']) && $_POST['simpan_admin'] == "SIMPAN") {
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    
    $query = "UPDATE admin SET nama_admin = ?, user_admin = ?";
    if (!empty($_POST['pass'])) {
        $pass = md5($_POST['pass']);
        $query .= ", pass_admin = ?";
    }
    $query .= " WHERE id_admin = ?";
    
    $stmt = mysqli_prepare($con, $query);
    
    if ($stmt) {
        if (!empty($_POST['pass'])) {
            mysqli_stmt_bind_param($stmt, 'sssi', $nama, $user, $pass, $id);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssi', $nama, $user, $id);
        }

        if (mysqli_stmt_execute($stmt)) {
            header('location:list_admin.php');
        }
    }
}

$query = mysqli_query($con, "SELECT * FROM admin WHERE id_admin = '$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
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
            max-width: 400px;
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
    <h1>Edit Admin</h1>
    <form action="" method="post">
        <div>
            <label for="nama">Nama Admin:</label>
            <input type="text" name="nama" id="nama" value="<?= $data['nama_admin']; ?>">
        </div>

        <div>
            <label for="user">Username:</label>
            <input type="text" name="user" value="<?= $data['user_admin']; ?>"><br>
        </div>

        <div>
            <label for="pass">Password:</label>
            <input type="password" name="pass"><br>
        </div>

        <input type="submit" name="simpan_admin" value="SIMPAN">
    </form>
    </div>
</body>
</html>

