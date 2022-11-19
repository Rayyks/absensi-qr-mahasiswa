<?php
if (isset($_GET['download'])) {
    $gallery = $_GET['g'];
    $image = $_GET['i'];
    $_GET['src'] = "{$gallery}/images/{$image}";

    header('Content-Description: File Transfer');
    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename=' . basename($image));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: public');
    header('Pragma: public');
    ob_clean();
    include('../watermark.php');
    exit;
}
