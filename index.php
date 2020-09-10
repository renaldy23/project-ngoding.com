<?php
    session_start();
    include_once('helper/koneksi.php');
    $login = isset($_SESSION['login'])?$_SESSION['login']:false;
    $register = isset($_SESSION['register'])?$_SESSION['register']:false;
    $featrues = isset($_GET['module'])?$_GET['module']:false;
    $course = isset($_SESSION['course'])?$_SESSION['course']:false;
    $add = isset($_GET['add'])?$_GET['add']:false;
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
        <title>NgodingYuk | Home</title>
    </head>
    <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <?php
            if ($register || $login || $course == true) {

                echo "<a class='navbar-brand text-primary' href='index.php'><img src='img/logo.png' width ='350px'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                    <div class='collapse navbar-collapse d-flex justify-content-end' id='navbarNav'>
                        <ul class='navbar-nav'>
                            <li class='nav-item active'>
                                <a class='nav-link' href='logout.php'><h3>Logout</h3></a>
                            </li>
                        </ul>
                    </div>";
            }
            else{
                echo "<a class='navbar-brand text-primary'href='index.php'><img src='img/logo.png' width='350px'></a>
                        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
                            <span class='navbar-toggler-icon'></span>
                        </button>
                        <div class='collapse navbar-collapse d-flex justify-content-end' id='navbarNav'>
                            <ul class='navbar-nav'>
                                <li class='nav-item active'>
                                    <a class='nav-link' href='index.php'><h3>Home</h3></a>
                                </li>
                                <li class='nav-item active'>
                                    <a class='nav-link' href='index.php?module=features'><h3>Features</h3></a>
                                </li>
                            </ul>
                        </div>";
            }
        ?>
    </nav>

    <div class="container-fluid  mt-3" id="content">
       <?php
        if($register || $login || $course == true){
            include_once 'main.php';
        }
        else{
            echo "<div class='row bg-white pb-3 pt-1' id='row'>
                    <div class='col'>
                        <h2 class='text-center'>Indonesia mari Ngoding</h2>
                        <h5 class='text-center'><i>PT.INDONESIANGODING</i></h5>
                    </div>
                </div>
 
                <div class='row bg-white pb-2'>
                    <div class='col'>
                        <h3 class='text-center'>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Voluptate officiis quaerat, quasi minima, beatae quisquam 
                            provident a dolore reiciendis explicabo totam inventore iusto, 
                            ea sunt officia illum ab facere alias.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Voluptate officiis quaerat, quasi minima, beatae quisquam 
                            provident a dolore reiciendis explicabo totam inventore iusto, 
                            ea sunt officia illum ab facere alias.
                        </h3>
                    </div>
                </div>
 
                <div class='row bg-white'>
                    <div class='col'>
                        <a href='login.php' class='btn btn-primary d-flex justify-content-center'>Getting Started</a>
                    </div>
                </div>";

                if($featrues == "features"){
                    include_once "features.php";
                }
        }
       ?>
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            const card = document.getElementById('card');
            const close = document.getElementById('close');

            close.addEventListener("click" , function(){
                card.style.display='none';
            })
        </script>
    </body>
</html>