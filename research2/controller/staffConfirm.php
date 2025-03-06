<?php

$staffStatatus = $_POST["status"];
$path1 = $_POST["formName"];

$jsonString = file_get_contents($path1);
$form = json_decode($jsonString, true);

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');


$count = $form["count"] - 1;

$form["statusDate" . $count] = $currentDate;
$form["status" . $count] = $staffStatatus;

$count = $count + 1;

if ($staffStatatus == "ผ่านการตรวจสอบ") {

    echo "เข้าครวจสอบ";
    echo $form["state"];
    if ($form["state"] == 4) {
        echo "เข้า";
        $form["state"] = 6;
        $form["statusAll"] = "รอคณะกรรมการทั้งหมดเห็นชอบ";


        $jsonString = file_get_contents("../committies/committies.json");
        $commits = json_decode($jsonString, true);
        print_r($commits);

        $files = glob("../committee/*");
        $committies;

        foreach ($files as $file) {

            $jsonString = file_get_contents($file);

            $committee = json_decode($jsonString, true);

            $key = $committee["key"];

            $form["status" . $count] = "รอเห็นชอบ";
            $form["statusName" . $count] = $committee[$key]["fullName"];
            $form["statusUsername" . $count] = $key;
            $form["statusRole" . $count] = "คณะกรรมการ";
            $form["statusDate" . $count] = "";
            $form["remark" . $count] = $_POST["remark"];




            $form["count"] = $form["count"] + 1;
            $count = $form["count"];
        }




        // for ($i = 1; $i <= $commits["count"]; $i++) {
        //     echo "เข้าแบ้วเข้าต่อเข้าไป";
        //     echo $commits["name" . $i];
        //     $form["status" . $count] = "รอเห็นชอบ";
        //     $form["statusName" . $count] = $commits["name" . $i];
        //     $form["statusUsername" . $count] = $commits["username" . $i];
        //     $form["statusRole" . $count] = "คณะกรรมการ";
        //     $form["statusDate" . $count] = "";

        //     $form["count"] = $form["count"] + 1;

        //     $count = $form["count"];
        // }


        // $form["status" . $count] = "รอเห็นชอบ";
        // $form["statusName" . $count] = "ภานุวัฒน์ จั่นจินดา";
        // $form["statusRole" . $count] = "คณะกรรมการ";
        // $form["statusDate" . $count] = "";

        // $form["count"] = $form["count"] + 1;

        // $count = $form["count"];

        // $form["status" . $count] = "รอเห็นชอบ";
        // $form["statusName" . $count] = "ภัทรพร ปัญญาอุดมพร";
        // $form["statusRole" . $count] = "คณะกรรมการ";
        // $form["statusDate" . $count] = "";

        // $form["count"] = $form["count"] + 1;

        // $count = $form["count"];

        // $form["status" . $count] = "รอเห็นชอบ";
        // $form["statusName" . $count] = "ศุภชัย สุขสมัย";
        // $form["statusRole" . $count] = "คณะกรรมการ";
        // $form["statusDate" . $count] = "";

        // $form["count"] = $form["count"] + 1;


    } else if ($form["state"] == 10) {
        $form["state"] = 7;
        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["status" . $count] = "รออนุมัติ";
        $form["statusName" . $count] = $dean["dean"]["fullName"];
        $form["statusRole" . $count] = $dean["dean"]["role"];
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 13) {
        $form["state"] = 15;
        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["status" . $count] = "รออนุมัติ";
        $form["statusName" . $count] = $dean["dean"]["fullName"];
        $form["statusRole" . $count] = $dean["dean"]["role"];
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 19) {
        $form["state"] = 20;
        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["status" . $count] = "รออนุมัติ";
        $form["statusName" . $count] = $dean["dean"]["fullName"];
        $form["statusRole" . $count] = $dean["dean"]["role"];
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 24) {
        $form["state"] = 25;
        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["status" . $count] = "รออนุมัติ";
        $form["statusName" . $count] = $dean["dean"]["fullName"];
        $form["statusRole" . $count] = $dean["dean"]["role"];
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 33) {
        $form["state"] = 34;
        $form["statusAll"] = "รอคณบดีอนุมัติ";

        $deanPath = "../dean/dean.json";
        $jsonString = file_get_contents($deanPath);

        $dean = json_decode($jsonString, true);

        $form["status" . $count] = "รออนุมัติ";
        $form["statusName" . $count] = $dean["dean"]["fullName"];
        $form["statusRole" . $count] = $dean["dean"]["role"];
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    }
} else {

    if ($form["state"] == 4) {
        $form["state"] = 5;
        $form["statusAll"] = "ไม่ผ่านการตรวจสอบ";
        $form["remark"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขเอกสารข้อเสนองานวิจัย";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];

        $form["count"] = $form["count"] + 1;
    }
    // } else if ($form["state"] == 12) {
    //     $form["state"] = 14;
    //     $count = $form["count"];
    //     $form["remarkSixReport"] = $_POST["remark"];

    //     $form["statusAll"] = "รอแก้ไขรายงาน 6 เดือน";

    //     $form["status" . $count] = "รอแก้ไขรายงาน 6 เดือน";
    //     $form["statusName" . $count] = $form["name"];
    //     $form["statusRole" . $count] = "ผู้ขอ";
    //     $form["statusDate" . $count] = "";


    //     $form["count"] = $form["count"] + 1;

    // } else if ($form["state"] == 15) {
    //     $form["state"] = 17;

    //     $count = $form["count"];
    //     $form["statusAll"] = "รอแก้ไขรายงาน 12 เดือน";
    //     $form["remarkTwelveReport"] = $_POST["remark"];

    //     $form["status" . $count] = "รอแก้ไขรายงาน 12 เดือน";
    //     $form["statusName" . $count] = $form["name"];
    //     $form["statusRole" . $count] = "ผู้ขอ";
    //     $form["statusDate" . $count] = "";


    //     $form["count"] = $form["count"] + 1;

    // } else if ($form["state"] == 18) {
    //     $form["state"] = 20;
    //     $form["remarkEighteenReport"] = $_POST["remark"];

    //     $count = $form["count"];
    //     $form["statusAll"] = "รอแก้ไขรายงาน 18 เดือน";

    //     $form["status" . $count] = "รอแก้ไขรายงาน 18 เดือน";
    //     $form["statusName" . $count] = $form["name"];
    //     $form["statusRole" . $count] = "ผู้ขอ";
    //     $form["statusDate" . $count] = "";


    //     $form["count"] = $form["count"] + 1;

    // } else if ($form["state"] == 21) {
    //     $form["state"] = 22;

    //     $count = $form["count"];

    //     $form["statusAll"] = "รอแก้ไขรายงานฉบับสมบูรณ์";
    //     $form["remarkFinalReport"] = $_POST["remark"];

    //     $form["status" . $count] = "รอแก้ไขรายงานฉบับสมบูรณ์";
    //     $form["statusName" . $count] = $form["name"];
    //     $form["statusRole" . $count] = "ผู้ขอ";
    //     $form["statusDate" . $count] = "";


    //     $form["count"] = $form["count"] + 1;} 
    else if ($form["state"] == 10) {
        $form["state"] = 9;

        $count = $form["count"];
        $form["statusAll"] = "ไม่ผ่านการตรวจสอบ";

        $form["status" . $count] = "รอแก้ไขเอกสารข้อเสนองานวิจัย";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];


        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 13) {
        $form["state"] = 14;
        $count = $form["count"];
        $form["remarkSixReport"] = $_POST["remark"];
        $form["statusAll"] = "รอแก้ไขรายงาน 6 เดือน";
        $form["status" . $count] = "รอแก้ไขรายงาน 6 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];
        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 19) {
        $form["state"] = 18;

        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 12 เดือน";
        $form["remarkTwelveReport"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขรายงาน 12 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];


        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 24) {
        $form["state"] = 23;
        $form["remarkEighteenReport"] = $_POST["remark"];

        $count = $form["count"];
        $form["statusAll"] = "รอแก้ไขรายงาน 18 เดือน";

        $form["status" . $count] = "รอแก้ไขรายงาน 18 เดือน";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];


        $form["count"] = $form["count"] + 1;
    } else if ($form["state"] == 33) {
        $form["state"] = 32;

        $count = $form["count"];

        $form["statusAll"] = "รอแก้ไขรายงานฉบับสมบูรณ์";
        $form["remarkFinalReport"] = $_POST["remark"];

        $form["status" . $count] = "รอแก้ไขรายงานฉบับสมบูรณ์";
        $form["statusName" . $count] = $form["name"];
        $form["statusRole" . $count] = "ผู้ขอ";
        $form["statusDate" . $count] = "";
        $form["remark" . $count] = $_POST["remark"];


        $form["count"] = $form["count"] + 1;
    }
}

$toJson = json_encode($form);
file_put_contents($path1, $toJson);

header('Location: ' . '../views/staff.php');
exit();
