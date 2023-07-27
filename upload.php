<?php 
include('connection.php');


if (isset($_FILES['image'])) {
   
   
   
   $image_type = $_FILES['image']['type'];

  switch ($image_type) {
   case 'image/png':
      $type = '.png';
      break;
   case 'image/jpg':
      $type = '.jpg';
      break;
   case 'image/jpeg':
      $type = '.jpeg';
      break;    
   case 'image/gif':
      $type = '.gif';
      break;      
   default:
      $type= 'jpg';
      break;
  }


   $_FILES['image']['name'] = time().uniqid(rand()).$type;
   $image_name = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   
   $target = "pictures/".basename($_FILES['image']['name']);
   
   $info = getimagesize($_FILES['image']['tmp_name']);
   $sql = "INSERT INTO pictures (image_name) VALUES ('$image_name')";
   mysqli_query($con , $sql);
   
   if ($info === FALSE) {
      header("Location: index.php?status=fail&err=Sorry, an error occurred. Please enter a valid image.");

   } else if ($image_size> 3000000) {
      header("Location: index.php?status=fail&err=Sorry, The file is too large.");
      
   } else if (move_uploaded_file($image_tmp_name, $target)) {
      
         header("Location: index.php?status=loading&n=$image_name");
      
   }
   else{
         header("Location: index.php?status=fail&err=Sorry, an error occurred. Please try again.");
        

   }
}
