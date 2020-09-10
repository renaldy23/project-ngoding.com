<?php
session_start();
include_once('helper/koneksi.php');

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$repass = $_POST['re-pass'];

$query = mysqli_query($koneksi , "SELECT * FROM register WHERE email='$email'");

if (empty($name) || empty($email) || empty($pass) || empty($repass) ) {
    header("Location: register.php?warning=true");
}
else if($pass !== $repass){
    header("Location: register.php?alert=true");
}
else if(mysqli_num_rows($query)==1){
    header("Location: register.php?email=true");
}
else{
    $pass2 = password_hash($pass, PASSWORD_DEFAULT);
    mysqli_query($koneksi , "INSERT INTO register(id , name , email , password) VALUES('','$name','$email','$pass2')");
    $_SESSION['register'] = true;
    header("Location: index.php");
}
?>