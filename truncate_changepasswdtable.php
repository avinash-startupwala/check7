<?php
//TRUNCATE  newusers
require_once('heroku_postgres_database.php');
$herokupostgrsdatabse = new HerokuPostgresDatabase();
   $query = "TRUNCATE  changepassword_table";
      $data = $herokupostgrsdatabse->query($query);
echo "query result = ".$data;
?>
