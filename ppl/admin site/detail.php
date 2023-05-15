<?php
    include 'db_conn.php';
    $db = new database();
    $detail = $db->detail_data($_GET['id']);
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
    <link rel="stylesheet" href="css/detail.css">
    <title>Detail</title>
</head>
<body style="background-image: url('css/detailbackgund.jpeg'); background-size:cover;">
    <div style="margin-top:45px;"class="container">
    <form action="proses.php?aksi=update" method="post">
    <?php
    foreach ($detail as $akun) {
    ?>
    <input type="hidden" name="id" value="<?php echo $akun['id'] ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <h1><?php echo $akun['username'] ?></h1>
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama lengkap :</label>
            <h1><?php echo $akun['fname'] ?></h1>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <h1><?php echo $akun['password'] ?></h1>
        </div>
        <div class="mb-3">
            <label for="NIK" class="form-label">NIK :</label>
            <h1><?php echo $akun['nik'] ?></h1>
        </div>
        <div class="mb-3">
            <label for="Dana" class="form-label">Dana :</label>
            <h1>Rp,-<?php echo $akun['dana'] ?></h1>
        </div>
        <div>
            <label for="Dana" class="form-label">Deskripsi :</label>
            <h1 style="width: 600px; color:cornflowerblue;"><?php echo $akun['deskripsi']; ?></h1>
        </div>
        <a href="index.php" class="btn btn-primary">Back</a>
    <?php } ?>	
    </form>
</body>
</html>