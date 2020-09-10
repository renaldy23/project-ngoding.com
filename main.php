<?php
include_once 'helper/koneksi.php';

$_SESSION['main'] = true;

echo "<div class='container-fluid'>
        <h2>Dashboard Admin</h2>
        <hr>
    </div>";

echo "<div class='container-fluid'>
        <a href='add_course.php' class='btn btn-success'>+Add Course</a>
    </div>";

    if($add==="true"){
        echo "<div class='alert-success p-2 mt-2' id='card'>
                <strong>Berhasil!</strong> Menambahkan 1 Course
                <div class='float-right' id='close' style='cursor:pointer;'>X</div>
            </div>'";
    }

        $query = mysqli_query($koneksi , "SELECT * FROM course");
        if(mysqli_num_rows($query)){
            echo "<div class='container-fluid mt-2'>
                    <div class='row'>";
                        while($rows = mysqli_fetch_assoc($query)){
                            echo " <div class='col-3 mt-2'>
                                        <div class='card w-100 shadow p-3 mb-5 bg-white rounded' style='width: 18rem;'>
                                            <div class='card-body'>
                                            <h5 class='card-title'>$rows[title]</h5>";
                                            if($rows['jenis']==="Pemula"){
                                                echo "<h6 class='card-subtitle mb-2 text-light bg-success p-1'>Level : $rows[jenis]</h6>";
                                            }
                                            else if($rows['jenis']==="Menengah"){
                                                echo "<h6 class='card-subtitle mb-2 text-light bg-warning p-1'>Level : $rows[jenis]</h6>";
                                            }
                                            else {
                                                echo "<h6 class='card-subtitle mb-2 text-light bg-danger p-1'>Level : $rows[jenis]</h6>";
                                            }
                                        echo "<h6 class='text-muted'>$rows[tags]</h6>
                                            <a href='course-detail.php?detail=$rows[id]' class='card-link'>
                                                View Silabus
                                                 <svg width='1em' height'1em' viewBox='0 0 16 16' class='bi bi-eye' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                                                    <path fill-rule='evenodd' d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z'/>
                                                    <path fill-rule='evenodd' d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
                                                </svg>
                                            </a>
                                            </div>
                                        </div>
                                    </div>";
                        }
                    echo"<div>";
            echo "</div>";
        }
        else{
            echo "<div class='row pb-3 pt-1'>
                    <div class='col'>
                        <p><h5  class='text-center'>Saat ini belum ada Course</h5></p>
                    </div>
                </div>";
        }

?>