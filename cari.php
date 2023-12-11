<?php
require "layout/header.php";

$key = '%'.$_GET['txt_cari'].'%';

$query = mysqli_query($con, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE judul_berita LIKE '$key' ORDER BY berita.id_berita DESC");
$row = mysqli_num_rows($query);
?>

<p class="center">Terdapat <?=$row;?> Berita Dari Keyword "<?=$_GET['txt_cari'];?>"</p>

<form>
  <div class="container">
    <div class="row">
      <?php
      while ($data = mysqli_fetch_assoc($query)) {
      ?>
        <div class="col-md-2">
          <div class="news-card">
          <a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><img src="upload/<?= $data['gambar_berita']; ?>" class="news-image" alt="<?= $data['judul_berita']; ?>"></a>
            <div class="news-details">
              <h5><a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
              <div class="attr">
                <ul>
                  <a class="category-link" href="kategori.php?id=<?= $data['id_kategori']; ?>"><?= $data['nama_kategori']; ?></a><br>
                  <!-- <a class="date"><?= tanggal($data['tanggal_berita']); ?></a> -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
</form>

<style>
  .news-card {
    background-color: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 5px;
    padding: 2px;
    text-align: left;
    font-size: 15px;
    transition: transform 0.3s;
  }

  .news-card:hover {
    transform: scale(1.05);
  }

  .news-image {
    width: 100%;
    height: 100px;
    object-fit: cover;
    border-radius: 5px;
  }

  .news-title {
    text-decoration: none;
    color: #000000;
  }

  .news-details {
    padding: 10px;
  }

  .category-link {
    color: #007BFF;
    text-decoration: none;
    margin-right: 0px;
    text-align: center;
  }

  .date {
    color: #555;
  }

  .center{
    text-align: center;
  }
</style>

<?php require "layout/footer.php"; ?>
