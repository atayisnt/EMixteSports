<?php

// Create image
$width = 1920;
$height = 600;
$image = imagecreatetruecolor($width, $height);

// Create colors
$blue = imagecolorallocate($image, 13, 71, 161);
$lightBlue = imagecolorallocate($image, 25, 118, 210);
$white = imagecolorallocate($image, 255, 255, 255);

// Fill background with gradient
for($i = 0; $i < $width; $i++) {
    $color = imagecolorallocate($image,
        13 + ($i/$width) * (25-13),
        71 + ($i/$width) * (118-71),
        161 + ($i/$width) * (210-161)
    );
    imageline($image, $i, 0, $i, $height, $color);
}

// Add text
$font = dirname(__FILE__) . '/../../resources/fonts/arial.ttf';
if (!file_exists($font)) {
    $font = 5; // Use built-in font if arial.ttf is not available
}

// Add title
$text = "Bienvenue sur EMixteSports";
if (is_string($font)) {
    imagettftext($image, 48, 0, ($width-imagefontwidth(5)*strlen($text))/2, $height/2-50, $white, $font, $text);
} else {
    imagestring($image, $font, ($width-imagefontwidth(5)*strlen($text))/2, $height/2-50, $text, $white);
}

// Add subtitle
$text = "Votre destination pour l'équipement sportif de qualité";
if (is_string($font)) {
    imagettftext($image, 24, 0, ($width-imagefontwidth(5)*strlen($text))/2, $height/2+50, $white, $font, $text);
} else {
    imagestring($image, 3, ($width-imagefontwidth(3)*strlen($text))/2, $height/2+50, $text, $white);
}

// Set content type
header('Content-Type: image/png');

// Save image
imagepng($image, dirname(__FILE__) . '/slider.png');
imagedestroy($image);

echo "Image generated successfully!"; 