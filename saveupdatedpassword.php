 
<?php
if isset($_POST['password'])
{
       $password = $_POST['password'];
       $email = $_POST['email'];
$password = $_POST['password'];
$update_password_query = "UPDATE registered_users SET password = '$password' WHERE email = '$email'";
$update_user_data_result =  $herokupostgrsdatabse->query($update_password_query);
		    $delete_password_query = "delete from changepassword_table where email='$email'";
      $data = $herokupostgrsdatabse->query($delete_password_query);
        //header('Location: https://startupwala.herokuapp.com/thankyou2.html');
       echo "your password is changed successfully";
}
else {
echo "please enter password";
}
?>
