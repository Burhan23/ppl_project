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
      $data = "fname=".$fname."&username=".$username."role=".$role;
      if (empty($fname)) {
        $em = "Full name is required";
        header("Location: ../registration.php?error=$em&$data");
        exit;
      }else if(empty($username)){
        $em = "User name is required";
        header("Location: ../registration.php?error=$em&$data");
        exit;
      }else if(empty($email)){
        $em = "Email is required";
        header("Location: ../registration.php?error=$em&$data");
        exit;
      }else if(empty($password)){
        $em = "Password is required";
        header("Location: ../registration.php?error=$em&$data");
        exit;
      }else if(empty($role)){
        $em = "Please select your role";
        header("Location: ../registration.php?error=$em&$data");
        exit;
      }else if($password =! $confirmpassword){
        $em = "Password doesn't match";
        header("Location: ../registration.php?error=$em&$data");
      }else if($password == $confirmpassword){
        $password = password_hash($password, PASSWORD_DEFAULT);

        if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
          
          
          $img_name = $_FILES['pp']['name'];
          $tmp_name = $_FILES['pp']['tmp_name'];
          $error = $_FILES['pp']['error'];
          
          if($error === 0){
              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
              $img_ex_to_lc = strtolower($img_ex);

              $allowed_exs = array('jpg', 'jpeg', 'png');
              if(in_array($img_ex_to_lc, $allowed_exs)){
                $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
                $img_upload_path = '../uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $query = "INSERT INTO users(fname, username, email, password, pp, role) VALUES('$fname', '$username', '$email', '$password', '$pp','$role')";
                mysqli_query($this->conn, $query);
                header("Location: ../login.php?success=Your account has been created successfully");
                return 1;

                
                
              }else {
                $em = "You can't upload files of this type";
                header("Location: ../registration.php?error=$em&$data");
                exit;
              }
          }else {
              $em = "unknown error occurred!";
              header("Location: ../registration.php?error=$em&$data");
              exit;
          }

          
        }else {
          $query = "INSERT INTO users(fname, username, email, password, role) VALUES('$fname', '$username', '$email', '$password','$role')";
          mysqli_query($this->conn, $query);
          header("Location: ../login.php?success=Your account has been created successfully");
          return 1;
          
        }
        
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
          return 1;
        // Login successful
        }
        elseif($row["role"] == 2){
          return 2;
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
}


