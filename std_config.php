<?php

session_start();
$_SESSION["system"] = "FUNDING";
$_SESSION["access-user"] = "staff";
$_SESSION["username"] = "staff";
$_SESSION["departmentId"] = "K0001";
$_SESSION["departmentName"] = "ภาควิชาวิศวกรรมคอมพิวเตอร์";



$_SESSION["headDept"] = 0;
$_SESSION["staff"] = 0;
$_SESSION["committee"] = 0;
$_SESSION["dean"] = 0;
$_SESSION["requestingGrant"] = 0;
$_SESSION["latestFile"] = "";



$staffPath = "./research2/staff/staff.json";
$jsonString = file_get_contents($staffPath);
$staff = json_decode($jsonString, true);

print_r($staff);

$deanPath = "./research2/dean/dean.json";
$jsonString = file_get_contents($deanPath);
$dean = json_decode($jsonString, true);

print_r($dean);

// Path ของโฟลเดอร์ที่เก็บไฟล์ JSON
$path = "./research2/formResearch/";
$realPath = realpath($path); // ตรวจสอบ path ที่แท้จริง

// ค้นหาไฟล์ JSON ที่ตรงกับรูปแบบชื่อของ user ที่ใช้งานอยู่
$jsonFiles = glob($realPath . DIRECTORY_SEPARATOR . $_SESSION["access-user"] . "_proposal_*.json");

// เก็บข้อมูลไฟล์ล่าสุด
$latestFile = null;
$latestTimestamp = 0;

foreach ($jsonFiles as $file) {
    // ดึง timestamp จากชื่อไฟล์
    $filename = basename($file);
    if (preg_match('/_(\d{8}_\d{6})\.json$/', $filename, $matches)) {
        $dateStr = $matches[1];
        $formattedDate = substr($dateStr, 0, 4) . '-' . substr($dateStr, 4, 2) . '-' . substr($dateStr, 6, 2) . ' ' . substr($dateStr, 9, 2) . ':' . substr($dateStr, 11, 2) . ':00';
        $timestamp = strtotime($formattedDate);

        // เปรียบเทียบเพื่อหาไฟล์ล่าสุด
        if ($timestamp > $latestTimestamp) {
            $latestTimestamp = $timestamp;
            $latestFile = $file;
        }
    }
}

// ตรวจสอบไฟล์ล่าสุดและ state
if ($latestFile) {
    $jsonData = json_decode(file_get_contents($latestFile), true);
    if($jsonData['state'] == 0){
        $_SESSION["requestingGrant"] = 0; 
    }
    elseif (isset($jsonData['state']) && $jsonData['state'] < 50) {
        $_SESSION["requestingGrant"] = 1;
        $_SESSION["latestFile"] = $jsonData['formName'];
    } else {
        $_SESSION["requestingGrant"] = 0;
    }
} else {
    $_SESSION["requestingGrant"] = 0;
}



if (file_exists("./research2/headdept/" . $_SESSION["access-user"] . ".json")) {
    //echo "HD";
    $_SESSION["headDept"] = 1;
    // header('Location: ' . './research2/views/hdept.php');
// exit();
}
if (file_exists("./research2/committee/" . $_SESSION["access-user"] . ".json")) {
    echo "COMMIT";
    $_SESSION["committee"] = 1;
    // header('Location: ' . './research2/views/committee.php');
// exit();
}
if (file_exists("./research2/staff/" . $_SESSION["access-user"] . ".json")) {
    echo "ST";
    $_SESSION["staff"] = 1;
    // header('Location: ' . './research2/views/staff.php');
// exit();
}
if ($dean["ku"] == $_SESSION["access-user"]) {
    echo "DN";
    $_SESSION["dean"] = 1;
    // header('Location: ' . './research2/views/dean.php');
// exit();
}






header('Location: ' . './research2/views/index.php');
exit();


?>