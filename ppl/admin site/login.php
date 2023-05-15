<?php
require 'function.php';

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Data tidak valid'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Data tidak valid'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="../css/login.css" media="screen">
      
    </style>
  </head>
  <body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form class="" action="" method="post" autocomplete="off">
      <h2>Login</h2>
      <label for="">Username or Email : </label>
      <input type="text" name="usernameemail" required value="" placeholder="Username.."> <br>
      <label for="">Password</label>
      <input type="password" name="password" required value="" placeholder="Password.."><br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a style="display: none;" href="registration.php">Registration</a>
  </body>
</html>
