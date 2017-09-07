<?php
// require_once("heroku_postgres_database.php");
// $herokupostgrsdatabse = new HerokuPostgresDatabase();
		//create new table query
// 	$create_table_query = "CREATE TABLE  newusers(
//    user_id SERIAL PRIMARY KEY,
//    first_name VARCHAR(50),
//    last_name VARCHAR(50),
   
//    phone VARCHAR(15),
//     city VARCHAR(30),
    
//      looking_for VARCHAR(100),
//      email VARCHAR(30),
//      password VARCHAR(50),
//      random_key VARCHAR(50))";
   //  $random_key =sha1(microtime(true).mt_rand(10000,90000));
//  $create_table_result =  $herokupostgrsdatabse->query($create_table_query);
//    $insert_query = "insert into newusers (first_name,last_name,phone,city,looking_for,email,password,random_key) 
//    values 
//    ('Avinash','Pawar','8793123456','Pune','Trademark registration','avi@gmail.com', 'avi','$random_key') ";
//  $insert_data_result = $herokupostgrsdatabse->query($insert_query);
  if (isset($_POST['first_name'])) {
 require_once('heroku_postgres_database.php');
 require_once('sendmail.php');
  // Connect to the database
$herokupostgrsdatabse = new HerokuPostgresDatabase();
 $sendmailobj = new SendMail();
    // Grab the profile data from the POST
    $first_name = $herokupostgrsdatabse->escape_value(trim($_POST['first_name']));
      $last_name = $herokupostgrsdatabse->escape_value(trim($_POST['last_name']));
   $email = $herokupostgrsdatabse->escape_value(trim($_POST['email']));
   $city = $herokupostgrsdatabse->escape_value(trim($_POST['city']));
   $looking_for = $herokupostgrsdatabse->escape_value(trim($_POST['00N90000002GeUl']));
      $phone = $herokupostgrsdatabse->escape_value(trim($_POST['phone']));
    $password = $herokupostgrsdatabse->escape_value(trim($_POST['password']));
    
    //if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM registered_users WHERE email = '$email'";
      $data = $herokupostgrsdatabse->query($query);
      if (pg_num_rows($data) == 0) {
	$random_key =sha1(microtime(true).mt_rand(10000,90000));
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO newusers (first_name,last_name,phone,city,looking_for,email, password,random_key) VALUES ('$first_name', '$last_name','$phone','$city','$looking_for','$email','$password','$random_key')";
        $herokupostgrsdatabse->query($query);
        // Confirm success with the user
        $sendmailobj->ss($email,$random_key,$first_name); 
      header('Location: https://startupwala.herokuapp.com/thankyou.html');
        
        // echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
       
        //exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different email address.</p>';
        $username = "";
	      ?>
		<a href="https://startupwala.herokuapp.com">Sign Up</a>
<?php
      }
  }
else {
echo "please fill sign up form ";
	?>
		<a href="https://startupwala.herokuapp.com">Sign Up</a>
<?php
}
 
?>
