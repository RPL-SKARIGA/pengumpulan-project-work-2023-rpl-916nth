<?php include "layout/header.php"; ?>

<?php
if (!$_SESSION['login']) {
    header('location: login.php');
}

$query = mysqli_query($con, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori ORDER BY berita.id_berita DESC");
?>
<div class="wrap">
<a href="tambah_berita.php" class="add-button">Tambah Berita</a>

<table class="news-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 0;
        while ($data = mysqli_fetch_assoc($query)) {
            $num++;
        ?>
        <tr>
            <td><?= $num; ?></td>
            <td><?= $data['judul_berita']; ?></td>
            <td><?= $data['tanggal_berita']; ?></td>
            <td><?= $data['nama_kategori']; ?></td>
            <td><img src="../upload/<?= $data['gambar_berita']; ?>" style="max-width: 100px; height: auto;"></td>
            <td>
                <a href="edit_berita.php?id=<?= $data['id_berita']; ?>" class="edit-link">Edit</a>
                <a href="hapus_berita.php?id=<?= $data['id_berita']; ?>" class="delete-link">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

<style>
    .wrap {
        display: flex;
        flex-direction: column;
    }
    .add-button {
        display: block;
        background-color: #05ada2;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 5px;
        margin: 20px 0;
        text-align: center;
    }

    .news-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .news-table th,
    .news-table td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ccc;
    }

    .edit-link {
        color: #007BFF;
        text-decoration: none;
        margin-right: 10px;
    }

    .delete-link {
        color: #ff0000;
        text-decoration: none;
    }
</style>
