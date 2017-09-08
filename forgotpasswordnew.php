<?php
  if(isset($_POST['email']))
  {
  require_once("heroku_postgres_database.php");
   require_once('sendmail.php');
 $sendmailobj = new SendMail();

  $email = $_POST['email'];
   $random_key =sha1(microtime(true).mt_rand(10000,90000));
 $herokupostgrsdatabse = new HerokuPostgresDatabase();
$selectquery = "select * from registered_users where email = '$email' ";
$select_result =  $herokupostgrsdatabse->query($selectquery);
  if (pg_num_rows($select_result) == 1) 
        {
     $query = "INSERT INTO changepassword_table (email,random_key) VALUES ('$email','$random_key')";
        $herokupostgrsdatabse->query($query);

        	   $sendmailobj->sss($email,$random_key); 
      header('Location: https://startupwala.herokuapp.com/forgotpassword.html');
        


}
else {
  echo "You are not a valid user";
}
}
else {
  
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
          <h1> What is your Email Address?</h1>
          
         <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" id="email" name="email"  required autocomplete="off"/>
          </div>
         
          

          <button type="submit" class="button button-block"/>Submit</button>
          
          </form>


  
      
</div> <!-- /form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
<?php
}
?>
