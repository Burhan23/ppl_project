<?php
include 'db_conn.php';
$db = new database();

require 'function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/add.css">
    <title>Add akun</title>
</head>
<body style="background-color:darkslategrey; background-size:cover;">
    <div class="container">
        <h1>
            Upload Produk
        </h1>
        <form action="proses.php?aksi=tambah" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="nama_product" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_product" name="nama_product" placeholder="Nama product .." required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/jpg, image/png, image/jpeg">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi .." required>
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan">
            <a class="btn btn-warning" href="index_pengrajin.php">Batal</a>
        </form>

    </div>
</body>
</html>