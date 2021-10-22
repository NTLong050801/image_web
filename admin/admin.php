<?php
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
    </style>
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
                            <a class="nav-link active" aria-current="page" href="./admin/login.php">Đăng xuất</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="content">
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Thêm
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a id="viewimg" class="dropdown-item" href="#">Phong cảnh</a></li>
                    <li><a class="dropdown-item" href="#">Anime</a></li>
                    <li><a class="dropdown-item" href="#">Động vật</a></li>
                </ul>
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
                        <input type="hidden" name="action" id="action" value="insert" />
                        <input type="hidden" name="image_id" id="image_id" />
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

                    </form>
                    <?php 
                        if(isset($_POST['insert'])){
                            if($_FILES['image']['name'] != ''){
                                // echo $_FILES['image']['name'];
                                $image_name = $_FILES['image']['name'];
                                $path = $_FILES['image']['tmp_name'];
                                $des = "../Image_web/Image/Viewimg/".$image_name;
                                $upload = move_uploaded_file($path,$des);
                            }
                            else {
                                echo '<script>alert("Vui lòng chọn ảnh")</script>';
                            }
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button id="btn_upload" type="button" class="btn btn-primary">Thêm ảnh</button> -->
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
    $(document).on('click', '#viewimg', function() {
        // var action = "add_viewimg"
        $('#exampleModalLabel').html('Thêm ảnh phong cảnh');
        $('#exampleModal').modal('show');
        // $('#image_form')[0].reset();
        // $('#image_id').val('');
        // $('#action').val('add');
    })
    // $('#insert').on('click',function(event) {
    //     event.preventDefault();
    //     var image_name = $('#image').val();
    //     var filename = image_name.split('\\').pop();
    //     var action = 'insert';
    //     // alert(filename)
    //     // alert (image_name);
    //     //nếu ko chọn ảnh
    //     if (image_name == '') {
    //         alert("Vui lòng chọn ảnh");
    //         return false;
    //     } else {
    //         //cắt chuỗi lấy đuôi
    //         var ext = image_name.split('.').pop().toLowerCase();
    //         // nếu file không có 1 trog các dạng ảnh sau thì ko hợp lệ
    //         if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    //             alert("Vui lòng chọn định dạng ảnh hợp lệ !");
    //             $('#image').val('');
    //             return false;
    //         } else {
    //             $.ajax({
    //                 url: "process_add.php",
    //                 method: "POST",
    //                 data: {
    //                     image_name : image_name,
    //                     filename : filename
    //                 },// lấy dữ liệu hợp lệ từ form
    //                 success: function (dt) {
    //                     alert(dt);//alert thông báo trả về
    //                     // fetch_data();//reset lại form
    //                     // $('#image_form')[0].reset();//reset lại modal
    //                     // $('#imageModal').modal('hide');// ẩn modal
    //                 }
    //             });
    //         }
    //     }
    // })
</script>


</html>