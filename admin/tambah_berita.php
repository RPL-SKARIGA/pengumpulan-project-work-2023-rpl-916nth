<?php
include "layout/header.php";

if(!$_SESSION['login']){
    header('location:login.php');
}

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['tambah_berita']) && $_POST['tambah_berita'] == "TAMBAH") {
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $isi = $_POST['isi'];
    $gambar = $_FILES['gambar']['name'];

    if (empty($judul) || empty($kategori) || empty($isi) || empty($gambar)) {
        echo '<div class="wrap"><div class="error-message">Silakan isi semua kolom terlebih dahulu.</div>';
    } else {
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../upload/" . $gambar);

        $query = "INSERT INTO berita (judul_berita, isi_berita, id_kategori, gambar_berita) 
                  VALUES ('$judul', '$isi', '$kategoria', '$gambar')";

        if (mysqli_query($con, $query)) {
            header('location: list_berita.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }   
}

$query = mysqli_query($con, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
$data = mysqli_fetch_assoc($query);

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
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        box-sizing: border-box;
    }

    .error-message {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        padding: 10px;
        text-align: center;
        margin-bottom: 15px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s ease;
        
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
        
    }
</style>

<html>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                if(isset($error_message)) {
                    echo '<div class="error-message">'.$error_message.'</div>';
                }
            ?>
            
    <h1>Tambah Berita</h1>
            <label for="judul">Judul:</label>
            <input type="text" name="judul"><br>
        
            <label for="kategori">Kategori:</label>
            <select name="kategori">
                <option value=""> --Pilih Kategori</option>
                <?php do { ?>
                    <option value="<?=$data['id_kategori']?>"><?=$data['nama_kategori']?></option>
                <?php } while ($data = mysqli_fetch_assoc($query)); ?>
            </select><br>

            <label for="isi">Isi Berita:</label>
            <div id="quill_content" style="height:200px">
            </div><br>
            <input type="text" name="isi" id="isi">
            <!-- <textarea name="isi"></textarea><br> -->

            <label for="gambar">Gambar:</label>
            <input type="file" name="gambar"><br><br>

            <input type="submit" name="tambah_berita" value="TAMBAH">
        </form>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var quill = new Quill('#quill_content', {
                theme: 'snow'
            });
            quill.root.addEventListener('keyup', function() {
                prepareDataAndSubmit();
            });

            function prepareDataAndSubmit() {
                var quillContent = quill.root.innerHTML;
                document.getElementById('isi').value = quillContent;
            }
        });
    </script>
</html>

<?php
// Close the MySQLi connection when you're done
mysqli_close($con);
?>
