<?php

include('db_connect.php');

session_start();

if (isset($_POST['submit'])) {
    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExtension = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExtension));

    $allowWebs = array('jpg', 'jpeg', 'png', 'pdf', 'pptx', 'docx');

    if (in_array($fileActualExt, $allowWebs)) {
        if ($fileError == 0) {
            if ($fileSize < 10000000000) {
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'upload/' . $fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: achv.php?uploadsuccess");
            } else {
                echo "File size is too big";
            }
        } else {
            echo "Error uploading file";
        }
    } else {
        echo "This type of file is not allowed.";
    }

    $sql = "INSERT INTO COFiles (types, title, file_link, descriptions, keywords, tag_faculty, file) 
    VALUES ('$types','$title','$file_link','$descriptions','$keywords','$tag_faculty','$fileDestination')";
    $result = mysqli_query($dbc, $sql)
        or die("No Insertion: $sql");
}
