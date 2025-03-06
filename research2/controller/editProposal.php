<?php

$formName = $_POST["formName"];


$path1 = "../formResearch/" . $formName;

$jsonString = file_get_contents($path1);
$form = json_decode($jsonString, true);

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');


//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
// $date1 = new DateTime('now');
// $date1 = $date1->format('Y-m-d');
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());
$doc_file = (isset($_POST['fileResearch']) ? $_POST['fileResearch'] : '');
$upload = $_FILES['fileResearch']['name'];


//มีการอัพโหลดไฟล์
if ($upload != '') {
    //ตัดขื่อเอาเฉพาะนามสกุล
    $typefile = strrchr($_FILES['fileResearch']['name'], ".");

    //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
    if ($typefile == '.pdf') {

        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path = "../docs/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่

        $newname = 'doc_' . $form["userId"] . "_" . $date1 . $typefile;
        echo $newname;
        unlink($path . $newname);
        $path_copy = $path . $newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['fileResearch']['tmp_name'], $path_copy);

        //ประกาศตัวแปรรับค่าจากฟอร์ม
        $doc_name = $newname;

        //sql insert
        // $stmt = $conn->prepare("INSERT INTO tbl_pdf (doc_name, doc_file)
        // VALUES (:doc_name, '$newname')");
        // $stmt->bindParam(':doc_name', $doc_name, PDO::PARAM_STR);
        // $result = $stmt->execute();
        // $conn = null; //close connect db
        //เงื่อนไขตรวจสอบการเพิ่มข้อมูล



    } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
        echo '<script>
                        setTimeout(function() {
                         swal({
                             title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                             type: "error"
                         }, function() {
                             window.location = "upload_pdf.php"; //หน้าที่ต้องการให้กระโดดไป
                         });
                       }, 1000);
                   </script>';
    } //else ของเช็คนามสกุลไฟล์

}

$form["file"] = $doc_name;
$form["uploadDate"] = $currentDate;
//$form["statusAll"] = "";

$count = $form["count"] - 1;



$form["status" . $count] = "แก้ไขเอกสารเรียบร้อย";
$form["statusDate" . $count] = $currentDate;
$count = $form["count"];


if ($form["state"] == 5) {
    $form["state"] = 4;
    $form["status" . $count] = "รอตรวจสอบ";
    $staffPath = "../staff/staff.json";
    $jsonString = file_get_contents($staffPath);

    $staff = json_decode($jsonString, true);
    $form["statusName" . $count] = $staff["staff"]["fullName"];
    $form["statusRole" . $count] = $staff["staff"]["role"];
    $form["statusDate" . $count] = "";
}

else if ($form["state"] == 9) {
    $form["state"] =10;
    $form["status" . $count] = "รอตรวจสอบ";
    $staffPath = "../staff/staff.json";
    $jsonString = file_get_contents($staffPath);

    $staff = json_decode($jsonString, true);
    $form["statusName" . $count] = $staff["staff"]["fullName"];
    $form["statusRole" . $count] = $staff["staff"]["role"];
    $form["statusDate" . $count] = "";
}



$form["count"] = $form["count"] + 1;

$form["statusAll"] = "รอเจ้าหน้าที่ตรวจสอบ";
$toJson = json_encode($form);
file_put_contents($path1, $toJson);





header('Location: ' . '../views/historyRequest.php?formName='.$formName);
exit();



?>