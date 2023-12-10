<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadsDirectory = 'files/';

    // Extract file extension from the original file name
    $originalFileName = $_FILES['file']['name'];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Generate a shorter random name with the correct file extension
    $randomName = uniqid() . '-' . bin2hex(random_bytes(8)) . '.' . $fileExtension;
    $targetFile = $uploadsDirectory . $randomName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $fileLink = "http://peanutlord.rf.gd/{$targetFile}";
        echo $fileLink;
    } else {
        echo "Error uploading file.";
    }
}
?>
