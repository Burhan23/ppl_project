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

    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav_investor.php' ?>
<body style="background-image: url('css/11bg.jpg'); background-size:cover;">
    <div class="container">
    <h1>Welcome <?php echo $user["fname"]; ?></h1>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Daftar Investasi
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th style="text-align: center;" id="investor" scope="col">Pengrajin</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($db->tampil_data() as $akun) {
                            if ($akun != "") {
                    ?>
                        <tr style="border:1px solid green; text-align: center;">
                            <td style="padding-top: 30px; padding-bottom: 30px;">
                                <div class="box"><img style="height:400px; width:auto;" src="./uploads/<?php echo $akun['gambar']; ?>"></div>
                                <div style="font-weight:bold; padding-bottom: 10px;"><?php echo $akun['nama_product']?></div>
                                <div style="padding-left: 50px; padding-bottom: 10px; padding-right: 50px; font-size: calc(8px + 6 * ((100vw - 320px) / 680))"><?php echo $akun['deskripsi']; ?></div>
                                <div>
                                    <a class="btn btn-primary btn-sm" href="profile_invest.php?username=<?php echo $akun['username']; ?>&aksi=edit">Lihat Profil</a>
                                </div>
                            </td>
                        </tr>
                    <?php } else {
                     ?>
                <h3 style="color:wheat; text-align:center; background-color:orange; max-width:1050px; border:solid; padding: 10px;">Belum ada Produk yang di Upload</h3>
                <?php }} ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>