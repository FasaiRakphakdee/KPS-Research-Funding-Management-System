<?php

//echo "เข้าจ้า";

$type = $_POST["type"];
$userId = $_POST["userId"];
$nameResearch = $_POST["nameResearch"];
//echo $type.$nameResearch;
$name = $_POST["name"];
$department = $_POST["department"];
$departmentCode = $_POST["departmentCode"];
$budget = $_POST["budget"];
//echo $budget;
$file = $_FILES['fileResearch'];

isset($_POST['fileResearch']) ? $file = $_POST['fileResearch'] : $file = "";
//echo $file;

$send = $_POST["send"];




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
        $newname = 'doc_' . $userId . "_" . $date1 . $typefile;
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

} // if($upload !='') {



// header('Location: ' . '../views/historyRequest.php');
// exit();

$currentDateTime = new DateTime('now');
$currentDate = $currentDateTime->format('d-m-Y');
$currentDate2 = date("Ymd_His");

$headDetpName = "";
$headDeptPath = "../headdept/*";
$files = glob($headDeptPath);

foreach ($files as $file) {
    $jsonString = file_get_contents($file);
    $headdept = json_decode($jsonString, true);
    $key = $headdept["key"];
    
    

    if($departmentCode == $headdept[$key]["deptCode"]){
        $headDetpName = $headdept[$key]["fullName"];
    }



}







$form = array(
    "userId" => $userId,
    "formName" => $userId . "_proposal_" . $currentDate2 . ".json",
    "name" => $name,
    "nameResearch" => $nameResearch,
    "department" => $department,
    "departmentCode" => $departmentCode,
    "type" => $type,
    "budget" => $budget,
    "date" => $currentDate,
    "statusSend" => $send,
    "file" => $doc_name,
    "uploadDate" => $currentDate,
    "count" => "3",
    "statusName1" => $name,
    "statusRole1" => "ผู้ขอ",
    "statusDate1" => $currentDate,
    "status1" => "ยื่นคำขอทุนวิจัย",
    "statusName2" => $headDetpName,
    "statusRole2" => "หัวหน้าภาควิชา",
    "statusDate2" => "",
    "status2" => "รอเห็นชอบ",

    "statusAll" => "รอหัวหน้าภาควิชาเห็นชอบ",
);

$form["state"] = 1;

if ($send == "send") {
    $form["state"] = 3;
} else if ($send == "save") {
    $form["state"] = 2;
}

$path = "../formResearch";
$toJson = json_encode($form);
file_put_contents("../formResearch/" . $userId . "_proposal_" . $currentDate2 . ".json", $toJson);


header('Location: ' . '../views/historyRequest.php?formName='.$form["formName"]);
exit();

?>