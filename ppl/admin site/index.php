<?php

include 'db_conn.php';
$db = new database();
require 'function.php';

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
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
    <style>a{min-width: 130px;} th{padding:10px;} td{padding: 10px;}</style>
    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav.php' ?>
<body style="background-image: url('css/backgrond.jpeg'); background-size:cover;">
    <div class="container">
    <h1>Welcome <?php echo $user["fname"]; ?></h1>
    <a href="logout.php">Logout</a>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Data Client
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($db->tampil_data() as $akun) {
                    ?>
                        <tr style="border:1px solid green; ">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['username']; ?></td>
                            <td><?php echo $akun['fname']; ?></td>
                            <td><?php echo $akun['password']; ?></td>
                            <?php if($akun['role'] == 1) { ?>
                            <td>Pengrajin</td>
                            <?php }else { ?>
                            <td>Investor</td>
                            <?php } ?>
                            <?php if($akun['deskripsi']=="") {?>
                            <td>Belum ada deskripsi</td>
                            <?php } else { ?>
                            <td><a class="btn btn-primary" href="detail_deskripsi.php?id=<?php echo $akun['id'] ?>">Cek Deskripsi</a></td>
                            <?php } ?>
                            <td>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>