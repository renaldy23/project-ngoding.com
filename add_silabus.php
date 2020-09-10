<?php
include_once 'helper/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi , "SELECT * FROM course WHERE id='$id'");
$row = mysqli_fetch_assoc($query);
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Add Silabus</title>
        <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    </head>
    <body>
    <h3 class="text-center mt-2">Add Silabus</h3>
        <div class="container bg-white p-2 shadow-lg p-3 mb-5 bg-white rounded">
            <form action="proses-silabus.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value=<?php echo $id; ?>>
            </div>
            <?php
                $warning = isset($_GET['warning'])?$_GET['warning']:false;

                if($warning == "true"){
                    echo "<div class='alert alert-danger' role='alert'>
                            Mohon isi Materi nya!
                        </div>";
                }
            ?>
                <div class="form-group">
                    <label for="exampleInputEmail1" style="display:block;">Silabus</label>
                    <textarea name="silabus" id="exampleInputEmail1 ckeditor" cols="155" rows="5" placeholder="Maksimal 1 Materi" class="ckeditor"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Class</label>
                    <input type="text" class="form-control" value="<?php echo $row['title'] ?>" id="exampleInputPassword1" name="class" disabled>
                </div>
                <button type="submit" class="btn btn-primary" id="add">Add Silabus</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/script_silabus.js"></script>
    </body>
</html>