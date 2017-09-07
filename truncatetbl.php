<?php

//TRUNCATE  newusers

require_once('heroku_postgres_database.php');
$herokupostgrsdatabse = new HerokuPostgresDatabase();
   $query = "TRUNCATE  newusers";
      $data = $herokupostgrsdatabse->query($query);

echo "query result = ".$data;
?>
