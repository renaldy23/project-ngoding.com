<?php
session_start();
include_once 'helper/koneksi.php';

if(!isset($_SESSION['main'])==true){
    header("Location: index.php");
}

$id = $_GET['detail'];
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

        <script src="js/jquer.js"></script>
        <title>Course Detail</title>
    </head>
    <body class='bg-light'>
        <?php
            $query = mysqli_query($koneksi , "SELECT * FROM course WHERE id='$id'");
            $query_tutor = mysqli_query($koneksi , "SELECT * FROM tutor WHERE class_id='$id'");
            $row = mysqli_fetch_assoc($query);
            $row_tutor = mysqli_fetch_assoc($query_tutor);

            echo "<div class='container-fluid'>
                    <div class='row'>
                        <h2 class='m-2'>Course-Details/".$id."</h2>
                    </div>
                </div>";
            echo "<div class='container-fluid' id='container'>
                    <div class='row'>
                        <div class='col'>
                            <div class='card w-100' style='width: 18rem;' id='card-body'>
                                <div class='card-body' id='card'>
                                    <h5 class='card-title'>$row[title]</h5>";
                                    if($row['jenis']==="Pemula"){
                                        echo "<h6 class='card-subtitle mb-2 text-light bg-success p-1'>Level : $row[jenis]</h6>";
                                    }
                                    else if($row['jenis']==="Menengah"){
                                        echo "<h6 class='card-subtitle mb-2 text-light bg-warning p-1'>Level : $row[jenis]</h6>";
                                    }
                                    else {
                                        echo "<h6 class='card-subtitle mb-2 text-light bg-danger p-1'>Level : $row[jenis]</h6>";
                                    }
                                echo "<p class='card-text w-75'>$row[content]</p>
                                    <p class='text-dark'>Tutor : $row_tutor[name]</p>
                                    <div class='dropdown d-inline'>
                                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                           Edit
                                        </button>
                                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                           if(mysqli_num_rows($query_tutor)==0){
                                               echo"<a class='dropdown-item' href='add_tutor.php?id=$id' id='link-add' id='disabled'>
                                                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                            <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                                            <path fill-rule='evenodd' d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                                        </svg>
                                                        Add Tutor
                                                    </a>";
                                           }
                                           else{
                                               echo "<p class='ml-4' style='cursor:pointer;'>
                                                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-check-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                            <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                                            <path fill-rule='evenodd' d='M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z'/>
                                                        </svg>
                                                        Tutor Already Add
                                                    </p>";
                                           }
                                        echo"<a class='dropdown-item' href='add_silabus.php?id=$id' id='hover'>
                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-plus-circle' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd' d='M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                                    <path fill-rule='evenodd' d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                                </svg>
                                                Add Silabus
                                            </a>
                                            <a class='dropdown-item' href='update-course.php?id=$id'>
                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd' d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                                </svg>
                                                Update
                                            </a>
                                        </div>
                                    </div>
                                    <a href='index.php' class='card-link float-right'>
                                        <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-backspace-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                            <path fill-rule='evenodd' d='M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z'/>
                                        </svg>
                                        Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";

            echo "<div class='container-fluid mb-2'>
                    <div class='row'>
                        <h4 class='ml-3 mt-1'>Silabus for " .$row['title']. "</h4>
                    </div>
                    <div class='row'>
                        <button type='button' class='btn btn-success mt-1 ml-3 float-left'>Mulai Belajar</button>
                    </div>
                </div>";

            $query_silabus = mysqli_query($koneksi , "SELECT * FROM silabus WHERE class_id='$id'");  
            echo "<div class='container-fluid'>
                    <table class='table table-bordered table-hover'>
                        <thead class='thead-light'>
                            <tr>
                                <th scope='col' class='text-center'>No</th>
                                <th scope='col' class='text-center'>Silabus</th>
                                <th scope='col' class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                            $no = 1;
                            while ($row_silabus=mysqli_fetch_assoc($query_silabus)) {
                                echo "<tr>
                                        <th scope='row' class='text-center'>$no</th>
                                        <th>$row_silabus[content]</th>
                                        <th class='d-flex justify-content-center'>
                                            <a href='delete-silabus.php?class_id=$id' class='btn btn-danger'>
                                                Delete
                                                <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                                </svg>
                                            </a>
                                        </th>
                                    </tr>";
                                $no++;
                            }

                    echo "</tbody>";
                echo "</table>";
            echo "</div>";
        ?>
        

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#hover').hover(function(){
                    $(this).append($("<small style='display:block; margin-left:5px; font-family:arial;'>Silabus Harus Benar!</small>"));
                },function(){
                    $(this).find('small').last().remove();
                }
                );
            });
        </script>
    </body>
</html>