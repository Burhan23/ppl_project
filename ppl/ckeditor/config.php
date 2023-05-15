<?php

class Connection {
	public $host = "localhost"; /* Host name */
	public $user = "root"; /* User */
	public $password = ""; /* Password */
	public $dbname = "tutorial"; /* Database name */

	public $conn;
	
	public function __construct(){
		$this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbname);
	  }
}
class tampil extends Connection{
	public function tampilkan()
	{
		$data = mysqli_query($this->conn, "select * from contents where title='test'");
		$rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
		
		return $rows;
	}
}