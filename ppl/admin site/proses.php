<?php 
include 'db_conn.php';
include 'function.php';
$db = new database();
$specify = new Specify();
$upgrade = new Upgrade();
$topup = new TopUp();
$list = new ListBayar();
 
$aksi = $_GET['aksi'];
if($aksi == "tambah"){
 	$db->input($_POST['username'],$_POST['nama_lengkap'],$_POST['password'],$_POST['NIK']);
 	header("location:index.php");
} elseif($aksi == "update"){
 	$db->update($_POST['id'],$_POST['username'],$_POST['nama_lengkap'],$_POST['password']);
 	header("location:index.php");
} elseif($aksi == "hapus"){ 	
	$db->hapus($_GET['id']);
   	header("location:index.php");
} elseif($aksi == "bukti"){

} elseif($aksi == "isi"){
	$detail = $specify->dataUser($_GET['username']);;
	if ($_REQUEST['jumlah'] < 1010000){
		foreach ($detail as $akun){
			$jumlah_dana = (int)$_REQUEST['jumlah'] - 5000;
			$dana = $akun['dana'] + $jumlah_dana;
			$topup->giveThisUserDana($_REQUEST['username'],$dana);
			$topup->removeThisRow($_REQUEST['id']);
			header("location: approval_topup.php");
		}
	}
	elseif ($_REQUEST['jumlah'] >= 1010000){
		foreach ($detail as $akun){
			$jumlah_dana = (int)$_REQUEST['jumlah'] - 10000;
			$dana = $akun['dana'] + $jumlah_dana;
			$topup->giveThisUserDana($_REQUEST['username'],$dana);
			$topup->removeThisRow($_REQUEST['id']);
			header("location: approval_topup.php");
		}
	}
} elseif($aksi == "tolak"){
	$topup->removeThisRow($_REQUEST['id']);
   	header("location:approval_topup.php");

} elseif($aksi == "invest"){
	$detail = $specify->dataUser($_GET['username']);
	foreach ($detail as $akun){
		$jumlah_dana = (int)$_POST['jumlah_dana'];

		$invest->investThisUser($_POST['email_investor'],$_POST['username_investor'],$_POST['nik_investor'],$jumlah_dana,$_POST['nama_pengrajin']);
		header("location:index_investor.php");
	}
} elseif ($aksi == "valid"){
	$upgrade->checkForValidation($_REQUEST['id_users'],$_REQUEST['npwp'],$_REQUEST['nik'],$_REQUEST['no_rekening'],$_REQUEST['deskripsi']);
	$upgrade->removeThisRow($_REQUEST['id']);
	header("location:approval_upgrade.php");
} elseif ($aksi == "invalid") {
	$upgrade->removeThisRow($_REQUEST['id']);
	header("location:approval_upgrade.php");
} elseif ($aksi == "kirim") {
	$list->kirimKeUser($_REQUEST['id_invest'],$_REQUEST['id_bayar']);
	header("location:approval_bayar.php");
} elseif ($aksi == "kembalikan") {
	$list->kembalikanKeUser($_REQUEST['id_invest'],$_REQUEST['id_bayar']);
	header("location:approval_pengembalian.php");
}

?>
