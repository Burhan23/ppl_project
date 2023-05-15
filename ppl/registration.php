<?php
include 'function.php';
$register = new Register();

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

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
    <h2>Registration</h2>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form style="margin-bottom:20px;" action="proses.php?aksi=regist" enctype="multipart/form-data" method="post" autocomplete="off">
      <label for="">Name : </label>
      <input type="text" class="form-control" name="fname" required value=""> <br>
      <label for="">Username : </label>
      <input type="text" class="form-control" name="username" required value=""> <br>
      <label for="">Email : </label>
      <input type="email" class="form-control" name="email" required value=""> <br>
      <label for="">Password : </label>
      <input type="password" class="form-control" name="password" required value=""> <br>
      <label for="">Confirm Password : </label>
      <input type="password" class="form-control" name="confirmpassword" required value=""> <br>
		  <label for="">Profile Picture</label>
		  <input type="file" class="form-control" name="pp">
      <label>Role : </label>
        <input style="width:100px; height: 20px;"type="radio" id="pengrajin"name="role" class="form-check-input" value=1 required>
        <label style="width:100px"for="pengrajin" class="form-input-label">Pengrajin</label>
        <input style="width:100px; height: 20px;"type="radio" id="investor" name="role" class="form-check-input" value=2>
        <label style="width:100px"for="investor" class="form-input-label">Investor</label>
      <button type="submit" name="submit" onclick="return confirm('Apakah sudah yakin dengan data yang diisi?')">Register</button>
      <a>Sudah punya akun? <a href="login.php">Login disini</a></a>
    </form>
    <br>
  </body>
</html>
