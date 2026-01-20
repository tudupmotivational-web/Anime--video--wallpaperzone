<?php
if(isset($_POST['submit'])){
    $targetDir = "uploads/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedTypes = ['jpg','jpeg','png','gif','mp4','webm','ogg'];

    if(in_array($fileType, $allowedTypes)){
        if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)){
            echo "File ". htmlspecialchars($fileName). " uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only images and videos are allowed!";
    }

    echo "<br><a href='index.html'>Go Back</a>";
}
?>
