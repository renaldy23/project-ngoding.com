<?php
include_once 'helper/koneksi.php';

$name = $_POST['name'];
$class = strtoupper($_POST['class']);
$id = $_POST['id'];

$query = mysqli_query($koneksi , "SELECT * FROM tutor WHERE name='$name'");

if(empty($name) || empty($class)){
    header("Location: add_tutor.php?id=$id&warning=true");
}
else if(mysqli_num_rows($query)>0){
    header("Location: add_tutor.php?id=$id&alert=true");
}
else{
    mysqli_query($koneksi , "INSERT INTO tutor(id , name , class , class_id) VALUES('','$name','$class','$id')");
    header("Location: course-detail.php?detail=$id&tutor=$id");
}
?>