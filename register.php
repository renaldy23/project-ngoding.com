<?php
session_start();
if(isset($_SESSION['main'])==true){
    header("Location: index.php");
}
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

        <script src="js/jquery.js"></script>
        <title>Register Page</title>
    </head>
    <body class="bg-light">
        <h2 class="text-center">Register</h2>
            <div class="container">
                <div id="wrapper">
                <?php
                    $warning = isset($_GET['warning'])?$_GET['warning']:false;
                    $alert = isset($_GET['alert'])?$_GET['alert']:false;
                    $email = isset($_GET['email'])?$_GET['email']:false;

                    if ($warning == "true") {
                        echo "<div class='alert alert-danger' role='alert'>
                                Mohon isi Dengan Lengkap!
                            </div>";
                    }

                    if ($alert == "true") {
                        echo "<div class='alert alert-danger' role='alert'>
                                Password Berbeda!
                            </div>";
                    }
                    
                    if($email == "true"){
                        echo "<div class='alert alert-danger' role='alert'>
                                Email sudah Terdaftar!
                            </div>";
                    }
                    
                ?>
                    <form action="proses-register.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><h3>Fullname</h3></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"><h3>Email address</h3></label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><h3>Password</h3></label>
                            <input type="password" class="form-control" id="password" name="pass">
                            <input type="checkbox" name="" id="check" style="height:25px; width:25px; margin-top=2px;"><label id="label" style="margin-left:2px;font-size:25px; margin-top:2px;">Show Password</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><h3>Re-Password</h3></label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="re-pass">
                        </div>
                        <button type="submit" class="btn btn-primary"><h5>Submit</h5></button>
                    </form>
                </div>
            </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#check').click(function(){
                    if($(this).is(':checked')){
                        $('#password').attr('type','text');
                        $('#label').text('Hide Password');
                    }
                    else{
                        $('#password').attr('type','password');
                        $('#label').text('Show Password');
                    }
                });
            });
        </script>
    </body>
</html>