<?php
//$conn = mysqli_connect('localhost', 'root', '', 'hienmau')
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
    <link rel="stylesheet" href="style.css">
    <style>
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* .column {
            float: left;
            width: 50%;
            padding: 10px;
        } */

        .column img {
            margin-top: 12px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 10px;
            /* background-color: #2196F3; */
            padding: 10px;
        }

        /* .grid-container>div {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 20px 0;
            font-size: 30px;
        } */
        .size_img {
            margin-bottom: 15px;
            padding: 15px;
        }

        .size_img img {
            border-radius: 15px;
            border: 2px solid;
        }

        #modal_img {
            width: 100%;
            max-height: 650px;
            /* max-width: 500px; */
        }
    </style>
</head>

<body style="background-color: #d2f4ea;">
    <div class="container">
        <!-- strat navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./admin/login.php">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./admin/signup.php">Đăng ký</a>
                        </li>

                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- end navbar -->

        <div class="title">
            <div class="btn-group " role="group" aria-label="Basic outlined example">
                <button id="view" name="viewimg" type="button" class="btn btn-outline-primary">Phong cảnh</button>
                <button id="anime" name="animeimg" type="button" class="btn btn-outline-primary">Anime</button>
                <button id="animal" name="animalimg" type="button" class="btn btn-outline-primary">Động vật</button>
            </div>
        </div>
        <div class="data" id="data">
            <div id="row" class="row">
                <div class="grid-container">
                    <div id="col" class="column"></div>
                    <div id="col1" class="column"></div>
                </div>
            </div>
        </div>
    </div>

</body>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                <button id="close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modal_img" src="" alt="">
            </div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        fetch_data()

        function fetch_data() {
            var action = "viewimg";
            var name = "view"
            $.ajax({
                url: "process_data.php",
                method: "POST",
                dataType: "json",
                data: {
                    action: action,
                    name: name
                },
                success: function(dt) {
                    //document.getElementById("view").style.backgroundColor = "blue";
                    //document.getElementById("view").style.color = "pink";
                    document.getElementById("col").innerHTML = dt[0];
                    document.getElementById("col1").innerHTML = dt[1];
                }
            })
        }
    })
    // $('#view').on('click',fetch_data())

    $('#anime').on('click', function() {
        var action = "animeimg";
        var name = "anime"
        $.ajax({
            url: "process_data.php",
            method: "POST",
            dataType: "json",
            data: {
                action: action,
                name: name
            },
            success: function(dt) {

                //document.getElementById("anime").style.backgroundColor = "blue";
                //document.getElementById("anime").style.color = "pink";
                document.getElementById("col").innerHTML = dt[0];
                document.getElementById("col1").innerHTML = dt[1];
            }
        })
    })

    $('#animal').on('click', function() {
        var action = "animalimg";
        var name = "animal"
        $.ajax({
            url: "process_data.php",
            method: "POST",
            dataType: "json",
            data: {
                action: action,
                name: name
            },
            success: function(dt) {

                //document.getElementById("anime").style.backgroundColor = "blue";
                //document.getElementById("anime").style.color = "pink";
                document.getElementById("col").innerHTML = dt[0];
                document.getElementById("col1").innerHTML = dt[1];
            }
        })
    })



    $('#view').on('click', function() {
        var action = "viewimg"

        var name = "view"
        $.ajax({
            url: "process_data.php",
            method: "POST",
            dataType: "json",
            data: {
                action: action,
                name: name
            },
            success: function(dt) {

                //document.getElementById("anime").style.backgroundColor = "blue";
                //document.getElementById("anime").style.color = "pink";
                document.getElementById("col").innerHTML = dt[0];
                document.getElementById("col1").innerHTML = dt[1];
            }
        })
    })

    $(document).on('click', 'img', function() {
        var srcimg = $(this).attr("src");
        var name = $(this).attr("id");
        //    alert(id)

        document.getElementById("modal_img").src = srcimg;
        $('#exampleModal').modal('show')
        

    })

    $(document).on('click', '#close', function() {
            if (confirm("Bạn có muốn tải ảnh này không ?")) {
                // var url = srcimg;
                // var action = "download"
                // $.ajax({
                //     url: "process_data.php",
                //     method: "Post",
                //     data: {
                //         url: url,
                //         action: action,
                //         name: name
                //     },
                //     success: function(dt) {
                //         // alert(dt)
                //     }

                // })
                alert("Long đang làm chức năng này !")

            } else {
                // alert('ok bạn')
            }
        })
</script>

</html>