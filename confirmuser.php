<?php



// get query : http://localhost/confirmuser/index.php?key=12345&&email=s
  $random_key = $_GET['key'];
  $email = $_GET['email'];

echo "hello key= ".$random_key." email= ".$email;



      
 require_once('heroku_postgres_database.php');
 require_once('sendmail.php');


  // Connect to the database
$herokupostgrsdatabse = new HerokuPostgresDatabase();
 $sendmailobj = new SendMail();


   $check_user_query = "select random_key from newusers where email='$email'";

    $check_user_query_result = $herokupostgrsdatabse->query($check_user_query);

     if (pg_num_rows($check_user_query_result) == 0) {

      echo "u cant access this page";
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

       if ($random_key_from_db==$random_key) {
              echo "<br>";
     //  echo "in second if 3";
        $get_all_user_data = "select * from newusers where email='$email'";

          $get_all_user_data_result = $herokupostgrsdatabse->query($get_all_user_data);
       $user_data_row = $herokupostgrsdatabse->fetch_array($get_all_user_data_result);

       $first_name = $user_data_row['first_name'];

              $last_name = $user_data_row['last_name'];
       $phone = $user_data_row['phone'];
       $city = $user_data_row['city'];
       $looking_for = $user_data_row['looking_for'];
       $password = $user_data_row['password'];


           $insert_user_data_query = "INSERT INTO registered_users (first_name,last_name,phone,city,looking_for,email, password) VALUES ('$first_name', '$last_name','$phone','$city','$looking_for','$email','$password')";
        $insert_query_result = $herokupostgrsdatabse->query($insert_user_data_query);
         
         //delete this user from newusers table
           $query = "delete from newusers where email='$email'";
      $data = $herokupostgrsdatabse->query($query);
         echo "<br>";
  //echo "data = ";
          var_dump($data);
        // Confirm success with the user
       // $sendmailobj->ss($email);
    // header('Location: https://startupwala.herokuapp.com/thankyou2.html');



echo "insert query result = ".$insert_query_result;
       }
       else {
       //       echo "<br>";
       //echo "in second else 4";
        echo "this is not a registered email in startupwala database";

       }

      

     }



 



?>
