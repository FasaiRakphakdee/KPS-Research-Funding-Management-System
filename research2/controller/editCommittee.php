<?php
  $key = $_POST["key"];
  $fullName = $_POST["name"];
  $email = $_POST["email"];

  $files = glob("../committee/*");
  foreach($files as $file){

    $jsonString = file_get_contents($file);

    $committee = json_decode($jsonString, true);

    if(strcmp($key, $committee["key"])===0){
        $committee[$key]["fullName"] = $fullName;
        $committee[$key]["email"] = $email;

        $toJson = json_encode($committee);
        echo $toJson;

        file_put_contents("../committee/".$key.".json", $toJson);


    }

  }


  header('Location: ' . '../views/listcommittee.php');
  exit();

?>
