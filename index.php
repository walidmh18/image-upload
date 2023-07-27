<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Image Uploader</title>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="./script.js" defer></script>
</head>

<body>
   <div class="container">

      <div id="uploadForm" class="steps" style="display: 
      <?php if (!isset($_GET['status']) || $_GET['status'] == 'fail') {
         echo 'block';
      } else if ($_GET['status'] == 'success' || $_GET['status'] == 'loading') {
         echo 'none';
      } ?> 
      ;">
         <h2>Upload your image</h2>
         <p class="info">File should be .Jpeg , .Png ...</p>

         <?php
         if (isset($_GET['err'])) {
         ?><p class="errMsg"><?php echo $_GET['err']; ?></p><?php
                                                            }

                                                               ?>

         <form action="upload.php" method="POST" class="imageUploadForm" enctype="multipart/form-data">
            <label for="image" id="dragArea">
               <input type="file" name="image" id="image" hidden accept="image/*">
               <div class="labelContent">
                  <img src="./image.svg" alt="">
                  <p>Click here to Upload an Image</p>
                  <span>OR</span> <br>
                  <p>Drag the Image and drop it to start uploading</p>
               </div>
            </label>
         </form>
      </div>

      <div class="steps" id="loading" style="display: 
      <?php if (!isset($_GET['status']) || $_GET['status'] == 'fail' || $_GET['status'] == 'success') {
         echo 'none';
      } else if ($_GET['status'] == 'loading') {
         echo 'block';
      } ?> 
      ;">
         <h2>Uploading...</h2>
         <div class="loader"></div>

      </div>

      <div class="steps" id="uploadSuccess" style="display: 
      <?php if (!isset($_GET['status']) || $_GET['status'] == 'fail' || $_GET['status'] == 'loading') {
         echo 'none';
      } else if ($_GET['status'] == 'success') {
         echo 'block';
      } ?> 
      ;">
         <a class="backBtn" href="/"><i class="fa-solid fa-chevron-left"></i></a>
         <p class="check">
            <i class="fa-solid fa-check"></i>
         </p>
         <h2>Uploaded Successfully.</h2>
         <img src="<?php if (isset($_GET['n'])) {
                        $link = $_GET['n'];
                        echo 'http://image-uploader-by-walidmh.free.nf/pictures/' . $link;
                     } ?>" alt="">

         <div class="linkOutput">
            <span><?php echo 'image-uploader-by-walidmh.free.nf/pictures/' . $link ?></span>
            <button onclick="copyToClipboard()" id="copyToClipBoardBtn">Copy</button>
         </div>
      </div>
   </div>
</body>

</html>