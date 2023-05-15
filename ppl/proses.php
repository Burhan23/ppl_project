<?php 
include 'db_conn.php';
include 'function.php';
$db = new database();
$register = new Register();
$upgrade = new Upgrade();
$specify = new Specify();
$invest = new Invest();
$send = new Send();
$topup = new TopUp();

$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
  $_POST['username'] = $user['username'];
}
else{
  header("Location: login.php");
}



 
$aksi = $_GET['aksi'];
if($aksi == "tambah"){
	if (($_FILES['gambar']['name']!="")){
	// Where the file is going to be stored
		$target_dir = "uploads/";
		$file = $_FILES['gambar']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['gambar']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
	
	// Check if file already exists
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
 	$db->input($_POST['nama_product'],$_POST['gambar'],$_POST['deskripsi'],$_POST['username']);
 	header("location:index_pengrajin.php");
} elseif($aksi == "update"){
 	$db->update($_REQUEST['id'],$_POST['nama_product'],$_POST['deskripsi']);
 	header("location:index_pengrajin.php");
} elseif($aksi == "hapus"){
	$db->hapus($_GET['id']);
	header("location:index_pengrajin.php");
} elseif($aksi == "regist"){
	if (($_FILES['pp']['name']!="")){
		$target_dir = "foto_profil/";
		$file = $_FILES['pp']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['pp']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
	$result = $register->registration($_POST["fname"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"], $_POST["pp"], $_POST["role"] );
	header("location:login.php");
	
} elseif($aksi == "upgrade"){
	if (($_FILES['bukti_ktp']['name']!="")){
		$target_dir = "upgrade/";
		$file = $_FILES['bukti_ktp']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['bukti_ktp']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
	$upgrade->upgradeUserRequest($_POST['npwp'],$_POST['nik'],$_POST['no_rekening'],$_POST['bukti_ktp'],$_REQUEST['id_users']);
 	header("location:dashboard.php");
} elseif($aksi == "invest"){
	
	$_POST['email_investor'] = $user['email'];
	$_POST['username_investor'] = $user['username'];
	$_POST['nik_investor'] = $user['nik'];

	$invest->investThisUser($_POST['email_investor'],$_POST['username_investor'],$_POST['nik_investor'],(int)$_POST['jumlah_dana'],$_POST['nama_pengrajin']);
	header("location:index_investor.php");

} elseif($aksi == "accept"){

	$invest->acceptThisRequest($_REQUEST['id']);
	header("location:approval_invest.php");

} elseif ($aksi == "decline") {

	$detail = $specify->dataUser($_GET['username']);;

	foreach ($detail as $akun){
		$jumlah_dana = (int)$_REQUEST['jumlah_dana'];
		$dana = $akun['dana'] + $jumlah_dana +10000;
		$send->SendBackToInvestor($_REQUEST['username'],$dana);
		$send->removeThisRow($_REQUEST['id']);
		header("location: profile.php");
	}

} elseif($aksi == "topup"){
	if (($_FILES['bukti']['name']!="")){
		$target_dir = "topup/";
		$file = $_FILES['bukti']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['bukti']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
	$result = $topup->TopUp($_POST["username"], $_POST["gmail"], (int)$_POST['jumlah'], $_POST["metode"], $_POST["nomer"], $_POST['bukti']);
	header("location:index_investor.php");
} elseif ($aksi == "valid"){
	$upgrade->checkForValidation($_REQUEST['npwp'],$_REQUEST['nik'],$_REQUEST['no_rekening'],$_REQUEST['deskripsi'],$_REQUEST['id_users']);
} elseif($aksi == "bayar"){
	if (($_FILES['bukti']['name']!="")){
		$target_dir = "topup/";
		$file = $_FILES['bukti']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['bukti']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
	$result = $invest->sendToAdmins($_POST["username"], $_POST["gmail"], (int)$_REQUEST['jumlah'], $_POST["metode"], $_POST["nomer"], $_POST['username_pengrajin'] , $_POST['bukti'], $_REQUEST['id_users']);
	$invest->afterSend($_REQUEST['id']);
	header("location:awaiting_invest.php");

}elseif($aksi == "update_deskripsi"){
	$upgrade->updateDescription($_REQUEST['id'],$_POST['deskripsi']);
	header("location:deskripsi.php");
} elseif($aksi == "update_deskripsi2"){
	$db->update($_REQUEST['id'],$_POST['nama_product'],$_POST['deskripsi']);
	header("location:index_pengrajin.php");
} elseif($aksi == "kembalikan"){
	if (($_FILES['bukti']['name']!="")){
		$target_dir = "kembalikan/";
		$file = $_FILES['bukti']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$temp_name = $_FILES['bukti']['tmp_name'];
		$path_filename_ext = $target_dir.$filename.".".$ext;
		if (file_exists($path_filename_ext)) {
			echo "Sorry, file already exists.";
		}else{
			move_uploaded_file($temp_name,$path_filename_ext);
			echo "Congratulations! File Uploaded Successfully.";
		}
	}
	$result = $invest->sendBackToAdmins($_POST["username"], $_POST["gmail"], (int)$_REQUEST['jumlah'], $_POST["metode"], $_POST["nomer"], $_POST['email_investor'] , $_POST['bukti'], $_REQUEST['id_users']);
	$invest->afterSendBack($_REQUEST['id']);
	header("location:approval_invest.php");

}

?>
