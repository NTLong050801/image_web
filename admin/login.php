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
    </style>
</head>

<body style="background-color: #d2f4ea;">
    <div class="container">
        <form method="Post" class="form_login">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
                <input name="adm_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input name="adm_pass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Nhớ tài khoản</label>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
        <?php 
        if(isset($_POST['submit'])){
            $adm_name = $_POST['adm_name'];
            $adm_pass = $_POST['adm_pass'];
            $slt =mysqli_query($conn,"Select * from admin where adm_name = '$adm_name' and adm_pass = '$adm_pass'");
            if(mysqli_num_rows($slt) > 0){
                header('location:admin.php');
            }
        }
        
        ?>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>