<!-- 
<?php

include 'config.php';

$dir = "../media/";
$file = $dir . basename($_FILES["fileForUpload"]["name"]);
$uploadOk = 1;

$connection = ssh2_connect('soundboard.datbiscuit.tools');
ssh2_auth_password($connection, $userAdmin, $pswdAdmin);

$stream = ssh2_exec($connection, '/usr/local/bin/php -i');

if(!$stream) {
  echo "Stream doesnt exist";
} else {
  echo "Stream does exist"
}

// Check if image file is a actual file
if(isset($_POST["submit"])) {
  if(file_exists(($file))) {
    echo "File already exists";
    $uploadOk = 0;
  } else {
    echo "File does not exist";
    $uploadOk = 1;
  }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileForUpload"]["tmp_name"], $file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileForUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
?> -->
