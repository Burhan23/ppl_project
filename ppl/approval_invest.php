<?php
require 'function.php';
$send = new Send();


$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $send->getFromThisRow4($user['username']);
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
    <style>a{min-width: 140px;} th{padding:10px;} td{padding: 10px;}</style>
    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav_pengrajin.php' ?>
<body style="background-image: url('css/11bg.jpg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Menu investasi <?php echo $user["username"]; ?></h1>

    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Daftar investasi
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Email Pengrajin</th>
                        <th scope="col">Username</th>
                        <th scope="col">Dana Investasi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tenggat Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($detail as $akun) {
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['email_investor']; ?></td>
                            <td><?php echo $akun['username_investor']?></td>
                            <td><?php echo $akun['jumlah_dana']?></td>
                            <td><?php echo $akun['status_pengrajin']?></td>
                            <?php if ($akun['status'] == '1') { ?>
                            <td></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&aksi=accept" onclick="return confirm('Apa kamu Yakin? Kamu harus mengembalikan sebanyak Rp,-<?php echo $akun['jumlah_dana']*(110/100) ?> tahun depan')">Ambil</a>
                                <a class="btn btn-primary" href="profile_Invest.php?username=<?php echo $akun['username_investor'] ?>">Lihat Investor</a>
                                <a class="btn btn-danger btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&jumlah_dana=<?php echo $akun['jumlah_dana'];?>&username=<?php echo $akun['username_investor']; ?>&aksi=decline" onclick="return confirm('Kamu Yakin?')">Tolak</a>
                            </td>
                            <?php } elseif($akun['status'] == '4') { ?>
                            <td><?php echo $akun['tanggal_pengembalian'] ?></td>
                                <?php if ($user['last_login'] >= $akun['tanggal']) {?>
                            <td>
                                <a class="btn btn-primary btn-sm" href="pengembalian.php?id=<?php echo $akun['id'] ?>&jumlah=<?php echo $akun['jumlah_dana']; ?>" onclick="return confirm('Sudah siap mengembalikan?')">Kembalikan</a>
                            </td>
                            <?php } } ?>
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