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
    <link rel="stylesheet" href="css/edit.css">
    <title>Update</title>
</head>
<body style="background-image: url('css/editbackgound.jpeg'); background-size:cover;">
<h2>Edit Data Client</h2>
    <div class="container">
    <form action="proses.php?aksi=update" method="post">
    <?php
    foreach ($detail as $akun) {
    ?>
    <input type="hidden" name="id" value="<?php echo $akun['id'] ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username .." value="<?php echo $akun['username'] ?>">
        </div>
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama_lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $akun['nama_lengkap'] ?>" placeholder="Nama Lengkap ..">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?php echo $akun['password'] ?>" placeholder="Password ..">
        </div>
        <input type="submit" class="btn btn-primary" value="Simpan">
    <?php } ?>	
    </form>
</body>
</html>