<?php 
    session_start();

    $set = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = substr(str_shuffle($set), 0, 6);
    $_SESSION['captcha'] = $captcha;

    $height = 36;
    $width = 250;
    $image_p = imagecreate($width, $height);

    $black = imagecolorallocate($image_p, 0, 0, 0);

    $white = imagecolorallocate($image_p, 255, 255, 255);

    $font_size = 12;
    imagestring($image_p, $font_size, 100, 10, $captcha, $white);

    imagejpeg($image_p, null, 80);

    header("Cache-Control: no-store, no-cache, must-revalidate");

    header('Content-Type: image/png');
?>