<?php 

if (isset($_POST['submit']) && isset($_FILES['gambar'])) {
	include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['gambar']);
	echo "</pre>";

	$img_name = $_FILES['gambar']['name'];
	$img_size = $_FILES['gambar']['size'];
	$tmp_name = $_FILES['gambar']['tmp_name'];
	$error = $_FILES['gambar']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index_pengrajin.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 
			$aksi = $_GET['aksi'] ;
			if($aksi == "tambah") {
				if (in_array($img_ex_lc, $allowed_exs)) {
					$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
					$img_upload_path = 'uploads/'.$new_img_name;
					move_uploaded_file($tmp_name, $img_upload_path);

					// Insert into Database
					$sql = "INSERT INTO pengrajin(gambar) 
							VALUES('$new_img_name')";
					mysqli_query($conn, $sql);
					header("Location: index_pengrajin.php");
				}else {
					$em = "You can't upload files of this type";
					header("Location: index_pengrajin.php?error=$em");
				}
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: index_pengrajin.php?error=$em");
	}

}else {
	header("Location: index_pengrajin.php");
}