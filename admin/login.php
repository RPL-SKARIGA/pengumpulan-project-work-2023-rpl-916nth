



<?php
include "../config/db_connect.php";

$err = '';

if (isset($_POST['login']) && $_POST['login'] == "LOGIN") {
    $name = $_POST['user'];
    $pass = md5($_POST['pass']); // Use md5() to hash the password

    // Correct the SQL query by changing "form" to "FROM" and pass the connection variable
    $query = mysqli_query($con, "SELECT * FROM admin WHERE user_admin = '$name' AND pass_admin = '$pass'");
    
    // Check if the query was executed successfully
    if ($query) {
        $data = mysqli_fetch_assoc($query);

        if ($data) {
            session_start();
            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['login'] = true;
            header('location: index.php');
        } else {
            $err = "Username atau Password salah !!";
        }
    } else {
        // Handle the query error, e.g., by displaying an error message
        $err = "Database error: " . mysqli_error($con);
    }
}
?>





<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            max-width: 350px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s;
        }

        .login-container:hover {
            transform: scale(1.05);
        }

        h2 {
            text-align: center;
            color: #007BFF;
        }

        input[type="text"],
        input[type="password"] {
            width: 85%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="" method="post">
            <input type="text" name="user" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <input type="submit" name="login" value="LOGIN">
        </form>
        <p class="error"><?php echo $err; ?></p>
    </div>
</body>
</html>

