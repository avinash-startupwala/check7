<?php

echo "set new password";

 echo $random_key = $_GET['key'];
echo "<br>";
  echo $email = $_GET['email'];
      
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
	       ?>
	       <!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
	       
  <div class="form">
      

      
    
        
  <div id="login">   
          <h1>New Password</h1>
          
         <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="password" id="password" name="password"  required autocomplete="off"/>
          </div>
         
          

          <button type="submit" class="button button-block"/>Submit</button>
          
          </form>


  
      
</div> <!-- /form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php
	       
	  if isset($_POST['password']) 
	  {
		  $password = $_POST['password'];

  $update_password_query = "UPDATE registered_users SET password = '$password' WHERE email = '$email'";
$update_user_data_result =  $herokupostgrsdatabse->query($update_password_query);

		    $delete_password_query = "delete from changepassword_table where email='$email'";
      $data = $herokupostgrsdatabse->query($delete_password_query);

        //header('Location: https://startupwala.herokuapp.com/thankyou2.html');


       	}
       else {
       echo "please enter password";
       }
       
       }
else {
echo "you can't access this page, email link is expired";
}
?>
