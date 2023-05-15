<?php
require 'function.php';
$send = new Send();


$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $send->getFromThisRow3($user['username']);
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
<?php include 'nav_investor.php' ?>
<body style="background-image: url('css/11bg.jpg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Menu Investasi <?php echo $user["username"]; ?></h1>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Daftar Investasi yang kamu ajukan
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Dana yang di invest</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($detail as $akun) {
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['nama_pengrajin']; ?></td>
                            <td><?php echo $akun['jumlah_dana']?></td>
                            <td><?php echo $akun['status_investor']?><?php if ($akun['status'] == '4') { echo $akun['tanggal'];}?></td>
                            <?php if($akun['status'] == '2'){ ?>
                            <td>
                                <a class="btn btn-primary btn-sm" href="bayar_investasi.php?id=<?php echo $akun['id'] ?>&jumlah=<?php echo $akun['jumlah_dana']; ?>&aksi=edit" onclick="return confirm('Biaya yang kamu harus bayar sebanyak Rp,-<?php echo $akun['jumlah_dana']+10000 ?>')">Bayar Investasi</a>
                                
                            </td>
                            <?php } ?>
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