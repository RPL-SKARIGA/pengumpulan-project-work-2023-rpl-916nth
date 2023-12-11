<?php
require '../config/db_connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        aside {
           j
        }

        header {
            background-color: #343a40;
            padding: 10px;
            width: 100%;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            color: #fff;
            <?php if (!isset($_GET['page'])) echo 'display: none;'; ?>
        }

        ul.menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.menu li {
            margin-bottom: 10px;
        }

        ul.menu li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s;
        }

        ul.menu li a:hover {
            background-color: #0056b3;
        }

        main {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <aside>
        <ul class="menu">
            <li><a href="index.php?page=list_berita">List Berita</a></li>
            <li><a href="index.php?page=list_kategori">List Kategori</a></li>
            <li><a href="index.php?page=list_admin">List Admin</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </aside>

    <main>
        <header>
            <h1>Admin Dashboard</h1>
            <!-- You can add any content or navigation related to the main section here -->
        </header>

        <!-- The main content of the page goes here -->
    </main>
</body>
</html>
