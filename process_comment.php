<?php
// Include the database connection file
require "config/db_connect.php";
require "config/function.libs.php";

// Initialize session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get data from the form submission
    $id_berita = $_POST['id_berita'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Perform the database insertion
    $insert_query = mysqli_query($con, "INSERT INTO comments (id_berita, name, comment) VALUES ('$id_berita', '$name', '$comment')");

    // Check if the insertion was successful
    if ($insert_query) {
        // Redirect to the news article page after submitting the comment
        header("Location: lihat_berita.php?id=$id_berita");
    } else {
        // Display an error message if the comment couldn't be submitted
        echo "Error submitting comment.";
    }
}

// Close the database connection
mysqli_close($con);
