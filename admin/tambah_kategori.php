<?php include "layout/header.php"; ?>

<?php
if (!$_SESSION['login']) {
    header('location:login.php');
}

if (isset($_POST['tambah_kategori']) && $_POST['tambah_kategori'] == "TAMBAH") {
    $nama = $_POST['name'];
    $query = mysqli_query($con, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");

    if ($query) {
        header('location: list_kategori.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
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
            max-width: 500px;
            margin: 0 auto;
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

        input[type="text"] {
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
    <h1>Tambah Kategori</h1>
    <form method="post" action="">
        <label for="name">Nama Kategori:</label>
        <input type="text" name="name" id="name" required>
        <input type="submit" name="tambah_kategori" value="TAMBAH">
    </form>
    </div>
</body>
</html>
