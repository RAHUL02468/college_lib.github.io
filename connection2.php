<?php
  $host = "localhost";
  $stream_name="root";
  $pwd = "";
  $database = "project_db1";
  try{
  	$pdoconn = new PDO("mysql:host=$host; dbname=$database", $stream_name,$pwd);
  }
  catch(PDOException $e)
  {
  	die("can not access DB".$database.", ".$e->getMessage());
  }
?>