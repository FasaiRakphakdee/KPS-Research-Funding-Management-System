<?php

  $key = $_POST["key"];
  $fullName = $_POST["name"];
  $role = $_POST["role"];
  $email = $_POST["email"];

  $committee["key"] = $key;
  $committee[$key] = array(

    "key" => $key,
    "fullName" => $fullName,
    "role" => $role,
    "email" => $email,
  );


  $toJson = json_encode($committee);
  echo $toJson;

  file_put_contents("../committee/".$key.".json", $toJson);

  header('Location: ' . '../views/listcommittee.php');
  exit();

?>
