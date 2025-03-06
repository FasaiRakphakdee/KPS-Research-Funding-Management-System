<?php


$formName = $_POST["formName"];

$path1 = "../formResearch/" . $formName;

$jsonString = file_get_contents($path1);
$form = json_decode($jsonString, true);

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');
// อัปเดตสถานะและวันที่
$form["status" . $count] = $headDeptStatus;
$form["statusDate" . $count] = $currentDate;

$date1 = date("Ymd_His");
$numrand = mt_rand();
$upload = $_FILES['fileResearch']['name'];

// ตรวจสอบการอัปโหลดไฟล์
if ($upload != '') {
    $typefile = strrchr($_FILES['fileResearch']['name'], ".");

    if ($typefile == '.pdf') {
        $path = "../docs/";
        $newname = 'doc_' . $form["userId"] . "_reportSixMonth_" . $date1 . $typefile;
        $path_copy = $path . $newname;
        move_uploaded_file($_FILES['fileResearch']['tmp_name'], $path_copy);

        $doc_name = $newname;
    } else {
        echo '<script>
                        setTimeout(function() {
                         swal({
                             title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                             type: "error"
                         }, function() {
                             window.location = "upload_pdf.php";
                         });
                       }, 1000);
                   </script>';
        exit();
    }
}

$form["reportSixName"] = $doc_name;
$form["reportSixDate"] = $currentDate;
$form["state"] = 12; 
$form["statusAll"] = "ส่งรายงานความคืบหน้า 6 เดือน";

$count = $form["count"];
$form["status" . $count] = "ส่งรายงานความคืบหน้า 6 เดือน";
$form["statusName" . $count] = $form["name"];
$form["statusRole" . $count] = "ผู้ขอ";
$form["statusDate" . $count] = $currentDate;

$form["count"] = $form["count"] + 1;
$count = $form["count"];

$form["status" . $count] = "รอตรวจสอบ";

$headDetpName = "";
$headDeptPath = "../headdept/*";
$files = glob($headDeptPath);
$headDeptRole ="";
$departmentCode =$form["departmentCode"];
foreach ($files as $file) {
    $jsonString = file_get_contents($file);
    $headdept = json_decode($jsonString, true);
    $key = $headdept["key"];
    if ($departmentCode == $headdept[$key]["deptCode"]) {
        $headDetpName = $headdept[$key]["fullName"];
        $headDeptRole=$headdept[$key]["role"];
    }
}


$staff = json_decode($jsonString, true);
$form["statusName" . $form["count"]] = $headDetpName;
$form["statusRole" . $form["count"]] = $headDeptRole;
$form["statusDate" . $count] = "";


$form["count"] = $form["count"] + 1;

$toJson = json_encode($form, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents($path1, $toJson);

header('Location: ' . '../views/historyRequest.php?formName=' . $formName);
exit();
?>
