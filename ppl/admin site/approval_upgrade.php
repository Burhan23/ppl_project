<?php
require 'function.php';

$topup = new TopUp();
$upgrade =  new Upgrade();

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $upgrade->checkThisUser();
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
            List Yang ingin Upgrade
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">NPWP</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nomer Rekening</th>
                        <th scope="col">id User</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($detail as $akun) {
                            if($akun != "") {
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['npwp']; ?></td>
                            <td><?php echo $akun['nik']?></td>
                            <td><?php echo $akun['no_rekening']?></td>
                            <td><?php echo $akun['id_users']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="bukti_upgrade.php?bukti_ktp=<?php echo $akun['bukti_ktp']; ?>&nik=<?php echo $akun['nik'] ?>">Bukti KTP</a>
                                <a class="btn btn-success btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&id_users=<?php echo $akun['id_users']; ?>&npwp=<?php echo $akun['npwp'] ?>&nik=<?php echo $akun['nik']; ?>&no_rekening=<?php echo $akun['no_rekening']; ?>&deskripsi=<?php echo $akun['deskripsi']; ?>&aksi=valid" onclick="return confirm('Sudah Kamu Cek? Ok untuk update data User')">Upgrade</a>
                                <a class="btn btn-danger btn-sm" href="proses.php?id=<?php echo $akun['id'] ?>&aksi=invalid" onclick="return confirm('Kamu Yakin?')">Tolak permintaan</a>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
            <?php } else { ?>
                    </tbody>
                </table>
                <h3 style="color:wheat; text-align:center; background-color:orange; max-width:1050px; border:solid; padding: 10px;">Belum ada Pengajuan saat ini</h3>
            <?php }} ?>
        </div>
    </div>
</body>
</html>