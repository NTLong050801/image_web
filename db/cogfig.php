<?php 
    // $conn = mysqli_connect('localhost','root','','image_web');
    $conn = mysqli_connect('localhost','root','','image_web');
$conn ->set_charset('utf8');
if(mysqli_connect_errno()){
    echo 'connect failed:'.mysqli_connect_errno();
}
