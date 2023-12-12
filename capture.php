<?php
// Verifica si se recibió el dato de la imagen
if (isset($_POST['image'])) {
    // Obtén la imagen en formato base64 desde la solicitud
    $base64_image = $_POST['image'];
    
    // Decodifica la imagen base64 y guarda el archivo
    $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_image));
    $file_name = 'captured_image.png';
    file_put_contents($file_name, $image_data);
    
    echo 'Image saved successfully as ' . $file_name;
} else {
    echo 'No image data received';
}
?>
