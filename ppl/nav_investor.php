<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Navbar</title>
    <link href="css/navbar1.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <nav class="nav">
      <a href="awaiting_invest.php" class="nav-link">List Investasimu</a>
      <a href="index_investor.php" class="nav-link">Invest</a>
      <a href="deskripsi.php" class="nav-link">Deskripsi</a>
      <a style="padding-left:auto; margin-left:auto">
      <a style="text-decoration:underline; color:blue" href="logout.php"  class="nav-link" onclick="return confirm('Apakah yakin ingin keluar?')">Logout</a>
      <a href="profile.php" class="nav-link">Profile</a>
      </a>
    </nav>
    <script src="js/script.js"></script>
  </body>
</html>