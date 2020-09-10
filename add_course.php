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

        <title>Add Course</title>
        <script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
    </head>
    <body class="bg-light">
        <h3 class="text-center mt-2">Add Course</h3>
        <div class="container bg-white p-2 shadow-lg p-3 mb-5 bg-white rounded">
        <?php
            $alert = isset($_GET['alert'])?$_GET['alert']:false;
            $warning = isset($_GET['warning'])?$_GET['warning']:false;

            if($alert == "true"){
                echo "<div id='warning'><i>*Cannot Null</i></div>";
            }
            if($warning == "true"){
                echo "<div id='warning'><i>*This title Already Taken</i></div>";
            }
        ?>
            <form action="course-proses.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Title</label>
                    <input type="text" class="form-control" name="title"> 
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Course Description</label>
                    <textarea class="form-control ckeditor" id="ckeditor" rows="3" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Tags</label>
                    <input type="text" class="form-control" placeholder="ex: #PHP" name="tags">
                </div>
                <div class="form-group">
                    <label for="" class="d-block">Levels</label>
                    <select name="keterangan" class="form-control">
                        <option value="Pemula">Pemula</option>
                        <option value="Menengah">Menengah</option>
                        <option value="Mahir">Mahir</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success" id="button">Add a Course</button>
            </form>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            const dom = document.getElementById("button");

            dom.addEventListener("click" , function(){
                alert("Course berhasil di tambahkan");
            })
        </script>
    </body>
</html>