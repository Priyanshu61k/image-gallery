<?php
include "dbcon.php";
$result1 =  $con->query("SELECT `image-name` FROM `images` WHERE `img-catgeory`=1");
if ((isset($_POST["access_token"]))==$result1){
  while($row = $result1->fetch_assoc()){ 
      
    echo'<div>
      <table  border="1px" cellpadding="4" cellspacing="50">
     <tr> 
      <td><img src="images/'.$row['image-name'].'" style="height: 200px;width:200px;"/> 
      </td>
      </tr>
      </table>
      </div>'; 
   
  }
}else{
  echo   '<script>alert("please select proper page")</script>';
}
?>

