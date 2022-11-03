<?php
include 'connect.php';

//target 0 : Khai thác cơ bản

// $target_dir = "uploads/";
// $image = $_FILES['image']['name'];
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
// // Can we move the file to the upload folder?
// if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
//     // No
//     echo '<pre>Your image was not uploaded.</pre>';
// } else {
//     // Yes!
//     echo "<pre>{$target_file} succesfully uploaded!</pre>";
// } 


//target 1 : Khai thác xác thực sai sót của tệp tải lên
//Thư mục lưu file upload
// $target_dir = "uploads/";
// Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
// $uploadOk = 1;
// $imageFileType = $_FILES['image']['type'];
// $imageFileSize = $_FILES['image']['size'];
// $image = $_FILES['image']['name'];
// if (($imageFileType == "image/jpeg" || $imageFileType == "image/png") &&
//     ($imageFileSize < 100000)
// ) {

//     // Can we move the file to the upload folder?
//     if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
//         // No
//         echo '<pre>Your image was not uploaded.</pre>';
//     } else {
//         // Yes!
//         echo "<pre>{$target_file} succesfully uploaded!</pre>";
//         $sql = "INSERT INTO images (image) VALUES ('$image')";
//         mysqli_query($conn, $sql);
//     }
// } else {
//     // Invalid file
//     echo '<pre>Your image was not uploaded. We can only accept JPEG or PNG images.</pre>';
// }


// //Target 2 : High File Upload Source 

$image = $_FILES['image']['name'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;

$imageFileType = $_FILES['image']['type'];
$imageFileSize = $_FILES['image']['size'];
$image_ext = substr($image, strpos($image, '.') + 1);
$image_tmp = $_FILES['image']['tmp_name'];
// Is it an image?
if ((strtolower($image_ext) == "jpg" || strtolower($image_ext) == "jpeg" || strtolower($image_ext) == "png") &&
    ($imageFileSize < 100000) &&
    getimagesize($image_tmp)
) {
    // Can we move the file to the upload folder?
    if (!move_uploaded_file($image_tmp, $target_file)) {
        // No
        echo '<pre>Your image was not uploaded.</pre>';
    } else {
        // Yes!
        echo "<pre>{$target_file} succesfully uploaded!</pre>";
        $sql = "INSERT INTO images (image) VALUES ('$image')";
        mysqli_query($conn, $sql);
    }
} else {
    // Invalid file
    echo '<pre>Your image was not uploaded. We can only accept JPEG or PNG images.</pre>';
    echo $image_ext;
}


//target 3  Impossible File Upload

//Thông tin file
// $image = $_FILES['image']['name'];

// $image_ext = substr($image, strpos($image, '.') + 1);

// $imageFileSize = $_FILES['image']['size'];

// $imageFileType = $_FILES['image']['type'];

// $image_tmp = $_FILES['image']['tmp_name'];


// // Where are we going to be writing to?
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
// $target_file   =  md5(uniqid() . $image) . '.' . $image_ext;
// $temp_file     = ((ini_get('image_tmp_dir') == '') ? (sys_get_temp_dir()) : (ini_get('image_tmp_dir')));
// $temp_file    .= DIRECTORY_SEPARATOR . md5(uniqid() . $image) . '.' . $image_ext;


// //Kiểm tra xem có phải ảnh ko 
// if ((strtolower($image_ext) == 'jpg' || strtolower($image_ext) == 'jpeg' || strtolower($image_ext) == 'png') &&
//   ($imageFileSize < 100000) &&
//   ($imageFileType == 'image/jpeg' || $imageFileType == 'image/png') &&
//   getimagesize($image_tmp)
// ) {


//   //Loại bỏ mọi siêu dữ liệu, bằng cách mã hóa lại hình ảnh 
//   if ($imageFileType == 'image/jpeg') {
//     $img = imagecreatefromjpeg($image_tmp);
//     imagejpeg($img, $temp_file, 100);
//   } else {
//     $img = imagecreatefrompng($image_tmp);
//     imagepng($img, $temp_file, 9);
//   }
//   imagedestroy($img);
//   // kiểm tra có thể di chuyển tệp đến thư mục gốc từ thư mục tạm thời không?
//   if (rename($temp_file, (getcwd() . DIRECTORY_SEPARATOR . $target_dir . $target_file))) {
//     // Yes!
//     echo "<pre><a href='${target_dir}${target_file}'>${target_file}</a> succesfully uploaded!</pre>";
//   } else {
//     // No
//     echo '<pre>Your image was not uploaded.</pre>';
//   }


//   // Delete any temp files
//   if (file_exists($temp_file))
//     unlink($temp_file);
// } else {
//   // Invalid file
//   echo '<pre>Your image was not uploaded. We can only accept JPEG or PNG images.</pre>';
// }
