 <?php
  
  //init logs path 
  $logsPath = "data";
  
  //init max logs count
  $logsMaxCount = 50;
  
  //try to clear old files
  $files = array();
  $dir = new DirectoryIterator("./" . $logsPath);
  
  //init array with files info
  foreach ($dir as $fileinfo) 
  {
	$filename = $fileinfo->getFilename();
	if ($filename == "." or $filename == "..")
		continue;

    $files[$fileinfo->getMTime()] = $filename;
  } 

  //check files count 	   
  if(count($files) <= $logsMaxCount)
      exit();  
  
  //sort files info
  ksort($files); 
  
  //delete old files
  $deletedCount = 0;
  foreach($files as $file)
  {
	  if($deletedCount >= $logsMaxCount/2)
         exit();    		  

	  unlink($logsPath . "/" . $file);
	  $deletedCount = $deletedCount + 1;
  }
?>