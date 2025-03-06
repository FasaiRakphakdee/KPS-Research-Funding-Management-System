<?php

session_start();

$committeeStatatus = $_POST["status"];
$path = $_POST["formName"];
$committeeName = "ศ.ดร.อนุพันธ์ เทอดวงศ์วรกุล";
$committeeUsername = $_SESSION["access-user"];

$remark = isset($_POST["remark"]) ? $_POST["remark"] : ''; // รับค่าคอมเม้นต์

$jsonString = file_get_contents($path);
$form = json_decode($jsonString, true);

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');

$count = $form["count"] - 1;


$n = $form["count"];
$number = 0;
$commitStart = 0;
$commitEnd = $form["count"];



for ($i = 0; $i < $n; $i++) {

    if ($form["statusRole" . $i] == "คณะกรรมการ" && $commitStart == 0) {
        $commitStart = $i;
    }
    echo $form["statusName" . $i] . " " . $committeeName . " " . "<br>";

    if ($form["statusUsername" . $i] == $committeeUsername and $form["status" . $i] == "รอเห็นชอบ") {
        $number = $i;
    }

}

$form["status" . $number] = $committeeStatatus;
$form["statusDate" . $number] = $currentDate;

$countApp = 0;
$countWait = 0;

for ($i = $commitStart; $i < $commitEnd; $i++) {
    
    if ($form["status" . $i] == "เห็นชอบ") {
        $countApp++;
    }

    if ($form["status" . $i] != "รอเห็นชอบ") {
        $countWait++;
    }
    if ($form["status" . $i] == "ไม่เห็นชอบ" && ($form["remark" . $i] === "")) {
        // เก็บความคิดเห็นเมื่อไม่มีข้อมูลหรือเป็นข้อความว่าง
        $form["remark" . $i] = $remark;
    }
    
    
    
}
$folderPath = "Funding_KUKPS/Funding_KUKPS/research2/committee";

// ตรวจสอบว่าโฟลเดอร์มีอยู่หรือไม่
if (is_dir($folderPath)) {
    // สแกนไฟล์ในโฟลเดอร์
    $files = scandir($folderPath);
    $jsonCount = 0;

    // วนลูปเพื่อเช็คไฟล์ที่มีนามสกุล .json
    foreach ($files as $file) {
        if (pathinfo($file, PATHINFO_EXTENSION) === 'json') {
            $jsonCount++;
        }
    }
}

$commitAmount = $commitEnd - $commitStart;
echo $commitAmount . "<br>";
echo $commitEnd . "<br>";
echo $commitStart . "<br>";
echo $countWait . "<br>";
echo $countApp . "<br>";

if ($countWait == $commitAmount) {

    if(($jsonCount % 2) == 1){
        $commitAmount += 1;
        $commitAmount = $commitAmount / 2;
    }
    else{
        $commitAmount = $commitAmount / 2;
    }
    if($countApp >= $commitAmount) {
        $form["state"] = 7;

        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $order = $form["count"] ;

        $form["status" . $order] = "เห็นชอบ";
        $form["statusDate" . $order] = $currentDate;
        $form["statusRole" . $order] = "คณะกรรมการ";
        $form["statusName" . $order] = "ผลการพิจารณาของคณะกรรมการ";

        $form["count"] = $form["count"] + 1;

        $order = $form["count"] ;

        $form["status" . $order] = "รออนุมัติ";
        $form["statusDate" . $order] = "";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["statusRole" . $order] = $dean["dean"]["role"];
        $form["statusName" . $order] = $dean["dean"]["fullName"];

        $form["count"] = $form["count"] + 1;
    } else {
        $form["state"] = 0;
        $form["statusAll"] = "ไม่ผ่านการพิจารณาของคณะกรรมการ";

        $order = $form["count"];

        $form["status" . $order] = "ไม่เห็นชอบ";
        
        $form["statusDate" . $order] = $currentDate;
        $form["statusRole" . $order] = "คณะกรรมการ";
        $form["statusName" . $order] = "ผลการพิจารณาของคณะกรรมการ";

        $form["count"] = $form["count"] + 1;

    }


}






$toJson = json_encode($form);
file_put_contents($path, $toJson);

header('Location: ' . '../views/committee.php');
exit();

?>