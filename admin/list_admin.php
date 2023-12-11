<?php include "layout/header.php"; ?>

<?php
if (!$_SESSION['login']) {
    header('location: login.php');
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = mysqli_query($con, "SELECT * FROM admin ORDER BY id_admin DESC");
?>
<div class="wrap">
<a href="tambah_admin.php" class="add-button">Tambah Admin</a>

<table class="admin-table">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Admin</th>
            <th>Username</th>
            <th>Password</th>
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
                <td><?= $data['nama_admin']; ?></td>
                <td><?= $data['user_admin']; ?></td>
                <td><?= $data['pass_admin']; ?></td>
                <td><table></table>
                    <a href="edit_admin.php?id=<?= $data['id_admin']; ?>" class="edit-link">Edit</a>
                    <a href="hapus_admin.php?id=<?= $data['id_admin']; ?>" class="delete-link">Hapus</a>
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

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .admin-table th,
    .admin-table td {
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
