<?php
include_once 'helper/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi , "SELECT * FROM course WHERE id='$id'");
$query_tutor = mysqli_query($koneksi , "SELECT * FROM tutor WHERE class_id='$id'");
$row = mysqli_fetch_assoc($query);
$row_tutor = mysqli_fetch_assoc($query_tutor);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">

        <title>Update</title>
        <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    </head>
    <body class="bg-light">
        <h2 class="p-1 text-center">Update</h2>
        <div class="container bg-white p-2 shadow-lg p-3 mb-5 bg-white rounded">
            <form action="proses-update.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value=<?php echo $id; ?>>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name ="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['title'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Level</label>
                    <input type="text" name="jenis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['jenis'] ?>">
                    <small class="form-text text-dark" >Harap masukkan level dengan keterangan : Mahir , Menengah , Pemula</small>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Course Description</label>
                    <textarea class="form-control ckeditor" id="ckeditor" rows="3" name="content"><?php echo $row['content']?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tags</label>
                    <input type="text" name="tags" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['tags'] ?>">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Tutor</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row_tutor['name'] ?>">
                </div>
                <button type="submit" class="btn btn-success" id="update">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                        <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
                    </svg>
                    Update <?php echo $row['title']?> Course
                </button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            let update = document.getElementById("update");

            update.addEventListener("click" , function(){
                alert("Course berhasil di Update!");
            })
        </script>
    </body>
</html>