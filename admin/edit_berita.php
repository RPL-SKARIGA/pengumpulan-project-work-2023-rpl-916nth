<?php
include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}


$id = $_GET['id'];

if (isset($_POST['edit_berita']) && $_POST['edit_berita'] == "SIMPAN") {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi']; 

    if (isset($_FILES['gambar']) && !empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../upload/" . $gambar);
        $query = mysqli_query($con, "UPDATE berita SET gambar_berita = '$gambar' WHERE id_berita = '$id'");
    }

    $query = mysqli_query($con, "UPDATE berita SET judul_berita = '$judul', isi_berita = '$isi', id_kategori = '$kategori' WHERE id_berita = '$id'");

    header("Location: list_berita.php");
    exit();
}

// Fetch the news data
$query = mysqli_query($con, "SELECT * FROM berita WHERE id_berita = '$id'");
$data = mysqli_fetch_assoc($query);

// Fetch categories
$kategori_query = mysqli_query($con, "SELECT * FROM kategori order by nama_kategori ASC");

?>


<style>
    .wrap {
        display: flex;
        flex-direction: column;
        width: 200%;
    }
    h1 {
            text-align: center;
        }

    body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        form {
            background-color: #ffffff;
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            }
            input[type="text"],
        select,
        textarea {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
</style>


<html>
    <body>
    <div class="wrap">
    <h1>Edit Berita</h1>
<form action="" method="post" enctype="multipart/form-data">
    <label for="judul">Judul:</label>
        <input type="text" name="judul" value="<?=htmlspecialchars($data['judul_berita']);?>"><br>
        
    <label for="judul">Kategori:</label>
        <select name="kategori">
        <option value=""> --Pilih Kategori</option>
        <?php while ($kat = mysqli_fetch_assoc($kategori_query)) {?>
            <option value="<?=$kat['id_kategori'];?>" <?php if ($data['id_kategori'] == $kat['id_kategori']) { echo "selected"; } ?>>
                <?=htmlspecialchars($kat['nama_kategori']); ?>
            </option>
        <?php } ?>
    </select><br>
        <label for="judul">Isi Berita:</label>
                <textarea name="isi"><?=htmlspecialchars($data['isi_berita']);?></textarea><br>
            <label for="judul">Gambar:</label>
                <input type="file" name="gambar"><br>
                <input type="submit" name="edit_berita" value="SIMPAN">
</form>
</div>
    </body>
</html>
<?php
// Close the MySQLi connection when you're done
mysqli_close($con);
?>
