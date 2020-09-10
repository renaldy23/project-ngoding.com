<?php
include_once 'helper/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi , "SELECT * FROM course WHERE id='$id'");
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

        <title>Add Tutor</title>
    </head>
    <body class="bg-light">
        <h3 class="text-center mt-2">Add Tutor</h3>
        <div class="container bg-white p-2 shadow-lg p-3 mb-5 bg-white rounded">
            <form action="proses-tutor.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="id" value=<?php echo $id; ?>>
            </div>
            <?php
                $warning = isset($_GET['warning'])?$_GET['warning']:false;
                $alert = isset($_GET['alert'])?$_GET['alert']:false;

                if($warning == "true"){
                    echo "<div class='alert alert-danger' role='alert'>
                            Mohon isi Dengan Lengkap
                        </div>";
                }

                if($alert == "true"){
                    echo "<div class='alert alert-danger' role='alert'>
                            Nama sudah Ada di dalam database
                        </div>";
                }
            ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tutor's Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                
                <div class='form-gruop'>
                    <label for="class">Classes</label>
                    <select name="class" id="class" class='form-control mb-2'>
                        <?php
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<option value='$row[title]'>$row[title]</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" id="tutor">Add Tutor</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/script_tutor.js"></script>
    </body>
</html>