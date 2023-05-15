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
  public function registration($fname, $username, $email, $password, $confirmpassword, $pp, $role){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($password == $confirmpassword){
        // $password = password_hash($password, PASSWORD_DEFAULT);
        $pp = $_FILES['pp']['name'];
        $query = "INSERT INTO users(id,fname,username,email,password,pp,role) VALUES(NULL, '$fname', '$username', '$email', '$password', '$pp','$role')";
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
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        if($row["role"] == 1){
          if($row["nik"] == 'false'){
            return 1;
          }
          else{
            return 2;
          }
          
        // Login successful
        }
        elseif($row["role"] == 2){
          if($row["nik"] == 'false'){
            return 1;
          }
          else{
            return 3;
          }
        }
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

  public function lastLogin($id){
    mysqli_query($this->conn, "UPDATE users SET last_login = current_timestamp() where id = $id");
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
    return mysqli_fetch_assoc($result);
  
  }

  public function selectUserByUsername($username){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE username = $username");
    return mysqli_fetch_all($result);
  
  }

  public function editThisUser($id){
    mysqli_query($this->conn, "update users set npwp='");

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
  public function upgradeUserRequest($npwp, $nik, $no_rekening, $bukti_ktp ,$id_users)
	{
    $bukti_ktp = $_FILES['bukti_ktp']['name'];
		$query = "insert into upgrade(id,npwp,nik,no_rekening,bukti_ktp,id_users) values (NULL,'$npwp','$nik','$no_rekening','$bukti_ktp',$id_users)";
    mysqli_query($this->conn, $query);
    return 2;
	}
  
  public function checkThisUser($id){
    $data = mysqli_query($this->conn, "select * from upgrade where id='$id'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function checkForValidation($id_users, $npwp, $nik, $no_rekening, $deskripsi){
    mysqli_query($this->conn, "update users set npwp='$npwp', nik='$nik', no_rekening='$no_rekening', deskripsi='$deskripsi' where id=$id_users");
  }

  public function updateDescription($id,$deskripsi){
    mysqli_query($this -> conn, "update users set deskripsi='$deskripsi' where id = '$id'");
  }
}

class Invest extends Connection{
  public function investThisUser($email_investor, $username_investor, $nik_investor, $jumlah_dana, $nama_pengrajin)
  {
    mysqli_query($this->conn, "INSERT INTO invest(id,email_investor,username_investor,nik_investor,jumlah_dana,nama_pengrajin) VALUES(NULL,'$email_investor','$username_investor','$nik_investor',$jumlah_dana,'$nama_pengrajin')");
  }
  public function removeThisUser($id)
  {
    mysqli_query($this->conn, "delete from invest where id='$id'");
  }
  public function getFromThisRow($user)
  {
    $data = mysqli_query($this->conn, "select * from invest where nama_pengrajin='$user'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function getFromThisRow2($id)
  {
    $data = mysqli_query($this->conn, "select * from invest where id='$id'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function acceptThisRequest($id)
  {
    $pengrajin_status = "Permintaan diterima,Sedang Diproses";
    $investor_status = "Permintaan diterima, Bayar sekarang";
    $status="2";
    mysqli_query($this->conn, "update invest set status_pengrajin='$pengrajin_status', status_investor='$investor_status', status='$status' where id='$id'");
  }

  public function sendToAdmins($username, $gmail, $jumlah, $metode, $nomer, $username_pengrajin, $bukti, $invest)
  {
    $bukti = $_FILES['bukti']['name'];
    $query = "INSERT INTO bayar(id,username,gmail,jumlah,metode,nomer,username_pengrajin,bukti,id_invest) VALUES(NULL, '$username', '$gmail', $jumlah,'$metode', '$nomer', '$username_pengrajin', '$bukti', '$invest')";
    mysqli_query($this->conn, $query);
    return 1;
  }
  public function sendBackToAdmins($username, $gmail, $jumlah, $metode, $nomer, $email_investor, $bukti, $invest)
  {
    $bukti = $_FILES['bukti']['name'];
    $query = "INSERT INTO bayar(id,username,gmail,jumlah,metode,nomer,username_pengrajin,bukti,status,id_invest) VALUES(NULL, '$username', '$gmail', $jumlah,'$metode', '$nomer', '$email_investor', '$bukti','3', '$invest')";
    mysqli_query($this->conn, $query);
    return 1;
  }
  public function afterSend($id)
  {
    $status = "3";
    $status_investor = "Sudah dibayar, sedang diproses";
    mysqli_query($this->conn, "update invest set status='$status', status_investor='$status_investor' where id='$id'");
  }
  public function afterSendBack($id)
  {
    $status = "5";
    $status_pengrajin = "Sudah dikirim, sedang diproses";
    mysqli_query($this->conn, "update invest set status='$status', status_pengrajin='$status_pengrajin' where id='$id'");
  }

  public function selectThisID($id)
  {
    $status="3";
    mysqli_query($this->conn, "update invest set status='$status' where id='$id'");

  }
  
}

class Investation extends Connection{

}

class Send extends Connection{
  public function getFromThisRow($user)
  {
    $data = mysqli_query($this->conn, "select * from invest where nama_pengrajin='$user'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function getFromThisRow2($user)
  {
    $data = mysqli_query($this->conn, "select * from invest where username_investor='$user'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
  }
  public function getFromThisRow3($user)
  {
    $data = mysqli_query($this->conn, "SELECT id,email_investor,username_investor,nik_investor,jumlah_dana,nama_pengrajin,status_investor,status_pengrajin, status, tanggal + INTERVAL '3' year as tanggal FROM `invest` where username_investor='$user'");
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    return $rows;
  }
  public function getFromThisRow4($user)
  {
    $data = mysqli_query($this->conn, "SELECT id,email_investor,username_investor,nik_investor,jumlah_dana,nama_pengrajin,status_investor,status_pengrajin, status,tanggal, tanggal + INTERVAL '3' year as tanggal_pengembalian FROM `invest` where nama_pengrajin='$user'");
    $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);

    return $rows;
  }
  public function RequestFromThisUser($id, $dana)
  {
    mysqli_query($this->conn, "update users set dana=$dana where id='$id'");
  }
  public function SendToThisUser($id, $dana)
  {
    mysqli_query($this->conn, "update users set dana=$dana where id='$id'");
  }

  public function SendBackToInvestor($username_investor, $dana){
    mysqli_query($this->conn, "update users set dana=$dana where username='$username_investor'");
  }
  public function removeThisRow($id)
	{
		mysqli_query($this->conn, "delete from invest where id='$id'");
	}
}

class TopUp extends Connection{
  public function TopUp($username, $gmail, $jumlah, $metode, $nomer, $bukti){
    $bukti = $_FILES['bukti']['name'];
    $query = "INSERT INTO topup(id,username,gmail,jumlah,metode,nomer,bukti) VALUES(NULL, '$username', '$gmail', $jumlah,'$metode', '$nomer', '$bukti')";
    mysqli_query($this->conn, $query);
    return 1;
  }
}