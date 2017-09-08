<?php
error_reporting(E_ALL);
    ini_set('display_errors', 1);

// If you are using Composer
require 'vendor/autoload.php';

	class SendMail
	{

			function ss($email,$random_key,$first_name)
			{
				
		
				$from = new SendGrid\Email(null, "enquiry@bmcgroup.in");
$subject = "Confirm your Startupwala registration!";
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/html", "<html>
<body>
<h1>Dear $first_name</h1>
<br>
<h3>
You're almost done! Please click this link below to activate your Startupwala account and get started.
</h3>
<img src=logo.png>
<br>
<br>
<a href=https://startupwala.herokuapp.com/confirmuser.php?key=$random_key&&email=$email>Activate your account</a>
<br>
<h2>Startupwala</h2>
</body></html>");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
//echo "send mail response: "; 
//echo $response->statusCode();
				
			//	$status_code =  $response->statusCode();
// echo $response->headers();
// echo $response->body();

// 		if($status_code!=202){
// 			$obj = new SendMail();
//  $obj->ss($email,$random_key,$first_name)
// 		}
// echo "<br>";

// echo $response;		
			}
		
		function sss($email,$random_key)
			{
				
		
				$from = new SendGrid\Email(null, "enquiry@bmcgroup.in");
$subject = "Whoops! Let's reset your password.";
$to = new SendGrid\Email(null, $email);
$content = new SendGrid\Content("text/html", "<html>
<body>
<h1>Forgot your password? Never fear! You can come up with an even better one.</h1>
<br>

<br>
<a href=https://startupwala.herokuapp.com/setnewpassword.php?key=$random_key&&email=$email>Reset my password</a>
</body></html>");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
//echo "send mail response: "; 
//echo $response->statusCode();
				
			//	$status_code =  $response->statusCode();
// echo $response->headers();
// echo $response->body();

// 		if($status_code!=202){
// 			$obj = new SendMail();
//  $obj->ss($email,$random_key,$first_name)
// 		}
// echo "<br>";

// echo $response;		
			}
		
		
		
}
// $obj = new SendMail();
// $obj->ss("avinash.pawar33@yahoo.com","123","Avinash");
?>
