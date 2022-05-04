<?php
require("DBconnect.php");
$pNo=$_GET['pNo'];

$SQL="SELECT * FROM photo WHERE pNo='$pNo'";

if($result=mysqli_query($link,$SQL)){
    while($row=mysqli_fetch_assoc($result)){
        
    }

}
?>

<h1>使用者更新</h1>
<form action="pupdateconfirm.php" method="post" enctype="multipart/form-data">
photo num:<?php echo $pNo; ?><br/>
<input type="hidden" name="pNo" value='<?php echo $pNo; ?>'>
請選擇要更換的圖片: <input type="file" name="photo" accept="image/*"><br/>  
<input type="submit" value="更新"><br/>
</form> 
