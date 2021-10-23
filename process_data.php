<?php
include('./db/cogfig.php');
if ($_POST['action'] == 'viewimg' or $_POST['action'] == 'animeimg' or $_POST['action'] == 'animalimg') {
    $tab_name = $_POST['action'];
    $name = $_POST['name'];
    $count_view = mysqli_query($conn, "Select count(id) from $tab_name");
    // if (mysqli_fetch_assoc($count_view)['count(id)'] % 2 == 0) {
    $count = mysqli_fetch_assoc($count_view)['count(id)'] / 2;
    $count_int = intval($count) + 1;
    $count_int_1 =  intval($count);
    // } 
    // else {
    //     $count = mysqli_fetch_assoc($count_view)['count(id)'] / 2;
    //     $count_int = intval($count) + 1;
    //     $count_int_1 = $count_int;
    // }


    // echo $count_int;
    $sql_asc = "select * from $tab_name order by id asc limit $count_int ";
    $slt_view_asc = mysqli_query($conn, $sql_asc);
    if (mysqli_num_rows($slt_view_asc) > 0) {
        $output = '<div >';
        while ($row_view = mysqli_fetch_assoc($slt_view_asc)) {
            $output .=
                '<div class = "size_img">
            <img id ="' . $row_view['' . $name . '_name'] . '" style="width:100%" src="./Image/' . $tab_name . '/' . $row_view['' . $name . '_name'] . '" alt="">
            </div>
            ';
        }
        $output .= ' </div>';
    }

    $sql_desc = "select * from $tab_name order by id desc limit $count_int_1 ";
    $slt_view_desc = mysqli_query($conn, $sql_desc);
    if (mysqli_num_rows($slt_view_desc) > 0) {
        $output1 = '<div>';
        while ($row_view = mysqli_fetch_assoc($slt_view_desc)) {
            $output1 .= '
            <div class = "size_img" style = " margin-bottom: 5px;">
            <img style="width:100%" src="./Image/' . $tab_name . '/' . $row_view['' . $name . '_name'] . '" alt="">
            </div>
            ';
        }
        $output .= ' </div>';
    }
    $arr = [$output, $output1];
    echo json_encode($arr);
}

// if ($_POST['action'] == "download") {
//     $url = $_POST['url'];
//     $path = 'http://localhost:88//image_web/Image/viewimg/RE4wpp2.jpg';
//     // echo $path;


//     $img = "./download/";
//     $file_name = "longdeptrai";

//     if (file_exists($path)) {
//         //split the extension and name from eachother
//         $e = explode('.', $path);

//         //get the name of the file
//         // $file_name = $e[0];

//         //image extension
//         $extension = $e[1];

//         // Send a header saying we'll be displaying a picture
//         header('Content-type: image/' . $extension);

//         // Name the file
//         header('Content-Disposition: attachment; filename="' . $file_name . '.' . $extension . '"');

//         // Path to the picture you're wanting the user/viewer to download
//         readfile($file_name . '.' . $extension);
//     } else {
//         echo 'The requested image does not exist.';
//     }
// }
