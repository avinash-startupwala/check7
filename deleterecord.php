<?php
//TRUNCATE  newusers
require_once('heroku_postgres_database.php');
$herokupostgrsdatabse = new HerokuPostgresDatabase();
   $query = "delete from newusers where email='avinash.pawar33@yahoo.com'";
      $data = $herokupostgrsdatabse->query($query);
echo "query result = ".$data;
?>
