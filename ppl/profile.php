<?php
include 'db_conn.php';
$db = new database();
require 'function.php';

$select = new Select();
$specify = new Specify();


if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $userini = $specify->selectUserById($_SESSION['id']);
}
else{
  header("Location: login.php");
}
?>





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <style> h3 {font-size: 20px;}</style>
</head>
<body style="background-color:darkslategrey;">
    <?php
        foreach ($userini as $akun) {
          if ($akun['role'] == '1') {
    ?>
    <nav class="nav">
      <a class="nav-link" href = "index_pengrajin.php">Back to HomePage</a></nav>
    <?php } 
          elseif ($akun['role'] == '2') {
    ?>
    <nav class="nav">
      <a class="nav-link" href = "index_investor.php">Back to HomePage</a></nav>
    <?php } ?>

    <div class="d-flex justify-content-center align-items-center vh-200" >
    	
    	<div class="shadow w-500 p-3 " style="min-width:400px">
        <div class="text-center">
    		<img style="max-width: 300px; max-height:300px" src="foto_profil/<?php echo $akun['pp']; ?>"
    		     class="img-fluid rounded-circle">
          </div>
          <div>
            <h3 style="color:white; padding-top: 20px;">Nama : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['fname']; ?></h3>
            <hr style="color:white">
            <?php if ($akun['role'] == 1) { ?>
            <div><h3 style= "color:white">Email       : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['email']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">Username    : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['username']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">Role        : </h3><h3 style="color:bisque;text-align:right">Pengrajin</h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">NIK         : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['nik']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">No Rekening : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['no_rekening']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">NPWP        : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['npwp']; ?></h3></div>
            <hr style="color:white">
            <?php } elseif($akun['role']==2) { ?>
            <div><h3 style= "color:white">Email       : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['email']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">Username    : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['username']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">Role        : </h3><h3 style="color:bisque;text-align:right">Investor</h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">NIK         : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['nik']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">No Rekening : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['no_rekening']; ?></h3></div>
            <hr style="color:white">
            <div><h3 style= "color:white">NPWP        : </h3><h3 style="color:bisque;text-align:right"><?php echo $akun['npwp']; ?></h3></div>
            <hr style="color:white">
            <?php } ?>
            <div class="text-center">
            <a href="edit.php" class="btn btn-primary">
            	Ubah Data Akun
            </a>
            </div>
          </div>
		</div>
    </div>
    <?php } ?>
</body>
</html>