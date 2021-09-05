<?php
$root = (isset($_SERVER['HTTPS']) ? "https://" : "http://") . $_SERVER['HTTP_HOST'];
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME'])."../../";
return [
    'moillie-key'=> 'test_9c8ra5quVVqkpBS6gC8PNEn2n9865T',
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,

    
    /**
     *  image urls
     */
    'front' => "uploads/front/",
    'product' => "uploads/products/",
    'gallery' => "uploads/gallery/",
    'testimonial' => "uploads/testimonial/",
];
