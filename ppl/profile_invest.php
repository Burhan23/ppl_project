<?php
include 'function.php';
$specify = new Specify();

$detail = $specify->dataUser($_GET['username']);
$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
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
    
</head>
<body style="background-color:darkslategrey;">
    <?php
        foreach ($detail as $akun) {
    ?>
    <div class="d-flex justify-content-center align-items-center vh-1000">
    	
    	<div class="shadow w-350 p-3 text-center">
    		<img src="foto_profil/<?php echo $akun['pp']; ?>"
    		     class="img-fluid rounded-circle">
            <h3 class="display-4 " style="color:white; font-size:40px"><?php echo $akun['fname']; ?></h3>
            <?php if($akun['deskripsi'] == "") { ?>
            <h1 style="width: 600px; padding-top:30px; padding-bottom:30px; color:bisque; font-size:30px">Investor Belum memiliki Deskripsi</h1>
            <?php } else { ?>
            <div>
                <h1 style="width: 600px; color:bisque; font-size:30px"><?php echo $akun['deskripsi']; ?></h1>
            </div>
            <?php } ?>

            <?php if($user['role'] == "2") { ?>
            <a href="invest.php?username=<?php echo $akun['username']; ?>&aksi=edit" class="btn btn-primary">
            	Invest
            </a>
            <a href="index_investor.php" class="btn btn-warning">Back</a>
            <?php } else { ?>
            <a href="index_pengrajin.php" class="btn btn-warning">Back</a>
            <?php } ?>
		</div>
    </div>
    <?php } ?>
</body>
</html>