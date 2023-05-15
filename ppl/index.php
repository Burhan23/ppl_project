<?php
include 'db_conn.php';
$db = new database();

require 'function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  header("Location: logout.php");

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
    <link rel="stylesheet" href="css/index.css">

    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav_dashboard.php' ?>
<body style="background-image: url('css/11bg.jpg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Selamat Datang di Mr.Kayu <img src="css/wood.png" style= "display:inline;max-width:60px"></h1>
    
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Pentingnya Dana untuk memulai suatu bisnis
        </label>
        <div style="color:wheat">Bergabung dengan kami untuk mewujudkan mimpi anda. 
             Aplikasi ini memungkinkan Anda untuk menciptakan 
             perubahan positif dengan mendukung proyek anda, 
             membantu anda mengumpulkan dana dengan mudah!!
        </div>
        <div style="padding-top:50px;color:wheat">Ingin mendapat bantuan investasi? 
          <a href="login.php" class="">Login</a>
        </div>
        <div style="padding-top:10px;color:wheat">Belum Punya akun? 
          <a href="registration.php" class="shadow w-200">Registrasi</a>
        </div>
        </div>
    </div>
</body>
</html>