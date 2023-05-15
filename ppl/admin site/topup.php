<?php
include 'function.php';
$specify = new Specify();

$detail = $specify->dataUser($_GET['username']);
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
<body style="background-image: url('css/detailbackgund.jpeg'); background-size:cover;">
    <div class="container">
        <h1>
            Upload Produk
        </h1>
        <?php
            foreach ($detail as $akun) {
        ?>
        <form action="proses.php?&aksi=invest" enctype="multipart/form-data" method="post">
            <div style="color: white;" class="mb-3">
                <label for="jumlah_dana" class="form-label">Pengrajin yang dituju : </label>
                <input type="text" class="form-control" name="nama_pengrajin" readonly value="<?php echo $akun['username']; ?>">
            </div>
            <div class="mb-3">
                <label for="jumlah_dana" class="form-label">Dana yang ingin di invest : </label>
                <input type="number" class="form-control" id="jumlah_dana" name="jumlah_dana" placeholder="Dana .." required>
            </div>
            <input type="submit" class="btn btn-primary" value="Simpan">
            <a class="btn btn-warning" href="index_investor.php">Batal</a>
        </form>
        <?php } ?>

    </div>
</body>
</html>