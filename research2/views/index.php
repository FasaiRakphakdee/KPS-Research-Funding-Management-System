<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- theme meta -->
  <meta name="theme-name" content="quixlab" />

  <title>ระบบขอทุนวิจัย</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
  <!-- Pignose Calender -->
  <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
  <!-- Chartist -->
  <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
  <!-- Custom Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>



  <?php
  session_start();



  ?>
  <?php include('./layout.php'); ?>

  <?php
  if ($_SESSION["requestingGrant"] == 0) {
    ?>
    <!--**********************************
    Content body start
***********************************-->
    <div class="content-body">

      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">ยื่นคำขอทุนวิจัย</h5>
                <div class="form-validation">
                  <form class="form-valide" action="../controller/createForm.php" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-6">
                        <select class="form-control" id="type" name="type" required>
                          <option value="ทุนวิจัย">ทุนอุดหนุนวิจัย</option>
                          <option value="ทุนนวัตกรรม">ทุนนวัตกรรม</option>

                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" id="nameResearch" name="nameResearch" required />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="name">ผู้ขอ<span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" id="" name="" value="<?php echo $_SESSION["username"] ?>"
                          disabled />
                        <input type="hidden" class="form-control" id="name" name="name"
                          value="<?php echo $_SESSION["username"] ?>" />
                        <input type="hidden" class="form-control" id="userId" name="userId"
                          value="<?php echo $_SESSION["access-user"] ?>" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-6">
                        <input type="text" class="form-control" name="" id=""
                          value="<?php echo $_SESSION["departmentName"] ?>" disabled />

                        <input type="hidden" class="form-control" name="department" id="department"
                          value="<?php echo $_SESSION["departmentName"] ?>" />
                        <input type="hidden" class="form-control" name="departmentCode" id="departmentCode"
                          value="<?php echo $_SESSION["departmentId"] ?>" />
                      </div>
                    </div>
                    <div class="form-group row">
  <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ(บาท) <span class="text-danger">*</span></label>
  <div class="col-lg-6">
    <input type="number" class="form-control" name="budget" id="budget" required min="1" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
  </div>
</div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-currency">ข้อเสนอโครงการวิจัย(pdf เท่านั้น) <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-6">
                        <input type="file" class="form-control" name="fileResearch" id="fileResearch"
                          accept="application/pdf" required />
                      </div>
                    </div>



                    <div class="form-group row">
                      <div class="col-lg-8 ml-auto">
                        <!-- <button type="submit" class="btn btn-primary" name="send" value="save">บันทึก</button> -->
                        <button type="submit" class="btn btn-danger" name="send" value="cancle">ยกเลิก</button>
                        <button type="submit" class="btn btn-success" name="send" value="send">ส่ง</button>
                      
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- #/ container -->
    </div>
    <!--**********************************
    Content body end
***********************************-->


    <!--**********************************
    Footer start
***********************************-->

    <!--**********************************
    Footer end
***********************************-->
    </div>
    <?php
  } else {
    ?>
    <!-- Content body start -->
    <div class="content-body">

      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">ข้อมูลการยื่นคำขอทุนวิจัยล่าสุด</h5>
                <div class="form-validation">
                  <?php
                  $path = "../formResearch/" . $_SESSION["latestFile"];

                  $jsonString = file_get_contents($path);
                  $formUser = json_decode($jsonString, true);

                  ?>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="val-email"
                        value="<?php echo $formUser["type"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="val-email"
                        value="<?php echo $formUser["nameResearch"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">สถานะคำขอทุนวิจัยล่าสุด </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="val-email"
                        value="<?php echo $formUser["statusAll"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">การแจ้งเตือนงานที่ต้องทำ </label>
                    <?php
                    if ($formUser["state"] >= 19 && $formUser["state"] < 26) {
                      $time = strtotime($formUser["dateStartContract"]);
                      $final = date("Y-m-d", strtotime("+18 month", $time));

                      $startDate = new DateTime($formUser["dateStartContract"]);
                      $endDate = new DateTime($final);

                      // แปลงวันที่ในตัวแปร $final เป็น DateTime object
                      $finalDate = new DateTime($final);

                      // แปลงวันที่ปัจจุบันเป็น DateTime object
                      $currentDate = new DateTime();

                      //นาอิฟสมมุติว่า
                      //$currentDate = new DateTime('23-07-2024');
                  
                      // คำนวณความแตกต่างระหว่างวันที่ปัจจุบันและวันที่ในตัวแปร $final
                      $interval = $currentDate->diff($finalDate);

                      // เก็บความแตกต่างเป็นจำนวนเดือนและจำนวนวัน
                      $monthsDifference = $interval->m + ($interval->y * 12);
                      $daysDifference = $interval->days;

                      if (isset($formUser["reportEighteenName"]) && $formUser["state"] >= 20) {
                        //echo "ส่งเมื่อวันที่: " . $formUser["reportEighteenDate"];
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
                            margin-top: 20px;
                            margin-right: 10px;
                            margin-bottom: auto;
                            margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    กำลังดำเนินการส่งรายงานความก้าวหน้า 18 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#FF6600FF;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #FF6600FF;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #FF6600FF;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      } 
                      elseif ($currentDate > $finalDate) {
                        // สร้างการ์ดแจ้งเตือนที่เน้นจำนวนวันเหลือ
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 18 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#D40101;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #D40101;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #D40101;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 18 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#FFA41B;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #FFA41B;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #FFA41B;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate < $finalDate) {
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    รายงานความก้าวหน้า 18 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#058F00;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #058F00;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #058F00;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      }
                    } elseif ($formUser["state"] >= 16 && $formUser["state"] < 19) {
                      $time = strtotime($formUser["dateStartContract"]);
                      $final = date("Y-m-d", strtotime("+12 month", $time));

                      $startDate = new DateTime($formUser["dateStartContract"]);
                      $endDate = new DateTime($final);

                      // แปลงวันที่ในตัวแปร $final เป็น DateTime object
                      $finalDate = new DateTime($final);

                      // แปลงวันที่ปัจจุบันเป็น DateTime object
                      $currentDate = new DateTime();

                      //นาอิฟสมมุติว่า
                      //$currentDate = new DateTime('23-07-2024');
                  
                      // คำนวณความแตกต่างระหว่างวันที่ปัจจุบันและวันที่ในตัวแปร $final
                      $interval = $currentDate->diff($finalDate);

                      // เก็บความแตกต่างเป็นจำนวนเดือนและจำนวนวัน
                      $monthsDifference = $interval->m + ($interval->y * 12);
                      $daysDifference = $interval->days;

                      if (isset($formUser["reportTwelveName"]) && $formUser["state"] >= 17) {
                        //echo "ส่งเมื่อวันที่: " . $formUser["reportTwelveDate"];
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
                            margin-top: 20px;
                            margin-right: 10px;
                            margin-bottom: auto;
                            margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    กำลังดำเนินการส่งรายงานความก้าวหน้า 12 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#FF6600FF;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #FF6600FF;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #FF6600FF;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      
                      } 
                      elseif ($currentDate > $finalDate) {
                        // สร้างการ์ดแจ้งเตือนที่เน้นจำนวนวันเหลือ
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 12 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#D40101;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #D40101;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #D40101;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 12 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#FFA41B;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #FFA41B;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #FFA41B;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate < $finalDate) {
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    รายงานความก้าวหน้า 12 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#058F00;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #058F00;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #058F00;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      }
                    } elseif ($formUser["state"] >= 11 && $formUser["state"] < 16) {
                      $time = strtotime($formUser["dateStartContract"]);
                      $final = date("d-m-Y", strtotime("+6 month", $time));
                      //echo 'ทดสอบวันที่: ' . date("d-m-Y", strtotime($final));
                      // Get the current month
                      // แปลงวันที่เริ่มต้นและวันที่สิ้นสุดให้เป็น DateTime objects
                      $startDate = new DateTime($formUser["dateStartContract"]);
                      $endDate = new DateTime($final);

                      // แปลงวันที่ในตัวแปร $final เป็น DateTime object
                      $finalDate = new DateTime($final);

                      // แปลงวันที่ปัจจุบันเป็น DateTime object
                      $currentDate = new DateTime();

                      //นาอิฟสมมุติว่า
                      //$currentDate = new DateTime('23-07-2024');
                  
                      // คำนวณความแตกต่างระหว่างวันที่ปัจจุบันและวันที่ในตัวแปร $final
                      $interval = $currentDate->diff($finalDate);

                      // เก็บความแตกต่างเป็นจำนวนเดือนและจำนวนวัน
                      $monthsDifference = $interval->m + ($interval->y * 12);
                      $daysDifference = $interval->days;

                      if (isset($formUser["reportSixName"]) && $formUser["state"] >= 12) {
                        //echo "ส่งเมื่อวันที่: " . $formUser["reportSixDate"];
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
                            margin-top: 20px;
                            margin-right: 10px;
                            margin-bottom: auto;
                            margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    กำลังดำเนินการส่งรายงานความก้าวหน้า 6 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#FF6600FF;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #FF6600FF;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #FF6600FF;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      
                      } 
                      elseif ($currentDate > $finalDate) {
                        // สร้างการ์ดแจ้งเตือนที่เน้นจำนวนวันเหลือ
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 6 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#D40101;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #D40101;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #D40101;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานความก้าวหน้า 6 เดือน
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#FFA41B;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #FFA41B;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #FFA41B;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate < $finalDate) {
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    รายงานความก้าวหน้า 6 เดือน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#058F00;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #058F00;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #058F00;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      }
                    }
                    //$finalForm = 1;
                    //if (isset($formUser["timeMonth"])) {
                    //  if ($formUser["timeMonth"] >= 7 and $formUser["timeMonth"] <= 12 and isset($formUser["reportSixName"]) and $formUser["state"] != 14 and $formUser["state"] != 12) {
                    //    $finalForm = 1;
                    //  } else if ($formUser["timeMonth"] >= 13 and $formUser["timeMonth"] <= 18 and isset($formUser["reportTwelveName"]) and $formUser["state"] != 17 and $formUser["state"] != 15) {
                    //    $finalForm = 1;
                    //  } else if ($formUser["timeMonth"] >= 19 and $formUser["timeMonth"] <= 24 and isset($formUser["reportEighteenName"]) and $formUser["state"] != 20 and $formUser["state"] != 18) {
                    //    $finalForm = 1;
                    //  }
                    //}
                    if ( $formUser["state"] >= 11) {
                      $time = strtotime($formUser["dateStartContract"]);
                      $final = date("Y-m-d", strtotime("+24 month", $time));

                      $startDate = new DateTime($formUser["dateStartContract"]);
                      $endDate = new DateTime($final);

                      // แปลงวันที่ในตัวแปร $final เป็น DateTime object
                      $finalDate = new DateTime($final);

                      // แปลงวันที่ปัจจุบันเป็น DateTime object
                      $currentDate = new DateTime();

                      //นาอิฟสมมุติว่า
                      //$currentDate = new DateTime('23-07-2024');
                  
                      // คำนวณความแตกต่างระหว่างวันที่ปัจจุบันและวันที่ในตัวแปร $final
                      $interval = $currentDate->diff($finalDate);

                      // เก็บความแตกต่างเป็นจำนวนเดือนและจำนวนวัน
                      $monthsDifference = $interval->m + ($interval->y * 12);
                      $daysDifference = $interval->days;

                      if (isset($formUser["reportFinalName"]) && $formUser["state"] > 31) {
                        //echo "ส่งเมื่อวันที่: " . $formUser["reportFinalnDate"];
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
                            margin-top: 20px;
                            margin-right: 10px;
                            margin-bottom: auto;
                            margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    กำลังดำเนินการส่งรายงาน
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#FF6600FF;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #FF6600FF;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #FF6600FF;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      
                      } 
                      elseif ($currentDate > $finalDate) {
                        // สร้างการ์ดแจ้งเตือนที่เน้นจำนวนวันเหลือ
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานฉบับสมบูรณ์
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#D40101;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #D40101;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #D40101;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo '
<div style="
    background-color: #ffffff; 
    border-radius: 10px; 
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
    padding: 10px; 
    max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
">
    <div style="font-size: 14px; color: #555;">
            รายงานฉบับสมบูรณ์
        </div>
            <div style="font-size: 14px; color: #555;">
            <span style="color:#FFA41B;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
        </div>
    <div style="
        border: 2px solid #FFA41B;
        padding: 10px;
        border-radius: 5px;
    ">
        <div style="font-size: 36px; font-weight: bold; color: #FFA41B;">
            ' . $daysDifference . '
        </div>
        <div style="font-size: 14px; color: #555;">
            วัน
        </div>
    </div>
</div>
';
                      } elseif ($currentDate < $finalDate) {
                        echo '
                        <div style="
                            background-color: #ffffff; 
                            border-radius: 10px; 
                            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); 
                            padding: 10px; 
                            max-width: 200px; 
    margin-top: 20px;
    margin-right: 10px;
    margin-bottom: auto;
    margin-left: 10px;
                            text-align: center;
                            font-family: Arial, sans-serif;
                        ">
                            <div style="font-size: 14px; color: #555;">
                                    รายงานฉบับสมบูรณ์
                                </div>
                                    <div style="font-size: 14px; color: #555;">
                                    <span style="color:#058F00;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>
                                </div>
                            <div style="
                                border: 2px solid #058F00;
                                padding: 10px;
                                border-radius: 5px;
                            ">
                                <div style="font-size: 36px; font-weight: bold; color: #058F00;">
                                    ' . $daysDifference . '
                                </div>
                                <div style="font-size: 14px; color: #555;">
                                    วัน
                                </div>
                            </div>
                        </div>
                        ';
                      }
                    }
                    ?>
                  </div>
                  <a href="./historyRequest.php?formName=<?php echo urlencode($_SESSION["latestFile"]); ?>"
                    class="btn btn-primary" aria-expanded="false"
                    style="float: right;margin-top: 10px;margin-right: 60px;">
                    ดูประวัติคำขอทุนวิจัยล่าสุด
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!-- Content body end -->
    <?php
  }
  ?>


  <!--**********************************
        Main wrapper end
    ***********************************-->

  <!--**********************************
        Scripts
    ***********************************-->
  <script src="plugins/common/common.min.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/gleek.js"></script>
  <script src="js/styleSwitcher.js"></script>

  <!-- Chartjs -->
  <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
  <!-- Circle progress -->
  <script src="./plugins/circle-progress/circle-progress.min.js"></script>
  <!-- Datamap -->
  <script src="./plugins/d3v3/index.js"></script>
  <script src="./plugins/topojson/topojson.min.js"></script>
  <script src="./plugins/datamaps/datamaps.world.min.js"></script>
  <!-- Morrisjs -->
  <script src="./plugins/raphael/raphael.min.js"></script>
  <script src="./plugins/morris/morris.min.js"></script>
  <!-- Pignose Calender -->
  <script src="./plugins/moment/moment.min.js"></script>
  <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
  <!-- ChartistJS -->
  <script src="./plugins/chartist/js/chartist.min.js"></script>
  <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



  <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>