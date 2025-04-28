<?php

session_start();
//koneksi
$conn = mysqli_connect("localhost", "root", "", "pencatatan_orders");

//login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //cek email dan password
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
} else if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>