<?php

include "config/db_connect.php";

$id_komen = $_GET["id_komen"];

mysqli_query($con, "DELETE FROM comments WHERE Id_comment=$id_komen");

header('Location: ' . $_SERVER['HTTP_REFERER']);
