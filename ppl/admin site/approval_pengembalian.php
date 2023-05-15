<?php
require 'function.php';
$bayar = new ListBayar();
$detail = $bayar->listBayar();


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
<body style="background-image: url('../css/11bg.jpg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Welcome <?php echo $user["fname"]; ?></h1>
    <a href="logout.php">Logout</a>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            List Pembayaran
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Username Pengrajin</th>
                        <th scope="col">Email Pengrajin</th>
                        <th scope="col">Jumlah dana</th>
                        <th scope="col">Email Investor</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($detail as $akun) {
                             if($akun['status'] == '3' or $akun['status'] == '4'){
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['username']; ?></td>
                            <td><?php echo $akun['gmail']?></td>
                            <td>Rp,-<?php echo $akun['jumlah']?></td>
                            <td><?php echo $akun['username_pengrajin']?></td>
                            <?php if ($akun['status'] == '3') { ?>
                            <td>Menunggu di proses</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="bayar.php?id=<?php echo $akun['id'] ?>&bukti=<?php echo $akun['bukti'] ?>">Bukti Pembayaran</a>
                                <a class="btn btn-success btn-sm" href="proses.php?id_bayar=<?php echo $akun['id'] ?>&id=<?php echo $akun['id'] ?>&id_invest=<?php echo $akun['id_invest'] ?>&aksi=kembalikan" onclick="return confirm('Sudah di cek?')">Kirim ke User</a>
                            </td>
                            <?php } else {?>
                            <td>Sudah di kirim</td>
                            <?php }?>
                        </tr>
                    <?php
                             }}
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>