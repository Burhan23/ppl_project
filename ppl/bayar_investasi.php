<?php
include 'function.php';
$invest = new Invest();
$select = new Select();

$detail = $invest->getFromThisRow2($_REQUEST['id']);


if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bayar</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/regist.css" media="screen">
  </head>
  <body>
  <?php
    foreach ($detail as $akun) {
  ?>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form style="margin-bottom:20px;" action="proses.php?id=<?php echo $akun['id'] ?>&jumlah=<?php echo $akun['jumlah_dana']?>&id_users=<?php echo $akun['id'] ?>&aksi=bayar" enctype="multipart/form-data" method="post" autocomplete="off">
    <h2>Biaya yang perlu kamu bayar</h2>
    <h1 style="text-align:center">Rp,-<?php echo $akun['jumlah_dana']+10000 ?></h1>
    <h3 style="padding-bottom:30px;">Nomer Rekening : 21231232312</h3>
      <label for="">Username : </label>
      <input type="text" class="form-control" name="username" readonly value="<?php echo $user['username'] ?>"> <br>
      <label for="">Email : </label>
      <input type="email" class="form-control" name="gmail" readonly value="<?php echo $user['email'] ?>"> <br>
      <label>Metode : </label>
        <input style="width:100px; height: 20px;"type="radio" id="Gopay"name="metode" class="form-check-input" value="gopay" required>
        <label style="width:100px"for="Gopay" class="form-input-label">Gopay</label>
        <input style="width:100px; height: 20px;"type="radio" id="Dana" name="metode" class="form-check-input" value="dana">
        <label style="width:100px"for="Dana" class="form-input-label">Dana</label>
        <input style="width:100px; height: 20px;"type="radio" id="Bank" name="metode" class="form-check-input" value="bank">
        <label style="width:100px"for="Bank" class="form-input-label">Bank</label>
      <div></div>
      <label for="">Nomer Gopay/Dana/Rekening Bank : </label>
      <input type="text" class="form-control" name="nomer" required value=""> <br>
      <label for="">Pengrajin yang dituju : </label>
      <input type="text" class="form-control" name="username_pengrajin" readonly value="<?php echo $akun['nama_pengrajin'] ?>"> <br>
	  <label for="">Bukti Pembayaran(dalam bentuk gambar)</label>
	  <input type="file" class="form-control" name="bukti">
      
      
      <button type="submit" name="submit">Bayar</button>
    </form>
    <br>
    <?php } ?>
  </body>
</html>