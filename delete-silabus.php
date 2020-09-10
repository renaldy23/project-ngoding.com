<?php
include_once 'helper/koneksi.php';

$id = $_GET['class_id'];

mysqli_query($koneksi, "DELETE FROM silabus WHERE class_id = '$id'");

header("Location: course-detail.php?detail=$id&tutor=$id");
?>