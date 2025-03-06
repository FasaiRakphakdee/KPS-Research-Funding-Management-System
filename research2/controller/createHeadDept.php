<?php

  $key = $_POST["key"];
  $fullName = $_POST["name"];
  $role = $_POST["role"];
  $email = $_POST["email"];

  $headdept["key"] = $key;
  $headdept[$key] = array(

    "key" => $key,
    "fullName" => $fullName,
    "role" => $role,
    "email" => $email,
  );


  $toJson = json_encode($headdept);
  echo $toJson;

  file_put_contents("../headdept/".$key.".json", $toJson);

  header('Location: ' . '../views/listhdept.php');
  exit();

?>
