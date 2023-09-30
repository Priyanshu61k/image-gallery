 <?php
 include 'dbcon.php';   
 if ($_FILES['fileInput']['name'] !=''){
            
 $filename=$_FILES['fileInput']['name'];
 $file_type=$_FILES['fileInput']['type'];
 $file_type_name=$_FILES['fileInput']['name'];
 $file_size=$_FILES['fileInput']['size'];
 $fileerror=$_FILES['fileInput']['error'] ;       
        
$extension=pathinfo($filename,PATHINFO_EXTENSION);
 
  $validextensions=array("array","jpeg","png","gif");

    if(in_array($extension,$validextensions)){
    
      $path="images/".$filename ;
   
  if(move_uploaded_file($_FILES['fileInput']['tmp_name'],$path)){
    echo '<img src="'.$path.'"/><br>';
    echo'NAME:<input type="text" name="image-name" value="'.$filename.'" /><br>'; 
    echo'SIZE:<input type="text" name="size" value="'.$file_size.'" /><br>';
    echo'LOCATION: <input type="text"  value="'.$file_type_name.'" /><br>'; 
          
      
     
    $sq= "INSERT INTO `images`( `image-name`,`size`, `storage`,`status`,`created`) 
    VALUES ('$filename','$file_size','$file_type_name','','$file_type')";
    $r=mysqli_query($con,$sq);

    if($r){
     echo   '<script>alert("fileuploaded")</script>';
   }
            
  }else{
    echo   '<script>alert("file not uload")</script>';
  }
   
 } else{
   echo   '<script>alert("invalid file format")</script>';
   }

    }  else{
    echo   '<script>alert("please select file")</script>';
  }   
?>
  