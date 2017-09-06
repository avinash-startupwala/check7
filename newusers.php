<?php
require_once("heroku_postgres_database.php");
$herokupostgrsdatabse = new HerokuPostgresDatabase();
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

     $random_key =sha1(microtime(true).mt_rand(10000,90000));

  $create_table_result =  $herokupostgrsdatabse->query($create_table_query);
   $insert_query = "insert into newusers (first_name,last_name,phone,city,looking_for,email,password,random_key) 
   values 
   ('Avinash','Pawar','8793123456','Pune','Trademark registration','avi@gmail.com', 'avi','$random_key') ";
 $insert_data_result = $herokupostgrsdatabse->query($insert_query);


 

?>
