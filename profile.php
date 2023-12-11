<?php
require "layout/header.php";

$query = mysqli_query($con, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori ORDER BY berita.id_berita DESC");
?>

<h1>sjflsjdflkj</h1>

<?php require "layout/footer.php"; ?>
