<?php 
  // read api token
  $apiKey= $_SERVER['HTTP_ACCESS_TOKEN'];
 
  //check api token
  if($apiKey!='ApiToken')
	  exit();

  //generate log name   
  $filename = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
  
  //read log
  $memory_file = file_get_contents('php://input');
  
  //check log size
  if(strlen($memory_file) > 524288)
	  exit();
  
  //write log
  file_put_contents($filename, $memory_file );
  
  //generate link and return it
  echo "https://somesite.com/logs/" . $filename;
?>