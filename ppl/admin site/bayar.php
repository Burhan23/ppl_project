<?php 
include 'function.php';
$bayar = new ListBayar();
$detail = $bayar->listBayar();
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
    <title>Document</title>
</head>
<body style="text-align:center;width:auto;height:auto; background-color:lightsalmon">
    <div style="padding-bottom: 5%; padding-top:20px">
    <?php foreach ($detail as $bukti)  ?>
        <h2>
        <a class="btn btn-primary" href="approval_bayar.php"><- Back</a>
            Bukti Pembayaran
        </h2>
        <?php if($bukti['metode'] == 'dana') { ?>
        <h3>
            Nomer Dana
        </h3>
        <?php } elseif($bukti['metode'] == 'gopay') { ?>
        <h3>
            Nomer Gopay
        </h3>
        <?php } else if($bukti['metode'] == 'bank') { ?>
        <h3>
            Nomer Bank
        </h3>
        <?php } ?>

        <h3>Jumlah yg harus dibayar : <?php echo $bukti['jumlah']+10000 ?></h3>
    </div>
    <img style="min-width:300px;min-height:300px; max-width:600px; max-height:600px" src="../topup/<?php echo $_REQUEST['bukti'] ?>">
</body>

</html>