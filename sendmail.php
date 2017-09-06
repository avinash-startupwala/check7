<?php


// If you are using Composer
require 'vendor/autoload.php';

	class SendMail
	{

			function ss($email,$random_key,$first_name)
			{
		
				$from = new SendGrid\Email(null, "enquiry@bmcgroup.in");
$subject = "Confirm your Startupwala registration!";
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/html+", "<html><body>hi</body></html>");
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
