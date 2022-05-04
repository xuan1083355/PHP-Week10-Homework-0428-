<?php
require("DBconnect.php");
//$photoname=$_FILES["photo"]["tmp_name"];
//echo $photoname;

//取得副檔名
$pathpart=pathinfo($_FILES['photo']['name']);  //取得檔案路徑
$extname=$pathpart['extension'];   //extension:副檔名
echo $extname;

//產生新檔案名稱
$finalphoto="Photo_".time().".".$extname;   //注意如果一秒內傳入很多檔案(時間戳記爆炸)，可以添加"使用者名稱"來辨別
$now=time();

//照片路徑加上資料庫
$SQL="INSERT INTO photo(ppath,pdate) VALUES ('$finalphoto','$now')";

//上傳檔案 
if(copy($_FILES['photo']['tmp_name'],$finalphoto)){
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片上傳失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
    }
}else{
    echo "<script type='text/javascript'>";
    echo "alert('照片上傳失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
}
?>