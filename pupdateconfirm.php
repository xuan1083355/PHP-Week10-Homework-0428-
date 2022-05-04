<?php
require("DBconnect.php");
$pNo=$_POST['pNo'];

$photoname=$_FILES["photo"]["tmp_name"];
$pathpart=pathinfo($_FILES['photo']['name']);  //取得檔案路徑
$extname=$pathpart['extension'];
//產生新檔案名稱
$finalphoto="Photo_".time().".".$extname; 

$now=time();
$SQL="UPDATE photo SET ppath='$finalphoto', pdate='$now' WHERE pNo='$pNo'";

if(copy($_FILES['photo']['tmp_name'],$finalphoto)){
    if(mysqli_query($link,$SQL)){
        echo "<script type='text/javascript'>";
        echo "alert('照片更新成功')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photolist.php'>";  //content=0-->0秒 
    }else{
        echo "<script type='text/javascript'>";
        echo "alert('照片更新失敗')";
        echo "</script>";
        echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
    }
}else{
    echo "<script type='text/javascript'>";
    echo "alert('照片更新失敗')";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=photo.php'>";
}
?>