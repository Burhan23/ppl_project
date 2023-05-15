<?php
require 'function.php';

$topup = new TopUp();

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $topup->checkListTopUpRequest();
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

    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav.php' ?>
<body style="background-image: url('css/backgrond.jpeg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Welcome <?php echo $user["fname"]; ?></h1>
    <a href="logout.php">Logout</a>
    <div style="padding-top:10px;">Ingin mendapat bantuan investasi? 
        <a href="add.php" class="btn btn-primary btn-sm">Upload Produk</a>
    </div>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Daftar Produkmu
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Email Pengrajin</th>
                        <th scope="col">Username</th>
                        <th scope="col">Jumlah Dana</th>
                        <th scope="col">Metode</th>
                        <th scope="col">Test</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($detail as $akun) {
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['username']; ?></td>
                            <td><?php echo $akun['gmail']?></td>
                            <td><?php echo $akun['jumlah']?></td>
                            <td><?php echo $akun['metode']?></td>
                            <td><?php echo $akun['nomer']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="bukti.php?bukti=<?php echo $akun['bukti']; ?>">Bukti Pembayaran</a>
                                <a class="btn btn-success btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&jumlah=<?php echo $akun['jumlah']; ?>&username=<?php echo $akun['username']; ?>&aksi=isi" onclick="return confirm('Sudah Kamu Cek? Ok untuk isi dana User')">Isi Saldo</a>
                                <a class="btn btn-danger btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&jumlah=<?php echo $akun['jumlah'];?>&username=<?php echo $akun['username']; ?>&aksi=tolak" onclick="return confirm('Kamu Yakin?')">Tolak permintaan</a>
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