<?php
include_once 'helper/koneksi.php';

$title = strtoupper($_POST['title']);
$content = $_POST['content'];
$tags = $_POST['tags'];
$keterangan = $_POST['keterangan'];

$query = mysqli_query($koneksi , "SELECT * FROM course WHERE title='$title'");

if(empty($title) || empty($content) || empty($tags) || empty($keterangan) ){
    header("Location: add_course.php?alert=true");
}

if(mysqli_num_rows($query)>0){
    header("Location: add_course.php?warning=true");
}

else{
    mysqli_query($koneksi , "INSERT INTO course(id,title,content,tags,jenis) VALUES('','$title','$content','$tags','$keterangan')");
    $_SESSION['course'] = true;
    header("Location: index.php?add=true");
}
?>