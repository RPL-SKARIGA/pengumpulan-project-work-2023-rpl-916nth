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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .wrapper {
            display: flex;
        }

        #sidebar {
            width: 200px;
            background-color: #343a40;
            padding: 20px;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.1);
            color: #fff;
            transition: width 0.3s ease;
        }

        #sidebar:hover {
            width: 270px;
        }

        #sidebar h2 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        #content {
            flex: 1;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        ul.menu {
            list-style: none;
            padding: 0;
        }

        ul.menu li {
            margin-bottom: 10px;
        }

        ul.menu li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s;
        }

        ul.menu li a:hover {
            background-color: #0056b3;
        }

        @media only screen and (max-width: 768px) {
            .wrapper {
                flex-direction: column;
            }

            #sidebar {
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1000;
            }

            #content {
                margin-top: 60px;
            }

            #sidebar:hover {
                width: 100%;
            }
        }
    </style>
</head>
<body>                          
    <div class="wrapper">
        <div id="sidebar">
            <h2>Admin Dashboard</h2>
            <ul class="menu">
                <li><a href="list_berita.php"><i class="fas fa-newspaper"></i> List Berita</a></li>
                <li><a href="list_kategori.php"><i class="fas fa-list"></i> List Kategori</a></li>
                <li><a href="list_komentar.php"><i class="fas fa-comments"></i> List Komentar</a></li>
                <li><a href="list_admin.php"><i class="fas fa-user"></i> List Admin</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <div id="content">
            <!-- Your page content goes here -->
            
        </div>
    </div>

    <script>
        function toggleMenu() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html>
