<?php
session_start();
include('../db/cogfig.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    </style>
</head>

<body style="background-color: #d2f4ea;">
    <div class="container">
        <form method="Post" class="form_login">
            <h2>Đăng ký</h2>
            <br>
            <?php 
                if(isset($_SESSION['meseger'])){
                    echo $_SESSION['meseger'];
                    unset($_SESSION['meseger']);
                }
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
                <input name="adm_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input name="adm_pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu</label>
                <input name="adm_pass1" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
        <?php 
        if(isset($_POST['submit'])){
            $adm_name = $_POST['adm_name'];
            $adm_pass = $_POST['adm_pass'];
            $adm_pass1 = $_POST['adm_pass1'];
            $slt = mysqli_query($conn,"select adm_name from admin where adm_name = '$adm_name'");
            if(mysqli_num_rows($slt)>0){
                $_SESSION['meseger'] = '<h4 style = "color : red">Tài khoản đã tồn tại</h4>';
                header('location:signup.php');
                
            }
            else {
                if($adm_pass == $adm_pass1){
                    $insert = mysqli_query($conn,"Insert into admin(adm_name,adm_pass,status)
                    values ('$adm_name','$adm_pass','0')");
                    if($insert){
                        header('location:admin.php');
                    }
                }else{
                    $_SESSION['meseger'] = '<h4 style = "color : red">Mật khẩu xác nhận không khớp</h4>';
                    header('location:signup.php');
                }


            }
        }
        
        ?>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>