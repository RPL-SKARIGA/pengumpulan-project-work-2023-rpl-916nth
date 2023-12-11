<?php
require "layout/header.php";

$query = mysqli_query($con, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori ORDER BY berita.id_berita DESC");
?>
<form>
  <div class="container">
    <br><br>
    <div class="row">
      <?php $data = mysqli_fetch_assoc($query); ?>
      <div class="col-md-8 mb-4">
        <div class="card">
          <a href="lihat_berita.php?id=<?= $data['id_berita']; ?>">
            <img src="upload/<?= $data['gambar_berita']; ?>" class="card-img-top" alt="<?= $data['judul_berita']; ?>">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
            <div class="attr">
            <a href="kategori.php?id=<?= $data['id_kategori']; ?>" class="">
                    <?= $data['nama_kategori']; ?>
                  </a>
            </div>
          </div>
        </div>
      </div>  
      <div class="col-md-3 mb-4">
        <div class="card">
        <?php $data = mysqli_fetch_assoc($query); ?>
          <a href="lihat_berita.php?id=<?= $data['id_berita']; ?>">
            <img src="upload/<?= $data['gambar_berita']; ?>" class="card-img-top" alt="<?= $data['judul_berita']; ?>">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
            <div class="attr">
            <a href="kategori.php?id=<?= $data['id_kategori']; ?>" class="">
                    <?= $data['nama_kategori']; ?>
                  </a>
            </div>
          </div>
        </div>
        <div class="card">
        <?php $data = mysqli_fetch_assoc($query); ?>
          <a href="lihat_berita.php?id=<?= $data['id_berita']; ?>">
            <img src="upload/<?= $data['gambar_berita']; ?>" class="card-img-top" alt="<?= $data['judul_berita']; ?>">
          </a>
          <div class="card-body">
            <h5 class="card-title"><a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
            <div class="attr">
            <a href="kategori.php?id=<?= $data['id_kategori']; ?>" class="">
                    <?= $data['nama_kategori']; ?>
                  </a>
            </div>
          </div>
        </div>
      </div>  
    <div class="row">
      <?php
      while ($data = mysqli_fetch_assoc($query)) {
      ?>
       <div class="col-md-4 mb-4">
  <div class="card">
    <a href="lihat_berita.php?id=<?= $data['id_berita']; ?>">
      <img src="upload/<?= $data['gambar_berita']; ?>" class="card-img-top" alt="<?= $data['judul_berita']; ?>">
    </a>
    <div class="card-body">
      <h5 class="card-title"><a class="news-title" href="lihat_berita.php?id=<?= $data['id_berita']; ?>"><?= $data['judul_berita']; ?></a></h5>
      <div class="attr">
      <a href="kategori.php?id=<?= $data['id_kategori']; ?>" class="">
              <?= $data['nama_kategori']; ?>
            </a>
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
</style>

<?php require "layout/footer.php"; ?>
