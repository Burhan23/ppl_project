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
    <style>a{min-width: 90px;} th{padding:10px;} td{padding: 10px;}</style>

    <title>Mr.Kayu:Home</title>
</head>
<?php include 'nav_pengrajin.php' ?>
<body style="background-image: url('css/11bg.jpg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Welcome <?php echo $user["fname"]; ?></h1>
    <div style="padding-top:10px;">Ingin mendapat bantuan investasi? 
        <a href="add.php" class="">Upload Produk</a>
    </div>
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Daftar Produkmu
        </label>
            <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">ID</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Deskripsi Produk</th>
                        <th scope="col">Menu</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $id = 1;
                        foreach ($db->produk_data($user['username']) as $akun) {
                            if($akun != "") {
                    ?>
                        <tr style="border:1px solid green;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $akun['nama_product']?></td>
                            <td><?php echo $akun['deskripsi']?></td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="edit_produk.php?id=<?php echo $akun['id']; ?>">Edit</a>
                                <a class="btn btn-primary btn-sm" href="detail.php?id=<?php echo $akun['id']; ?>&aksi=edit">Detail</a>
                                <a class="btn btn-danger btn-sm" href="proses.php?id=<?php echo $akun['id'];?>&aksi=hapus" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                            </td>
                        </tr>
                    
                </tbody>
            </table>
            <?php
                } else {
            ?>
            </table>
            <h3 style="color:wheat; text-align:center; background-color:orange; max-width:1050px; border:solid; padding: 10px;">Belum ada Produk yang di Upload</h3>
            <?php }} ?>
        </div>
    </div>
</body>
</html>