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
$content = new SendGrid\Content("text/plain", " Dear $first_name,
      
      You are receiving this e-mail because you filled the registration form at Site (https://www.startupwala.com/)
      
      In order to complete your registration, you need to confirm your email address by clicking on the link below:
      
      ?> <a href =https://www.startupwala.com/></click here>
      <?php
      
      If you are unable to click the link, copy-paste it your browser address. 
      
      If you did not register to Site, please ignore this email. Someone might have registered with your email address!
      
      If you have any questions contact us on registration@site.com or reply to this email.
      
      Best Regards,
      Site Team");
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
