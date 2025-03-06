<?php

	$key = $_GET['keyName'];

  $files = glob("../headdept/*");
  foreach($files as $file){
    $jsonString = file_get_contents($file);

    $headdept = json_decode($jsonString, true);

    if($key==$headdept["key"]){
      unlink($file);
      break;
    }

  }

	header('Location: ' . '../views/listhdept.php');
  exit();
?>
