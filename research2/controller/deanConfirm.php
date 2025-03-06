<?php

$deanStatatus = $_POST["status"];
$path = $_POST["formName"];

$jsonString = file_get_contents($path);
$form = json_decode($jsonString, true);

$remark = isset($_POST["remark"]) ? $_POST["remark"] : ''; // รับค่าคอมเม้นต์
$editRemark = isset($_POST["editRemark"]) ? $_POST["editRemark"] : ''; // รับค่าคอมเม้นต์

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');

$count = $form["count"] - 1;


if ($remark) {
    // เก็บความคิดเห็นเมื่อเลือก "ไม่เห็นชอบ"
    $form["remark" . $count] = $remark;
}
if ($editRemark) {
    // เก็บความคิดเห็นเมื่อเลือก "ไม่เห็นชอบ"
    $form["remark" . $count] = $editRemark;
}

$form["status" . $count] = $deanStatatus;
$form["statusDate" . $count] = $currentDate;


if ($deanStatatus == "อนุมัติ") {
    if ($form["state"] == 7) {
        $form["state"] = 8;
        $form["statusAll"] = "รอทำสัญญา";

        $count = $form["count"];
        $form["status" . $count] = "รอทำสัญญา";
        $form["statusDate" . $count] = "";

        $staffPath = "../staff/staff.json";
        $jsonString = file_get_contents($staffPath);

        $staff = json_decode($jsonString, true);

        $form["statusName" . $count] = $staff["staff"]["fullName"];
        $form["statusRole" . $count] = $staff["staff"]["role"];

        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 15) {
        $form["state"] = 16;
        $form["statusAll"] = "เห็นชอบ";

        $count = $form["count"];
        $form["status" . $count] = "เห็นชอบ";
        $form["statusDate" . $count] = "";

        $staffPath = "../staff/staff.json";
        $jsonString = file_get_contents($staffPath);

        $staff = json_decode($jsonString, true);

        $form["statusName" . $count] = $staff["staff"]["fullName"];
        $form["statusRole" . $count] = $staff["staff"]["role"];
    } else if ($form["state"] == 20) {
        $form["state"] = 21;
        $form["statusAll"] = "เห็นชอบ";

        $count = $form["count"];
        $form["status" . $count] = "เห็นชอบ";
        $form["statusDate" . $count] = "";

        $staffPath = "../staff/staff.json";
        $jsonString = file_get_contents($staffPath);

        $staff = json_decode($jsonString, true);

        $form["statusName" . $count] = $staff["staff"]["fullName"];
        $form["statusRole" . $count] = $staff["staff"]["role"];
    } else if ($form["state"] == 25) {
        $form["state"] = 26;
        $form["statusAll"] = "เห็นชอบ";

        $count = $form["count"];
        $form["status" . $count] = "เห็นชอบ";
        $form["statusDate" . $count] = "";

        $staffPath = "../staff/staff.json";
        $jsonString = file_get_contents($staffPath);

        $staff = json_decode($jsonString, true);

        $form["statusName" . $count] = $staff["staff"]["fullName"];
        $form["statusRole" . $count] = $staff["staff"]["role"];
    } else if ($form["state"] == 34) {
        $form["state"] = 100;
        $form["remark"] = $_POST["remark"];

        $count = $form["count"];
        $form["statusAll"] = "งานวิจัยเสร็จสมบูรณ์";


        $form["status" . $count] = "เห็นชอบ";
        $form["statusDate" . $count] = "";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";


        $form["count"] = $form["count"] + 1;
    }
} else if ($deanStatatus == "ไม่อนุมัติ") {
    if ($form["state"] == 7) {
        $form["state"] = 0;
        $form["statusAll"] = "คณบดีไม่อนุมัติ";
    } else if ($form["state"] == 15) {
        $form["state"] = 14;
        $form["remark"] = $_POST["remark"];
        $count = $form["count"];
        $form["statusAll"] = "คณบดีไม่อนุมัติ";

        $form["status" . $count] = "รอแก้ไข";
        $form["statusDate" . $count] = "";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";

        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 20) {
        $form["state"] = 18;
        $form["remark"] = $_POST["remark"];
        $count = $form["count"];
        $form["statusAll"] = "คณบดีไม่อนุมัติ";

        $form["status" . $count] = "รอแก้ไข";
        $form["statusDate" . $count] = "";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";

        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 25) {
        $form["state"] = 23;
        $form["remark"] = $_POST["remark"];
        $count = $form["count"];
        $form["statusAll"] = "คณบดีไม่อนุมัติ";

        $form["status" . $count] = "รอแก้ไข";
        $form["statusDate" . $count] = "";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";

        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 34) {
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
} else if ($deanStatatus == "แก้ไข") {
    if ($form["state"] == 7) {
        $form["state"] = 9;
        $form["remark"] = $_POST["remark"];

        $count = $form["count"];
        $form["statusAll"] = "แก้ไขข้อเสนอโครงการวิจัย";

        $form["status" . $count] = "รอแก้ไข";
        $form["statusDate" . $count] = "";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 15) {
        $form["state"] = 14;
        $count = $form["count"];
        $form["remarkSixReport"] = $_POST["remark"];
        $form["statusAll"] = "รอแก้ไขรายงาน 6 เดือน";
        $form["status" . $count] = "รอแก้ไขรายงาน 6 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["count"] = $form["count"] + 1;


    } else if ($form["state"] == 20) {
        $form["state"] = 18;
        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 12 เดือน";
        $form["remarkTwelveReport"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขรายงาน 12 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";

        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 25) {
        $form["state"] = 23;
        $form["remarkEighteenReport"] = $_POST["remark"];

        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 18 เดือน";

        $form["status" . $count] = "รอแก้ไขรายงาน 18 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 34) {
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

header('Location: ' . '../views/dean.php');
exit();
