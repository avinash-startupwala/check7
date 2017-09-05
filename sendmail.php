<?php


// If you are using Composer
require 'vendor/autoload.php';
echo "welcome to send grid test";

echo "<br>";
// If you are not using Composer (recommended)
// require("path/to/sendgrid-php/sendgrid-php.php");
//avinash.pawar@startupwala.com
//avinashpawar059@gmail.com
$from = new SendGrid\Email(null, "avinashpawar059@gmail.com");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, "avinash.pawar@startupwala.com");
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

echo "<br>";

echo $response;
?>