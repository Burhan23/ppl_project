<?php
class database
{
	public $host = "localhost";
	public $username = "root";
	public $pass = "";
	public $db = "mr_kayu";
	public $connect;

	function __construct()
	{
		$this->connect = mysqli_connect($this->host, $this->username, $this->pass);
		mysqli_select_db($this->connect, $this->db);
	}

    function tampil_data()
	{
		$data = mysqli_query($this->connect, "select * from users");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}
	function input($username, $fname, $password, $NIK)
	{
		mysqli_query($this->connect, "insert into users values(NULL,'$username','$fname','$password','$NIK',0)");
	}

	function detail_data($id)
	{
		$data = mysqli_query($this->connect, "select * from users where id='$id'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}


	function update($id, $username, $fname, $password)
	{
		mysqli_query($this->connect, "update users set username='$username', nama_lengkap='$fname', password='$password' where id='$id'");
	}

	function hapus($id)
	{
		mysqli_query($this->connect, "delete from users where id='$id'");
	}

	function apporval()
	{
		$data = mysqli_query($this->connect, "select * from topup");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		return $rows;
	}



	
}
?>
