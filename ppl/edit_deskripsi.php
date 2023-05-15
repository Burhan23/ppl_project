<?php
include 'db_conn.php';
$db = new database();
require 'function.php';

$select = new Select();
$specify = new Specify();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $detail = $specify->selectUserById($_SESSION['id']);
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
    <link rel="stylesheet" href="css/edit.css">
    <style type="text/css">
    .cke_textarea_inline{
      
      height: 300px;
    }
    </style>

    <!-- CKEditor -->	
    <script src="ckeditor/ckeditor/ckeditor.js" ></script>
    <title>Update</title>
</head>
<body style="background-color:saddlebrown; background-size:cover;">
<h2 style="color:bisque">Ubah Data Deskripsi</h2>
    <div class="container">
    <?php
    foreach ($detail as $akun) {
    ?>
    
    <input type="hidden" name="id" value="<?php echo $akun['id'] ?>">
        <div class="mb-3">

        <form action="proses.php?id=<?php echo $akun['id'] ?>&aksi=update_deskripsi" method="post">

        <label for="deskripsi" class="form-label" style="color:bisque; font-size:20px">Deskripsi :</label>
        <div class="mb-3" style="background-color:bisque; padding : 5px; border: 5px solid black;border-radius: 10px 10px;">
        <textarea id='short_desc' name='deskripsi' style='border: 1px solid black; margin: 20px;'  ><?php echo $akun['deskripsi'] ?></textarea></div><br>
        

        <input type="submit" class="btn btn-primary" value="Simpan">
        <a class="btn btn-warning" href="deskripsi.php">Batal</a>
      </form>
      </div>
      <!-- Script -->
      <script type="text/javascript">
      
        // Initialize CKEditor
        CKEDITOR.inline( 'short_desc');

        CKEDITOR.replace('long_desc',{

          width: "500px",
              height: "200px"
      
        }); 
      
          
      </script>
        
    <?php } ?>	
</body>
</html>