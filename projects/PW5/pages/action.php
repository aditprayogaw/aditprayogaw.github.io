<!-- Move_uploaded_file() -->
<?php 
    $dirktori = "upload/";
    $uploadfile = $dirktori .
    $_FILES["file"]["tmp_name"];
    move_uploaded_file($_FILES["file"]["tmp_na
        me"],$uploadfile);   
?>