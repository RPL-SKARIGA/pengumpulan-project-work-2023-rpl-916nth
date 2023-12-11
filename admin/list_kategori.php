
<?php include "layout/header.php"; ?>

<?php
if (!$_SESSION['login']) {
    header('location: login.php');
}

$query = mysqli_query($con, "SELECT * FROM kategori ORDER BY id_kategori DESC");
?>
<div class="wrap">
<a href="tambah_kategori.php" class="add-button">Tambah Kategori</a>

<table class="categories-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Kategori</th>
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
                <td><?= $data['nama_kategori']; ?></td>
                <td>
                    <a href="edit_kategori.php?id=<?= $data['id_kategori']; ?>" class="edit-link">Edit</a>
                    <a href="hapus_kategori.php?id=<?= $data['id_kategori']; ?>" class="delete-link">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>

<style>
    .wrap {
        display: flex;
        flex-direction: column;
        width: 77%;
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

    .categories-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .categories-table th,
    .categories-table td {
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
