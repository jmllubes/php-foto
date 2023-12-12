<?php
var_dump($_FILES);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    if (isset($_FILES['fileInput'])) {
        $file = $_FILES['fileInput'];

        // Check if the file is an image
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($_FILES['fileInput']['type'], $allowedTypes)) {
            $uploadPath = 'uploads/' . basename($file['name']);

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                echo 'Image uploaded successfully.';
            } else {
                echo 'Error uploading image. Check server logs for more details.';
                error_log('Error uploading image: ' . print_r($_FILES, true));
            }
        } else {
            echo 'Invalid file type. Please upload an image.';
        }
    } else {
        echo 'No file uploaded.';
    }
}
?>
