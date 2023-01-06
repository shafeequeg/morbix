<?php



$upload_dir = 'gallery/';
$target_file = basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" )
{
    $_SESSION['msg']="Sorry, only JPG, JPEG, PNG & GIF files are allowed";

}
else
{
    if (!empty($_FILES)) {
        $tempFile = $_FILES['file']['tmp_name'];
        // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
        $targetPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;
        // Adding timestamp with image's name so that files with same name can be uploaded easily.
        $time=time();
        $mainFile = $targetPath.$time.'-'. $_FILES['file']['name'];
        move_uploaded_file($tempFile,$mainFile);
        $fileupload[] = basename( $_FILES['file']['name']);


    }

}
$image=implode(',',$fileupload);
$img = $time.'-'.$image;

$uploadsql = "INSERT INTO gallery (image)
                  VALUES ('$img')";
mysql_query($uploadsql);


?>

