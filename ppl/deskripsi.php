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
  <style type="text/css">
	.cke_textarea_inline{
		border: 1px solid black;
	}
	</style>

	<!-- CKEditor -->	
	<script src="ckeditor/ckeditor.js" ></script>
</head>
<body style="background-color:darkslategrey">
    <?php
        foreach ($userini as $akun) {
    ?>
    <?php include 'nav_pengrajin.php' ?>

    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-350 p-3 text-center">
            <?php if($akun['deskripsi']=="") { ?>
            <div>
              <h1 style="width: 800px; color:bisque;">Belum ada Deskripsi</h1>
            </div>
            <a href="edit_deskripsi.php" class="btn btn-primary align-items-center">
            	Tambahkan Deskripsi
            </a>
            <?php } else { ?>
            <div>
              <h1 style="width: 800px; color:bisque;"><?php echo $akun['deskripsi']; ?></h1>
            </div>
            <a href="edit_deskripsi.php" class="btn btn-primary align-items-center">
            	Ubah data deskripsi
            </a>
            <?php } ?>
		</div>
    </div>
    <?php } ?>
</body>
</html>