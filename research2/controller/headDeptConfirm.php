<?php

$path = $_POST["formName"];

$headDeptStatatus = $_POST["status"];
$remark = isset($_POST["remark"]) ? $_POST["remark"] : ''; // รับค่าคอมเม้นต์

$jsonString = file_get_contents($path);
$form = json_decode($jsonString, true);


$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');

$count = $form["count"] - 1;


$form["status" . $count] = $headDeptStatatus;
$form["statusDate" . $count] = $currentDate;

if ($remark) {
    // เก็บความคิดเห็นเมื่อเลือก "ไม่เห็นชอบ"
    $form["remark" . $count] = $remark;
}

$count = $form["count"];
if ($headDeptStatatus == "เห็นชอบ") {
    $staffPath = "../staff/staff.json";
    $jsonString = file_get_contents($staffPath);
    $staff = json_decode($jsonString, true);


    // Decode JSON for head department details
    $headDept = json_decode($jsonString, true);

    // Extract head department key and details
    $headDeptKey = $headDept["key"];
    if ($form["state"] == 3) {
        $form["state"] = 4;
    } else if ($form["state"] == 12) {
        $form["state"] = 13;
        //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
    } else if ($form["state"] == 17) {
        $form["state"] = 19;
    } else if ($form["state"] == 22) {
        $form["state"] = 24;
    } else if ($form["state"] == 31) {
        $form["state"] = 33;
    }
    $form["statusAll"] = "รอเจ้าหน้าที่ตรวจสอบ";
    $form["statusName" . $count] = $staff["staff"]["fullName"];
    $form["statusRole" . $count] = $staff["staff"]["role"];
    $form["status" . $count] = "รอตรวจสอบ";
    $form["statusDate" . $count] = "";
    $form["count"] = $form["count"] + 1;
} else {
    if ($form["state"] == 3) {
        $form["state"] = 0;
        $form["statusAll"] = "หัวหน้าภาคไม่เห็นชอบ";
    } else if ($form["state"] == 12) {
        $form["state"] = 14;
        $count = $form["count"];
        $form["remarkSixReport"] = $_POST["remark"];
        $form["statusAll"] = "รอแก้ไขรายงาน 6 เดือน";
        $form["status" . $count] = "รอแก้ไขรายงาน 6 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 17) {
        $form["state"] = 18;
        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 12 เดือน";
        $form["remarkTwelveReport"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขรายงาน 12 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";


        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 22) {
        $form["state"] = 23;
        $form["remarkEighteenReport"] = $_POST["remark"];

        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 18 เดือน";

        $form["status" . $count] = "รอแก้ไขรายงาน 18 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";


        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 31) {
        $form["state"] = 32;
        $count = $form["count"];

        $form["statusAll"] = "รอแก้ไขรายงานฉบับสมบูรณ์";
        $form["remarkFinalReport"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขรายงานฉบับสมบูรณ์";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";


        $form["count"] = $form["count"] + 1;
    }
}


$toJson = json_encode($form);
file_put_contents($path, $toJson);

header('Location: ' . '../views/hdept.php');
exit();
