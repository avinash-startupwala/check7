<?php

echo "set new password";

  $random_key = $_GET['key'];
  $email = $_GET['email'];
      
 require_once('heroku_postgres_database.php');
 require_once('sendmail.php');
  // Connect to the database
$herokupostgrsdatabse = new HerokuPostgresDatabase();
 $sendmailobj = new SendMail();
   $check_user_query = "select random_key from changepassword_table where email='$email'";
    $check_user_query_result = $herokupostgrsdatabse->query($check_user_query);
     if (pg_num_rows($check_user_query_result) == 0) {
     echo "u cant access this page email with not matching key ";
     //  echo "<br>";
      // echo "in first if 1";
     }
     else{
         //   echo "<br>";
      // echo "in first else 2";
       $row = $herokupostgrsdatabse->fetch_array($check_user_query_result);
       $random_key_from_db = $row['random_key'];
          //  echo "<br>";
      // echo "random_key_from_db = ".$random_key_from_db;
     }
       if ($random_key_from_db==$random_key) {

  $update_password_query = "UPDATE registered_users SET password = '$password' WHERE email = '$email'";
$update_user_data_result =  $herokupostgrsdatabse->query($update_password_query);

		    $delete_password_query = "delete from changepassword_table where email='$email'";
      $data = $herokupostgrsdatabse->query($delete_password_query);

        header('Location: https://startupwala.herokuapp.com/thankyou2.html');


       	}
else {
echo "you can't access this page, email link is expired";
}
?>
