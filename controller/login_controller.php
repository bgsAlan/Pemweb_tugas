<?php 
session_start();
require_once ("../config/db.php");

//Cek apakah user udah login
if (isset($_SESSION['user_id'])) {

    if($_SESSION['role'] == 'admin') {
        header("Location: ../view/admin/dashboard_admin_view.php");
        exit;
    } else if($_SESSION['role'] == 'guru'){
        header("Location: ../view/guru/dashboard_guru_view.php");
        exit;
    }else {
        header("Location: ../view/siswa/dashboard_siswa_view.php");
        exit;
    }
}
$error = "";
//Cek apakah ada data yang dikirim lewat post 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);

   //Prepared statement
   $sql = "SELECT id,email,password,role FROM users WHERE email = ?;";
   $stmt = $conn->prepare($sql);

   if($stmt) {
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if($result->num_rows === 1) {
        $user = $result->fetch_assoc();
    //Verify password
    if(password_verify($password,$user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

       
        //Cek role
        if($user['role'] == 'admin') {
            header("Location: ../view/admin/dashboard_admin_view.php");
            exit;
        }else if ($user['role'] == 'guru') {
            header("Location: ../view/guru/dashboard_guru_view.php");
            exit;
        }else {
            header("Location: ../view/siswa/dashboard_siswa_view.php");
            exit;
        }
    }else {
        $error = "Email atau password salah!";
    }
}else {
    $error = "Email atau password salah";
    }
    $stmt->close();
   }
   $conn->close();
}
include ('../view/auth/login_view.php');
?>