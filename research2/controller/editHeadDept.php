<?php

  $key = $_POST["key"];
  $fullName = $_POST["name"];
  $email = $_POST["email"];

  $files = glob("../headdept/*");
  foreach($files as $file){

    $jsonString = file_get_contents($file);

    $headdept = json_decode($jsonString, true);

    if($key==$headdept["key"]){
        $headdept[$key]["fullName"] = $fullName;
        $headdept[$key]["email"] = $email;

        $toJson = json_encode($headdept);
        echo $toJson;

        file_put_contents("../headdept/".$key.".json", $toJson);


    }
  }

  header('Location: ' . '../views/listhdept.php');
  exit();


?>
