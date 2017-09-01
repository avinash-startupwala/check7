<!DOCTYPE html>
<head>
  <title>Forgot Password</title>

</head>
<body>
  <h3>Forgot Password</h3>

<?php
require_once("heroku_postgres_database.php");

  if(isset($_POST['submit']))
  {
  $email = $_POST['email'];


 $herokupostgrsdatabse = new HerokuPostgresDatabase();
$selectquery = "select * from registered_users where email = '$email' ";
$select_result =  $herokupostgrsdatabse->query($selectquery);
  if (pg_num_rows($select_result) == 1) 
        {
$password = $_POST['password'];
$email = $_POST['email'];
          $update_user_data_query = "UPDATE registered_users SET password = '$password' WHERE email = '$email'";
$update_user_data_result =  $herokupostgrsdatabse->query($update_user_data_query);
echo "Password Changed Successfully";
}
else {
	echo "You are not a valid user";
}
}

else {
  echo "Enter your email and new password";
}
?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <fieldset>
      <legend>Reset Password</legend>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />
 
 
     

    </fieldset>
    <input type="submit" value="Save Profile" name="submit" />
  </form>
</body>
</html>
