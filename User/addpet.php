<?php
session_start();
include_once '../Class/User.php';

if(isset($_POST['petreg'])){
   $uid = $_SESSION['id_num'];
   $pname = $_POST['name'];
   $ptype = $_POST['type'];
   $pgender = $_POST['gender'];
   $breed = $_POST['breed'];
   $des = $_POST['description'];

   // Process files
   $allowed = array('jpg','jpeg','png','pdf');
   $uploads = [];
   $files = ['petImage' => 'petImagePreview', 'govId' => 'govIdPreview', 'selfie' => 'selfiePreview'];

   foreach ($files as $inputName => $previewId) {
      if (isset($_FILES[$inputName])) {
         $file = $_FILES[$inputName];
         $fileName = $file['name'];
         $fileTmpName = $file['tmp_name'];
         $fileSize = $file['size'];
         $fileError = $file['error'];
         $fileType = $file['type'];

         $fileExt = explode('.', $fileName);
         $fileActualExt = strtolower(end($fileExt));

         if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
               if ($fileSize < 15000000) {
                  $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                  $fileDestination = '../images/' . $fileNameNew;
                  if (move_uploaded_file($fileTmpName, $fileDestination)) {
                     $uploads[$inputName] = $fileNameNew;
                  } else {
                     $message = 'Error moving uploaded file';
                     break;
                  }
               } else {
                  $message = 'Upload Failed! Your file is too big';
                  break;
               }
            } else {
               $message = 'There was an error uploading your file';
               break;
            }
         } else {
            $message = 'You cannot upload files of this type';
            break;
         }
      }
   }

   if (count($uploads) == 3) {
      $a = new User(); 
      $a->petreg($uid, $pname, $ptype, $breed, $pgender, $uploads['petImage'], $uploads['govId'], $uploads['selfie'], $des);
      $message = 'Upload Success!';
   } else {
      $message = $message ?? 'Upload Failed!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Upload Status</title>
</head>
<body>
   <h1><?= $message; ?></h1>
   <a href="postpet.php">Back</a>
</body>
</html>
