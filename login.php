<!DOCTYPE html>
<html lang="en">
<head>
<style>
 body{
  background-image: url("DOWNLOAD.JPG");
 
  height: 620px; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover; 
 }
 .login{
  text-align:center;
  padding: 50px;
 }
 </style>
</head>
<body>
<div class="container  my-5">
<form method="POST" >   
<div class="login" onClick={handleclose} />
<h1> LOGIN FORM</h1> 
<label htmlfor="name">Name</label>
<input type="text" id="name" name="name" autocomplete="off" placeholder="enter your name" onChange={handleonchange}   /><br><br><br> 
   
   
<label htmlfor="email">Email</label>
<input type="email" id="email" name="email" autocomplete="off" placeholder="enter your email"  /><br><br><br>
   

<label htmlfor="password">Password</label>
<input type="password" id="password" name="password" autocomplete="off" placeholder="enter your password"/><br><br><br>

<button type="submit" class="submit" name ="submit">submit</button><br><br><br>
</form>


</div>  
</body>
</html>
<?php
include 'dbcon.php';
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];

$password=$_POST['password'];
 
$sql="insert into `login` (name,email,password) 
values ('$name','$email','$password')";

$result=mysqli_query($con,$sql);
if  ($result){
 //echo "successfully  inserted";
header ('location:index.php');
}
else{
die(mysqli_error($con));
}
}
?>
