<?php
include "layout/header.php";

$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM berita WHERE id_kategori = '$id' ORDER BY id_berita DESC");
?>

<style>
  .item-container {
    background-color: #fff;
    border: 1px solid #ddd;
    margin: 10px;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .item-image {
    height: 200px;
    object-fit: cover;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
  }

  .item-title {
    font-size: 18px;
    margin-top: 10px;
    color: #333;
  }

  .item-title a {
    text-decoration: none;
    color: #333;
  }

  .item-title a:hover {
    color: #007BFF;
  }

  .item-date {
    font-size: 14px;
    color: #777;
    margin-top: 8px;
  }
</style>

<div class="container">
  <div class="row">
    <?php
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
      <div class="col-md-3">
        <div class="item-container">
          <img src="upload/<?= $data['gambar_berita']; ?>" class="img-thumbnail item-image">
          <h5 class="item-title"><a href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
          <div class="item-date"><?= $data['tanggal_berita']; ?></div>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>

<?php require "layout/footer.php"; ?>
