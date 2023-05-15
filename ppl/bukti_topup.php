<?php
include 'function.php';
$topup = new TopUp();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/regist.css" media="screen">
  </head>
  <body>
    <h2>$ $ $</h2>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form style="margin-bottom:20px;" action="proses.php?aksi=topup" enctype="multipart/form-data" method="post" autocomplete="off">
      <label for="">Username : </label>
      <input type="text" class="form-control" name="username" required value=""> <br>
      <label for="">Email : </label>
      <input type="email" class="form-control" name="gmail" required value=""> <br>
      <label for="">Jumlah : </label>
      <input style="color:blue" type="number" class="form-control" name="jumlah" readonly value=<?php echo $_REQUEST['jumlah'] ?>> <br>
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
	  <label for="">Bukti Pembayaran(dalam bentuk gambar)</label>
	  <input type="file" class="form-control" name="bukti">
      
      
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
  </body>
</html>