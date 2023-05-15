<?php
include 'function.php';
$register = new Register();
$select = new Select();
$upgrading = new Specify();


if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $userini = $upgrading->selectUserById($_SESSION['id']);
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
    <link rel="stylesheet" href="css/edit.css">
    <title>Update</title>
</head>
<body style="background-image: url('css/editbackgound.jpeg'); background-size:cover;">
<h2>Lengkap Informasi Akun</h2>
    <div class="container">
    <?php
        foreach ($userini as $akun) {
    ?>
    <form action="proses.php?id_users=<?php echo $akun['id'] ?>&aksi=upgrade" enctype="multipart/form-data" method="post">
    <input type="hidden" name="id" value="<?php echo $akun['id'] ?>">
        <div class="mb-3">
            <label for="nama_product" class="form-label">NPWP</label>
            <input type="text" class="form-control" id="npwp" name="npwp" placeholder="NPWP .." value="">
        </div>
        <div class="mb-3">
            <label for="nama_product" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK .." value="">
        </div>
        <div class="mb-3">
            <label for="nama_product" class="form-label">No Rekening</label>
            <input type="text" class="form-control" id="no_rekening" name="no_rekening" placeholder="Nomer Rekening .." value="">
        </div>
         <div class="mb-3">
            <label for="bukti_ktp" class="form-label">Bukti Foto Ktp + diri sendiri</label>
            <div style="font-size: 20px; color:bisque; font-weight:bold"> Contoh </div>
            <img src="default/bukti.png">
            <div style="font-size: 20px; color:bisque; font-weight:bold"> Ketentuan : Foto harus jelas agar dapat diidentifikasi admin </div>
            <input type="file" id="bukti_ktp" name="bukti_ktp" accept="image/jpg, image/png, image/jpeg">
        </div>
        <input type="submit" class="btn btn-primary" value="Simpan" >
        <?php if($akun['role'] == '1') {?>
        <a class="btn btn-warning" href="dashboard.php">Batal</a>
        <?php } ?>
        <?php if($akun['role'] == '2') {?>
        <a class="btn btn-warning" href="dashboard.php">Batal</a>
        <?php } ?>
    </form>
    <?php } ?>	
    
</body>
</html>