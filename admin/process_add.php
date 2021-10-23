<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('location:login.php');
}
include('../db/cogfig.php');
if (isset($_POST['action'])) {
    if ($_POST['action'] == "get_view" and $_POST['action1'] == 'get_anime' and $_POST['action2'] == 'get_animal') {
        // echo 'ok';

        $slt_view = mysqli_query($conn, "Select * from viewimg");
        $slt_anime = mysqli_query($conn, "Select * from animeimg");
        $slt_animal = mysqli_query($conn, "Select * from animalimg");


        $output_view = '
           <table style = "background-color: whitesmoke;" class="table table-bordered table-striped" style = "">  
            <tr>
             <td style = "text-align : center" width="2%">ID</td>
             <td width="34%">Image</td>
             <td width="2%">Remove</td>
            </tr>
          ';
        //ĐƯA VỀ MẢNG
        $i = 1;
        while ($row_view = mysqli_fetch_array($slt_view)) {
            // content data
            $output_view .= ' <tr>
             <td  style = "text-align : center" >' . $i . '</td>
             <td>
              <img class ="phongto"src="../Image/Viewimg/' . $row_view['view_name'] . '" height="120" width="150"   class="img-thumbnail" />
             </td>
             <td><button value ="viewimg" type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row_view["id"] . '">Xóa</button></td>
            </tr>
           ';
            $i++;
        }
        $output_view .= '</table>';


        $output_anime = '
           <table style = "background-color: whitesmoke;" class="table table-bordered table-striped" style = "">  
            <tr>
             <td style = "text-align : center" width="2%">ID</td>
             <td width="34%">Image</td>
             <td width="2%">Remove</td>
            </tr>
          ';
        //ĐƯA VỀ MẢNG
        $j = 1;
        while ($row_anime = mysqli_fetch_array($slt_anime)) {
            // content data
            $output_anime .= ' <tr>
             <td  style = "text-align : center" >' . $j . '</td>
             <td>
              <img class ="phongto"src="../Image/animeimg/' . $row_anime['anime_name'] . '" height="80" width="100" class="img-thumbnail" />
             </td>
             <td><button value ="animeimg" type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row_anime["id"] . '">Xóa</button></td>
            </tr>
           ';
            $j++;
        }
        $output_anime .= '</table>';

        $output_animal = '
           <table style = "background-color: whitesmoke;" class="table table-bordered table-striped" style = "">  
            <tr>
             <td style = "text-align : center" width="2%">ID</td>
             <td width="34%">Image</td>
             <td width="2%">Remove</td>
            </tr>
          ';
        //ĐƯA VỀ MẢNG
        $i = 1;
        while ($row_animal = mysqli_fetch_array($slt_animal)) {
            // content data
            $output_animal .= ' <tr>
             <td  style = "text-align : center" >' . $i . '</td>
             <td>
              <img class ="phongto"src="../Image/animalimg/' . $row_animal['animal_name'] . '" height="80" width="100" class="img-thumbnail" />
             </td>
             <td><button  value ="animalimg" type="button" name="delete" class="btn btn-danger bt-xs delete" id="' . $row_animal["id"] . '">Xóa</button></td>
            </tr>
           ';
            $i++;
        }
        $output_animal .= '</table>';
        $arr = [$output_view, $output_anime, $output_animal];
        echo json_encode($arr);
    }




    //insert ảnh
    if ($_POST['action'] == 'insert_Viewimg' or $_POST['action'] == 'insert_animeimg' or $_POST['action'] == 'insert_animalimg') {
        $ext = explode("_", $_POST['action'])[1];
        // echo $ext;
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            $path = $_FILES['image']['tmp_name'];
            $des = "../Image/" . $ext . '/' . $image_name;
            $upload = move_uploaded_file($path, $des);
            if ($upload == true) {
                if ($ext == 'Viewimg') {
                    $insert_view = mysqli_query($conn, "Insert into viewimg(view_name) values ('$image_name')");
                }
                if ($ext == 'animeimg') {
                    $insert_view = mysqli_query($conn, "Insert into animeimg(anime_name) values ('$image_name')");
                }
                if ($ext == 'animalimg') {
                    $insert_view = mysqli_query($conn, "Insert into animalimg(animal_name) values ('$image_name')");
                }
                echo 'Bạn đã thêm ảnh thành công';
            } else {
                echo 'Thêm ảnh thất bại';
            }
        }
    }
    $adm_name_get = $_SESSION['login'];
    if ($_POST['action'] == "delete") {
        $slt_status = mysqli_query($conn, "Select status from admin where adm_name = '$adm_name_get'");
        $slt_adm = mysqli_fetch_assoc($slt_status)['status'];
        if ($slt_adm == '1') {
            $id = $_POST['id'];
            $val = $_POST['val'];
            $delete = mysqli_query($conn, "Delete from $val where id ='$id'");
            if ($delete) {
                echo "Xóa thành công";
            } else {
                echo "Xóa ảnh thất bại";
            }
        }
        else {
            echo "Bạn không đủ quyền để xóa !";
        }
    }
}
