<?php
include_once 'helper/koneksi.php';

$title = strtoupper($_POST['title']);
$jenis = $_POST['jenis'];
$content = $_POST['content'];
$tags = $_POST['tags'];
$name = $_POST['name'];
$id = $_POST['id'];

mysqli_query($koneksi , "UPDATE course SET title='$title' , tags='$tags' , content='$content' , jenis='$jenis' WHERE id='$id'");
mysqli_query($koneksi , "UPDATE tutor SET name='$name',class='$title',class_id='$id' WHERE id='$id'");
header("Location: course-detail.php?detail=$id");
?>