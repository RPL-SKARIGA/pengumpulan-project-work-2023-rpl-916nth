<?php include "layout/header.php"; ?>

<?php
if (!$_SESSION['login']) {
    header('location: login.php');
}
?>
<div class="wrap">
    <?php
    $berita_sql = mysqli_query($con, "SELECT * FROM berita");
    while ($berita = mysqli_fetch_assoc($berita_sql)) {
        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM comments WHERE id_berita=" . $berita["id_berita"])) == 0) continue;
    ?>
        <div class="category">
            <h3><?= $berita["judul_berita"] ?></h2>
            <table class="categories-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM comments WHERE id_berita=" . $berita["id_berita"]);
                    $num = 0;
                    while ($data = mysqli_fetch_assoc($query)) {
                        $num++;
                    ?>
                        <tr>
                            <td><?= $data['name']; ?></td>
                            <td><?= $data['comment']; ?></td>
                            <td>
                                <a href="../hapus_komen.php?id_komen=<?= $data['Id_comment']; ?>" class="delete-link">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
</div>

<style>
    .wrap {
        display: flex;
        flex-direction: column;
        width: 80%;
        margin: 20px auto;
    }

    .category {
        margin-bottom: 20px;
    }

    h3 {
        color:#333 ;
        border-bottom: 2px solid #05ada2;
        padding-bottom: 5px;
        margin-bottom: 10px;
    }

    .categories-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .categories-table th,
    .categories-table td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ccc;
    }

    .edit-link,
    .delete-link {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 3px;
        margin-right: 5px;
        text-align: center;
    }

    .edit-link {
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
    }

    .delete-link {
        background-color: #ff0000;
        color: #fff;
        text-decoration: none;
    }
</style>
