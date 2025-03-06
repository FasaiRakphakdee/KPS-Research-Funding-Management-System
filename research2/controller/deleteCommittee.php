<?php

	$key = $_GET['keyName'];
  $files = glob("../committee/*");
  foreach($files as $file){
    $jsonString = file_get_contents($file);

    $committee = json_decode($jsonString, true);

    if($key==$committee["key"]){
      unlink($file);
      break;
    }

  }

	header('Location: ' . '../views/listcommittee.php');
  exit();
?>
