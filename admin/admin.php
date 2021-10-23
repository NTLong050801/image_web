<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
include('../db/cogfig.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-
    oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .form_login {
            position: absolute;
            width: 30%;
            left: 35%;
            margin-top: 200px;
            /* margin-left: -30px; */
        }

        .dropdown {
            margin-top: 50px;
        }

        .col {
            text-align: center;
        }

        .phongto {
            transition: all 1s ease;
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
        }

        .phongto:hover {
            transform: scale(2.5, 2.5);
            -webkit-transform: scale(2.5, 2.5);
            -moz-transform: scale(2.5, 2.5);
            -o-transform: scale(2.5, 2.5);
            -ms-transform: scale(2.5, 2.5);
        }
    </style>
    <audio autoplay loop src="10-ban-nhac-lofi-giup-ban-hoc-bai-tot-hon.mp3" type="audio/mp3"></audio>
</head>

<body style="background-color: #d2f4ea;">

    <div class="container">
        <!-- start navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="content">
            <div class="dropdown">
                <button style="margin-bottom: 50px;" class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Thêm
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a id="viewimg" class="dropdown-item" href="#">Phong cảnh</a></li>
                    <li><a id="animeimg" class="dropdown-item" href="#">Anime</a></li>
                    <li><a id="animalimg" class="dropdown-item" href="#">Động vật</a></li>
                </ul>
            </div>
            <div id="data">
                <div class="container overflow-hidden">
                    <div class="row gx-5">
                        <div class="col">
                            <h5 id="tview"></h5>
                            <div id="view" class="p-3 bg-light "></div>
                        </div>
                        <div class="col">
                            <h5 id="tanime"></h5>
                            <div id="anime" class="p-3 bg-light "></div>
                        </div>
                        <div class="col">
                            <h5 id="tanimal"></h5>
                            <div id="animal" class="p-3 bg-light "></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="image_form" method="post" enctype="multipart/form-data">
                        <p><label>Chọn ảnh</label>
                            <input type="file" name="image" id="image" />
                        </p><br />
                        <input type="hidden" name="action" id="action" value="" />
                        <input type="hidden" name="image_id" id="image_id" />
                        
                        <input type="submit" name="insert" id="insert" value="Thêm ảnh" class="btn btn-info" />

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button id="btn_upload" type="button" class="btn btn-primary">Thêm ảnh</button> -->
                </div>
            </div>
        </div>
    </div>

</body>
<footer class="bg-light text-center text-lg-start" style="margin-top: 50px;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-dark" href="https://www.facebook.com/profile.php?id=100028971874945">Long Nguyễn</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        fetch_data();

        function fetch_data() {
            var action = "get_view";
            var action1 = "get_anime";
            var action2 = "get_animal"

            $.ajax({
                url: "process_add.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: action,
                    action1: action1,
                    action2: action2
                },
                success: function(dt) {
                    $('#tview').html('Ảnh phong cảnh')
                    $('#tanime').html('Ảnh anime')
                    $('#tanimal').html('Ảnh động vật')
                    document.getElementById("view").innerHTML = dt[0];
                    document.getElementById("anime").innerHTML = dt[1];
                    document.getElementById("animal").innerHTML = dt[2];
                    // $('#view').html();
                    // alert(dt)
                }
            })
        }

        $(document).on('click', '#viewimg', function() {

            $('#exampleModalLabel').html('Thêm ảnh phong cảnh');
            $('#exampleModal').modal('show');
            $('#image_form')[0].reset();
            $('#image_id').val();
            $('#action').val('insert_Viewimg'); // kiểm tra xem hành động gì insert , update , ...
            // $('#insert').val('Insert')
        })
        $(document).on('click', '#animeimg', function() {

            $('#exampleModalLabel').html('Thêm ảnh anime');
            $('#exampleModal').modal('show');
            $('#image_form')[0].reset();
            $('#image_id').val();
            $('#action').val('insert_animeimg'); // kiểm tra xem hành động gì insert , update , ...
            // $('#insert').val('Insert')
        })
        $(document).on('click', '#animalimg', function() {

            $('#exampleModalLabel').html('Thêm ảnh động vật');
            $('#exampleModal').modal('show');
            $('#image_form')[0].reset();
            $('#image_id').val();
            $('#action').val('insert_animalimg'); // kiểm tra xem hành động gì insert , update , ...
            // $('#insert').val('Insert')
        })

        $('#image_form').submit(function(event) {
            event.preventDefault();
            var image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image File"); // in ra thông báo ảnh ko hợp lệ
                    $('#image').val(''); // value ảnh bằng rỗng
                    return false;
                }
                // nếu ảnh có trong mảng 
                else {
                    $.ajax({
                        url: "process_add.php",
                        method: "POST",
                        data: new FormData(this), // lấy dữ liệu hợp lệ từ form
                        contentType: false,
                        processData: false,
                        success: function(dt) {
                            // alert(dt);//alert thông báo trả về
                            fetch_data(); //reset lại form
                            $('#image_form')[0].reset(); //reset lại modal
                            $('#exampleModal').modal('hide'); // ẩn modal
                            alert(dt);
                        }
                    });
                }
            }
        });

        $(document).on('click', '.delete', function() {
            var action = "delete"
            var id = $(this).attr("id");
            var val = $(this).val()
            $.ajax({
                url: "process_add.php",
                method: "Post",
                data: {
                    id: id,
                    val: val,
                    action: action
                },
                success: function(data) {
                    fetch_data()
                    alert(data)
                }
            })
        })
    })
</script>


</html>