<?php


// If you are using Composer
require 'vendor/autoload.php';

	class SendMail
	{

			function ss($email)
			{
		
				$from = new SendGrid\Email(null, "enquiry@bmcgroup.in");
$subject = "Hello World from the SendGrid PHP Library!";
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/plain", "Hello, Email!");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
// echo $response->statusCode();
// echo $response->headers();
// echo $response->body();

// echo "<br>";

// echo $response;
				
				
			}


	}
?>
