<?php
  $host = "localhost";
  $username="root";
  $pwd = "";
  $database = "project_db1";
  try{
  	$pdoconn = new PDO("mysql:host=$host; dbname=$database", $username,$pwd);
  }
  catch(PDOException $e)
  {
  	die("can not access DB".$database.", ".$e->getMessage());
  }
?>