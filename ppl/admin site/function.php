<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "mr_kayu";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Register extends Connection{
  public function registration($name, $username, $email, $password, $confirmpassword){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM admin_mrkayu WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($password == $confirmpassword){
        $query = "INSERT INTO admin_mrkayu VALUES('', '$name', '$username', '$email', '$password')";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }
}

class Login extends Connection{
  public $id;
  public function login($usernameemail, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM admin_mrkayu WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM admin_mrkayu WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}

class ListUser extends Connection{

  public function listUser(){

  }
  function tampil_data()
	{
		$data = mysqli_query($this->conn, "select * from users");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}
	function input($username, $fname, $password, $NIK)
	{
		mysqli_query($this->conn, "insert into users values(NULL,'$username','$fname','$password','$NIK',0)");
	}

	function detail_data($id)
	{
		$data = mysqli_query($this->conn, "select * from users where id='$id'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}


	function update($id, $username, $fname, $password)
	{
		mysqli_query($this->conn, "update users set username='$username', nama_lengkap='$fname', password='$password' where id='$id'");
	}

	function hapus($id)
	{
		mysqli_query($this->conn, "delete from users where id='$id'");
	}
}

class TopUp extends Connection{
  public function giveThisUserDana($username, $dana)
  {
    mysqli_query($this->conn, "update users set dana=$dana where username='$username'");
  }
  public function checkListTopUpRequest()
  {
    $data = mysqli_query($this->conn, "select * from topup");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
  }
  public function removeThisRow($id)
	{
		mysqli_query($this->conn, "delete from topup where id='$id'");
	}

}
class Specify extends Connection{
  public function selectUserById($id)
  {
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return ($rows);
  }
  public function dataUser($user)
	{
		$data = mysqli_query($this->conn, "select * from users where username='$user'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
	}
  
}
class Upgrade extends Connection{
  public function upgradeUserRequest($npwp, $nik, $no_rekening, $deskripsi, $bukti_ktp ,$id_users)
	{
		mysqli_query($this->conn, "insert into upgrade(id,npwp,nik,no_rekening,deskripsi,bukti_ktp,id_users) values ('$npwp','$nik','$no_rekening','$deskripsi','$bukti_ktp',$id_users)");
	}
  
  public function checkThisUser(){
    $data = mysqli_query($this->conn, "select * from upgrade order by id desc");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function checkForValidation($id_users, $npwp, $nik, $no_rekening, $deskripsi){
    mysqli_query($this->conn, "update users set npwp='$npwp', nik='$nik', no_rekening='$no_rekening', deskripsi='$deskripsi' where id='$id_users'");
  }
  public function removeThisRow($id)
	{
		mysqli_query($this->conn, "delete from upgrade where id='$id'");
	}
}

class ListBayar extends Connection{
  public function listBayar()
  {
    $data = mysqli_query($this->conn, "select * from bayar");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
  }
  public function kirimKeUser($id, $id_bayar)
  {
    $status_investor = "Selesai, Ambil Investasimu pada ";
    $status_pengrajin = "Silahkan cek rekning anda, jika ada masalah hubungi https://wa.me/6282122321";
    $status = "4";
    mysqli_query($this->conn, "update invest set status_investor='$status_investor', status_pengrajin='$status_pengrajin', status='$status' where id = '$id' ");
    mysqli_query($this->conn, "update bayar set status='2' where id ='$id_bayar'");
  }
  public function kembalikanKeUser($id, $id_bayar)
  {
    $status_pengrajin = "Selesai, Terima kasih";
    $status_investor = "Silahkan cek rekning anda, jika ada masalah hubungi https://wa.me/6282122321";
    $status = "4";
    mysqli_query($this->conn, "update invest set status_investor='$status_investor', status_pengrajin='$status_pengrajin', status='$status' where id = '$id' ");
    mysqli_query($this->conn, "update bayar set status='4' where id ='$id_bayar'");
  }

}

class produkUser extends Connection{
  public function listProduk() {
    $data = mysqli_query($this->conn, "select * from produk order by id desc");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
}

