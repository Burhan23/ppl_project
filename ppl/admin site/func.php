<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "user_db";
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
          return 3;
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
  public function upgradeUserById($id, $npwp, $nik, $no_rekening,$deskripsi)
	{
		mysqli_query($this->conn, "update users set npwp='$npwp', nik='$nik', no_rekening='$no_rekening', deskripsi='$deskripsi' where id='$id'");
	}
}

class Invest extends Connection{
  public function investThisUser($email_investor, $username_investor, $nik_investor, $jumlah_dana , $nama_pengrajin)
  {
    mysqli_query($this->conn, "INSERT INTO invest(id,email_investor,username_investor,nik_investor,jumlah_dana,nama_pengrajin) VALUES(NULL,'$email_investor','$username_investor','$nik_investor',".intval($jumlah_dana).",'$nama_pengrajin')");
  }
  public function removeThisUser($id)
  {
    mysqli_query($this->conn, "delete from invest where id='$id'");
  }
}

class Send extends Connection{
  public function getFromThisRow($user)
  {
    $data = mysqli_query($this->conn, "select * from invest where nama_pengrajin='$user'");
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
}