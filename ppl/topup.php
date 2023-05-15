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
<body style="background-image: url('css/backgrond.jpeg'); background-size:cover;">
    
    
    <div class="container">
    <h1>Ingin Top Up ?</h1>
    
    <div style="margin-top:20px;">
        <label style="font-size: 20px;">
            Pilih Menu Dibawah untuk TopUp
        </label>
        <table class="rwd-table">
                <thead>
                    <tr style="border-bottom: 5px;">
                        <th scope="col">TopUp</th>
                        <th scope="col">Gopay</th>
                        <th scope="col">Dana</th>
                        <th scope="col">Bank</th>
                        <th scope="col">Biaya Admin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border:1px solid  green;">
                        <td>100000</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td>+5000</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="bukti_topup.php?jumlah=105000&aksi=topup">Top Up Sekarang</a>
                        </td>
                    </tr>
                    <tr>
                        <td>300000</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td>+5000</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="bukti_topup.php?jumlah=305000&aksi=topup">Top Up Sekarang</a>
                        </td>
                    </tr>
                    <tr>
                        <td>500000</td>
                        <td style="color: red; font-weight: bold">X</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td>+5000</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="bukti_topup.php?jumlah=505000&aksi=topup">Top Up Sekarang</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1000000</td>
                        <td style="color: red; font-weight: bold">X</td>
                        <td style="color: red; font-weight: bold">X</td>
                        <td style="color: green; font-weight: bold">✓</td>
                        <td>+10000</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="bukti_topup.php?jumlah=1010000&aksi=topup">Top Up Sekarang</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>