<?php
include_once 'helper/koneksi.php';

$silabus = $_POST['silabus'];
$id = $_POST['id'];

if(empty($silabus)){
    header("Location: add_silabus.php?id=$id&warning=true");
}
else{
    mysqli_query($koneksi , "INSERT INTO silabus (id , content , class_id) VALUES('','$silabus','$id')");
    header("Location: course-detail.php?detail=$id&tutor=$id");
}
?>