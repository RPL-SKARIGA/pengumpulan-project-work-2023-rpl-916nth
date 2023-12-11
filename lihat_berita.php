<?php
include "layout/header.php";
$id = $_GET['id'];
session_start();
$query = mysqli_query($con, "SELECT kategori.* ,berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.id_berita = '$id'");
$data = mysqli_fetch_assoc($query);
$comments_query = mysqli_query($con, "SELECT * FROM comments WHERE id_berita = '$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-9">
    <div class="container text-center">
        <h5><?= $data['judul_berita']; ?></h5>
        <div>
            <img src="upload/<?= $data['gambar_berita']; ?>" style="width:500px; height:300px">
        </div>
        <div>
            <p>Kategori : <a href="kategori.php?id=<?= $data['id_kategori']; ?>"><?= $data['nama_kategori']; ?></a></p>
            <p>Rilis Berita : <?= $data['tanggal_berita']; ?></p>
        </div>
        <div>
            <p><?= $data['isi_berita']; ?></p>
        </div>
        <!-- Add a comment box after displaying the news content -->
        <!-- Add a comment box after displaying the news content -->
        <div>
            <h3>Leave a Comment</h3>

            <?php
            if (isset($_SESSION['user_id'])) {
            ?>
                <form method="post" action="process_comment.php">
                    <input type="hidden" name="id_berita" value="<?= $data['id_berita']; ?>">

                    <div class="mt-5 mx-5">
                        <label for="name" class="form-label">Your Name:</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $_SESSION['username']; ?>" required>
                    </div>

                    <div class="mt-5 mx-5">
                        <label for="comment" class="form-label">Your Comment:</label>
                        <textarea name="comment" class="form-control" rows="4" required></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" style="color:white">Submit Comment</button>
                </form>
            <?php
            } else {
                // Show a login prompt if the user is not logged in
                echo '<p>Please <a href="login.php">login</a> to leave a comment.</p>';
            }
            ?>
        </div>

        <div class="mt-5 mx-5 text-start">
            <h3>Comments</h3>
            <?php
            while ($comment = mysqli_fetch_assoc($comments_query)) {
            ?>
                <div class="d-flex flex-start mb-4">
          
          <div class="card w-100">
            <div class="card-body p-4">
              <div class="">
                <div class="d-flex mb-1 justify-items-center">
                    <img class="rounded-circle shadow-1-strong me-3"
                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65"
                    height="65" />
                    <div>
                        <h5><?= $comment["name"] ?></h5>
                        <p class="small"><?= $comment["timestamp"] ?></p>
                    </div>
                </div>
                <p>
                  <?= $comment["comment"] ?>
                </p>

                <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                  </div>
                  <a href="hapus_komen.php?id_komen=<?= $comment["Id_comment"] ?>" class="link-muted"><i class="fas fa-reply me-1"></i>Remove</a>
                </div>
              </div>
            </div>
          </div>
        </div>
            <?php
            }
            ?>
        </div>


    </div>
</div>
<div class="col-3">
    <h2>Berita Terkait</h2>
    <?php
    $id_berita =  $data['id_berita'];
    $id_kategori = $data['id_kategori'];
    $q_terkait = mysqli_query($con, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.id_kategori = '$id_kategori'");

    $terkait = mysqli_fetch_assoc($q_terkait);

    if (mysqli_num_rows($q_terkait) > 0) {
        do {
            if ($terkait['id_berita'] != $id_berita) {

    ?>
                <div class="sidebar">
                    <div class="terkait">
                        <div class="image">

                            <img src="upload/<?= $terkait['gambar_berita']; ?>">

                        </div>
                        <div class="atribute">
                            <h5><?= $terkait['judul_berita']; ?></h5>
                            <p><?= $terkait['nama_kategori']; ?></p>
                            <a href="lihat_berita.php?id=<?= $terkait['id_berita']; ?>" class="btn">LIHAT</a>

                        </div>

                    </div>
                </div>
    <?php }
        } while ($terkait = mysqli_fetch_assoc($q_terkait));
    } else {
        echo "Tidak Ada Berita Terkait.";
    } ?>
</div>

<style>
    .image,
    .col-9,
    .col-3 {
        float: left;
    }

    .col-9 {
        width: 75%;
    }

    .col-3 {
        width: 20%;
    }

    .sidebar {
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

    .image {
        padding: 5px;
    }

    .image img {
        width: 100%;
        height: 20%;
        object-fit: cover;
        border-radius: 5px;
    }

    .atribute a {
        text-decoration: none;
    }

    .btn {
        color: #007BFF;
        text-decoration: none;
        margin-right: 0px;
        text-align: center;
    }
</style>
</body>
</html>

