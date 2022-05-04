<?php

require("DBconnect.php");

$SQL="SELECT * FROM photo";

echo "<h1>我的相簿</h1>";
$count=1;

if($result=mysqli_query($link,$SQL)){
    echo "<table border='1' width='20%'>";
    while($row=mysqli_fetch_assoc($result)){
        /**if(($count%5)==1){
            echo "<tr>";
            echo "<td>";
            echo "<a href='/exercise/0428/".$row['ppath']."'>";
            echo "<img src='/exercise/0428/".$row['ppath']."' width='100%'>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            $count+=1;
        }else{
            echo "<td>";
            echo "<a href='/exercise/0428/".$row['ppath']."'>";
            echo "<img src='/exercise/0428/".$row['ppath']."' width='100%'>";
            echo "</a>";
            echo "</td>";
            $count+=1;
        }**/
        echo "<tr>";
        echo "<td>";
        echo "照片編號: ".$row['pNo']."<br/>";
        echo "<a href='/exercise/0428/".$row['ppath']."'>";
        echo "<img src='/exercise/0428/".$row['ppath']."' width=100%>";
        echo "</a>";
        echo "<a href='pupdate.php?pNo=".$row['pNo']."'>更新照片</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

//作業:更新照片

?>