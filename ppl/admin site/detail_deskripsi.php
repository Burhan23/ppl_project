<?php 
include 'function.php';
$specify = new Specify();
$detail = $specify->selectUserById($_REQUEST['id'])
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
</head>
<body style="background-image: url('../css/11bg.jpg'); background-size:cover;">
    <?php
        foreach ($detail as $akun) {
    ?>

    <div class="d-flex justify-content-center align-items-center vh-100" " >
    	
    	<div class="shadow w-350 p-3 text-center" style="background-color: rgb(255,165,0, 0.5);">
            <?php if($akun['deskripsi']=="") { ?>
            <div>
              <h1 style="width: 800px; color:cornflowerblue;">Belum ada Deskripsi</h1>
            </div>

            <?php } else { ?>
            <div>
              <h1 style="width: 800px; color:white;"><?php echo $akun['deskripsi']; ?></h1>
            </div>
            <a href="index.php" class="btn btn-primary align-items-center">
            	Back
            </a>
            <?php } ?>
		</div>
    </div>
    <?php } ?>
</body>
</html>