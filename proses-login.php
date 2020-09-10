<?php
session_start();
include_once('helper/koneksi.php');

$email = $_POST['email'];
$pass = $_POST['pass'];

$query = mysqli_query($koneksi , "SELECT * FROM register WHERE email='$email'");

if(mysqli_num_rows($query)==1){
    $row = mysqli_fetch_assoc($query);

    if(password_verify($pass , $row["password"])){
        $_SESSION['login'] = true;
        header("Location: index.php");
    }
    else{
        header("Location: login.php?warning=true");
    }
}
else{
    header("Location: login.php?warning=true");
}
?>