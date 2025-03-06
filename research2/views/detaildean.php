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
  include('./layout.php'); 
  include('../controller/checkDeanState.php');
  ?>

  <?php

  $formName = $_GET["formName"];

  $path = "../formResearch/" . $formName;


  $jsonString = file_get_contents($path);
  $form = json_decode($jsonString, true);

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
                <form class="form-valide" action="../controller/deanConfirm.php" method="post"
                  enctype="multipart/form-data">
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="val-email"
                        value="<?php echo $form["type"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="val-email"
                        value="<?php echo $form["nameResearch"] ?>" disabled />
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="name">ผู้ขอ
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $form["name"] ?>"
                        disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" name="name" id="name"
                        value="<?php echo $form["department"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ
                    </label>
                    <div class="col-lg-7">
                      <input type="number" class="form-control" name="money" id="money"
                        value="<?php echo $form["budget"] ?>" disabled />
                    </div>
                  </div>
                  <?php

                  if (isset($form["fileContractName"])) {
                    echo "
                    
                    <div class=\"form-group row\">
                     
                      <label  class=\"col-lg-4 col-form-label\" for=\"val-suggestions\">ระยะเวลาสัญญา</label>
                     
                      <div class=\"col-lg-7 input-group\"  id=\"date-range\">
                        <input type=\"date\" class=\"form-control\" name=\"start\" value = " . $form["dateStartContract"] . " disabled> <span class=\"input-group-addon bg-info b-0 text-white\">ถึง</span>
                        <input type=\"date\" class=\"form-control\" name=\"end\" value = " . $form["dateEndContract"] . " disabled>
                      </div>
                    
                    </div>

            



            ";
                  }

                  ?>
                  <input type="hidden" class="form-control" name="formName" id="formName" value="<?php echo $path ?>" />
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">ข้อเสนอโครงการวิจัย</h4>
                          <div class="col-md-12">
                            <a href="<?php echo "../docs/" . $form["file"] ?>" download>ข้อเสนอโครงการวิจัย.pdf <svg
                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                  d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                              </svg></a>
                          </div>
                        </div>
                        <div class="card-footer">
                          <?php echo $form["uploadDate"] ?>
                        </div>
                      </div>
                    </div>

                    <?php
                    if (isset($form["reportSixName"])) {
                      echo "
                    
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานความก้าวหน้า 6 เดือน</h4>
                          <div class=\"col-md-12\">";


                      echo "<a href=" . "../docs/" . $form["reportSixName"] . " download>report6.pdf <svg
                                  xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                                  <path
                                    d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                                </svg></a>";


                      echo "  </div>
                        </div>
                        <div class=\"card-footer\">" .
                        $form["reportSixDate"] . "
                        </div>
                      </div>
                    </div>
                    
                    "
                      ;
                    }



                    ?>

                    <?php
                    if (isset($form["reportTwelveName"])) {
                      echo "
                    
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานความก้าวหน้า 12 เดือน</h4>
                          <div class=\"col-md-12\">";


                      echo "<a href=" . "../docs/" . $form["reportTwelveName"] . " download>report12.pdf <svg
                                  xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                                  <path
                                    d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                                </svg></a>";


                      echo "  </div>
                        </div>
                        <div class=\"card-footer\">" .
                        $form["reportTwelveDate"] . "
                        </div>
                      </div>
                    </div>
                    
                    "
                      ;
                    }



                    ?>

                    <?php
                    if (isset($form["reportEighteenName"])) {
                      echo "
                    
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานความก้าวหน้า 18 เดือน</h4>
                          <div class=\"col-md-12\">";


                      echo "<a href=" . "../docs/" . $form["reportEighteenName"] . " download>report18.pdf <svg
                                  xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                                  <path
                                    d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                                </svg></a>";


                      echo "  </div>
                        </div>
                        <div class=\"card-footer\">" .
                        $form["reportEighteenDate"] . "
                        </div>
                      </div>
                    </div>
                    
                    "
                      ;
                    }



                    ?>

                    <?php
                    if (isset($form["reportFinalName"])) {
                      echo "
                    
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานฉบับสมบูรณ์</h4>
                          <div class=\"col-md-12\">";


                      echo "<a href=" . "../docs/" . $form["reportFinalName"] . " download>finalreport.pdf <svg
                                  xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                                  <path
                                    d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                                </svg></a>";


                      echo "  </div>
                        </div>
                        <div class=\"card-footer\">" .
                        $form["reportFinalnDate"] . "
                        </div>
                      </div>
                    </div>
                    
                    "
                      ;
                    }



                    ?>
                  </div>

                  <div class="table-responsive ">
    <table class="table header-border">
        <thead>
            <tr>
                <th>วันที่</th>
                <th>ชื่อ-นามสกุล</th>
                <th>ตำแหน่ง</th>
                <th>สถานะ</th>
                <th>ความคิดเห็น</th> <!-- คอลัมน์ความคิดเห็น -->
            </tr>
        </thead>
        <tbody>
        <?php
        $n = $form["count"];

        for ($i = 1; $i < $n; $i++) {
            echo "<tr>";
            echo "<td><span>" . $form["statusDate" . $i] . "</span></td>";
            echo "<td><span>" . $form["statusName" . $i] . "</span></td>";
            echo "<td><span>" . $form["statusRole" . $i] . "</span></td>";

            // Determine the color based on the status
            if (
              strcmp($form["status" . $i], "เห็นชอบ") === 0 || strcmp($form["status" . $i], "ยื่นคำขอทุนวิจัย") === 0
              || strcmp($form["status" . $i], "แก้ไขเอกสารเรียบร้อย") === 0 || strcmp($form["status" . $i], "ผ่านการตรวจสอบ") === 0
              || strcmp($form["status" . $i], "คณะกรรมเห็นชอบ") === 0 || strcmp($form["status" . $i], "อนุมัติ") === 0
              || strcmp($form["status" . $i], "ทำสัญญา") === 0 || strcmp($form["status" . $i], "ส่งรายงานความคืบหน้า 6 เดือน") === 0
              || strcmp($form["status" . $i], "ส่งรายงานความคืบหน้า 12 เดือน") === 0
          ) {
              $color = "label gradient-1 rounded";
          } else if (
              strcmp($form["status" . $i], "รอเห็นชอบ") === 0 || strcmp($form["status" . $i], "แก้ไข") === 0
              || strpos($form["status" . $i], "รอแก้ไข") === 0
          ) {
              $color = "label gradient-3 rounded";
          } else if (strpos($form["status" . $i], "ไม่") === 0) {
              $color = "label gradient-2 rounded";
          }
          
          // Display the status with the appropriate color
          echo "<td><span class=\"" . $color . "\">" . $form["status" . $i] . "</span></td>";

          // Display the comment directly in the table cell
          echo "<td>";
          if ($form["statusRole" . $i] == "คณะกรรมการ" && (strpos($form["status" . $i], "แก้ไขเอกสารเรียบร้อย") === 0 )) {
            echo "<span class='label gradient-orange rounded'></span>"; // แก้ไขการเชื่อมต่อ index
        }
        elseif ($form["statusRole" . $i] == "คณะกรรมการ" && (isset($form["remark" . $i]) == "" && (strpos($form["status" . $i], "ไม่") === 0 || strpos($form["status" . $i], "แก้ไข") === 0 ))) {
            echo "<span class='label gradient-orange rounded'>" . htmlspecialchars($form["remark" . ($i + 1)]) . "</span>"; // แก้ไขการเชื่อมต่อ index
        } elseif ($form["statusRole" . $i] == "คณะกรรมการ" && (strpos($form["status" . $i], "ไม่") === 0 || strpos($form["status" . $i], "แก้ไข") === 0)) {
            echo "<span class='label gradient-orange rounded'>" . htmlspecialchars($form["remark" . $i]) . "</span>";
        } else {
            echo "<span></span>";  // หาก
        }
        
          echo "</td>"; // ปิดคอลัมน์ความคิดเห็น

          echo "</tr>";
      }
      ?>
      </tbody>
  </table>
</div>

<!-- เพิ่ม CSS เพื่อปรับการแสดงผล -->
<style>
  /* จัดข้อความในคอลัมน์ให้ตรงกลางทั้งแนวนอนและแนวตั้ง */
  .table td, .table th {
    text-align: center; /* จัดข้อความให้อยู่กลางแนวนอน */
    vertical-align: middle; /* จัดข้อความให้อยู่กลางแนวตั้ง */
  }

  /* ปรับตำแหน่งข้อความในคอลัมน์ความคิดเห็น */
  .table td:last-child {
    text-align: left; /* จัดข้อความชิดซ้าย */
  }

  /* กำหนดสไตล์ของสถานะ */
  .status-label {
    display: inline-block;
    padding: 5px 10px; /* เพิ่มระยะห่างภายใน (ซ้าย-ขวา, ขึ้น-ลง) */
    font-size: 14px; /* ขนาดข้อความ */
    border-radius: 12px; /* ทำมุมมน */
    color: white; /* สีข้อความ */
    text-align: center;
    line-height: 30px; /* จัดข้อความให้อยู่กลางแนวตั้ง */
  }

  /* กำหนดสีของสถานะ */
  .gradient-1 {
    background-color: #4e73df; /* สีฟ้า */
  }

  .gradient-2 {
    background-color: #e74a3b; /* สีแดง */
  }

  .gradient-3 {
    background-color: #f6c23e; /* สีเหลือง */
  }

  /* เพิ่มการจัดระยะห่างให้กับความคิดเห็น */
  .table td span {
    word-wrap: break-word;
    display: block;
  }

  /* ปรับให้ตารางขยายได้เต็มพื้นที่ */
  .table-responsive {
    overflow-x: auto; /* ให้แสดงแถบเลื่อนเมื่อจำเป็น */
    max-width: 100%; /* ให้ตารางขยายได้เต็มพื้นที่ */
  }

  /* ปรับการแสดงผลของตาราง */
  .table {
    table-layout: auto; /* ให้คอลัมน์ปรับขนาดตามเนื้อหา */
    width: 100%; /* ให้ตารางเต็มพื้นที่ */
  }

  .rounded {
    border-radius: 12px; /* เพิ่มมุมมน */
  }
</style>



                      </tbody>
                    </table>
                  </div>

                  <?php

                  $committeeName = "คณบดี วิศวกรรมศาสตร์ กำแพงแสน";

                  $n = $form["count"];
                  $check = 0;

                  for ($i = 1; $i < $n; $i++) {
                    if ($form["statusName" . $i] == $committeeName and $form["status" . $i] == "รออนุมัติ") {
                      $check = 1;
                    }
                  }





                  if ($form["state"] >= 15) {
                    echo "
    <div class=\"form-group row\">
        <div class=\"col-lg-8 ml-auto\">
            <button type=\"submit\" class=\"btn btn-success\" name=\"status\" value=\"อนุมัติ\" id=\"approveBtn\">อนุมัติ</button>
            <button type=\"button\" class=\"btn btn-danger\" onclick=\"showDisapproveBox()\" id=\"disapproveBtn\">ไม่อนุมัติ</button>
            <a href=\"./committee.php\" type=\"submit\" class=\"btn btn-light\" style=\"color: black;\">กลับ</a>
        </div>
    </div>
    
    <!-- กล่องสำหรับกรอกความคิดเห็น -->
    <div class=\"form-group row justify-content-center\" id=\"commentBox\" style=\"display:none;\">
        <label class=\"col-lg-4 col-form-label text-center\" for=\"remark\">กรุณากรอกความคิดเห็น</label>
        <div class=\"col-lg-7\">
            <textarea class=\"form-control\" id=\"remark\" name=\"remark\" rows=\"3\" maxlength=\"100\" placeholder=\"กรอกข้อความ (สูงสุด 100 ตัวอักษร)\"></textarea>
        </div>
    </div>
    
    <!-- ปุ่มสำหรับส่งความคิดเห็นและยกเลิก -->
    <div class=\"form-group row justify-content-center\" id=\"commentBoxSubmit\" style=\"display:none;\">
        <div class=\"col-lg-7 d-flex justify-content-center\">
            <button type=\"submit\" class=\"btn btn-danger mx-3\" name=\"status\" value=\"ไม่อนุมัติ\">ไม่อนุมัติ</button>
            <button type=\"button\" class=\"btn btn-light mx-3\" onclick=\"cancelDisapprove()\">ยกเลิก</button>
        </div>
    </div>";
                  }
                elseif (checkDeanState($form["state"])) {
                    echo "
                    <div class=\"form-group row\">
                        <div class=\"col-lg-8 ml-auto\">
                            <button type=\"submit\" class=\"btn btn-success\" name=\"status\" value=\"อนุมัติ\" id=\"approveBtn\">อนุมัติ</button>
                            <button type=\"button\" class=\"btn btn-danger\" onclick=\"showCommentBox()\" id=\"disapproveBtn\">ไม่อนุมัติ</button>
                            <button type=\"button\" class=\"btn btn-warning\" onclick=\"showEditBox()\" id=\"editBtn\">แก้ไข</button>
                            <a href=\"./committee.php\" type=\"submit\" class=\"btn btn-light\" style=\"color: black;\">กลับ</a>
                        </div>
                  </div>
                
                    <!-- กล่องสำหรับกรอกความคิดเห็น -->
                    <div class=\"form-group row justify-content-center\" id=\"commentBox\" style=\"display:none;\">
                        <label class=\"col-lg-4 col-form-label text-center\" for=\"remark\">กรุณากรอกความคิดเห็น</label>
                        <div class=\"col-lg-7\">
                            <textarea class=\"form-control\" id=\"remark\" name=\"remark\" rows=\"3\" maxlength=\"100\" placeholder=\"กรอกข้อความ (สูงสุด 100 ตัวอักษร)\"></textarea>
                        </div>
                    </div>
                
                    <!-- ปุ่มสำหรับส่งความคิดเห็นและยกเลิก -->
                    <div class=\"form-group row justify-content-center\" id=\"commentBoxSubmit\" style=\"display:none;\">
                        <div class=\"col-lg-7 d-flex justify-content-center\">
                            <button type=\"submit\" class=\"btn btn-danger mx-3\" name=\"status\" value=\"ไม่อนุมัติ\">ไม่อนุมัติ</button>
                            <button type=\"button\" class=\"btn btn-light mx-3\" onclick=\"cancelComment()\">ยกเลิก</button>
                        </div>
                    </div>
                
                    <!-- กล่องสำหรับแก้ไข -->
                    <div class=\"form-group row justify-content-center\" id=\"editBox\" style=\"display:none;\">
                        <label class=\"col-lg-4 col-form-label text-center\" for=\"editRemark\">กรุณากรอกข้อมูลแก้ไข</label>
                        <div class=\"col-lg-7\">
                            <textarea class=\"form-control\" id=\"editRemark\" name=\"editRemark\" rows=\"3\" maxlength=\"100\" placeholder=\"กรอกข้อมูลแก้ไข (สูงสุด 100 ตัวอักษร)\"></textarea>
                        </div>
                    </div>
                
                    <!-- ปุ่มสำหรับยืนยันการแก้ไขและยกเลิก -->
                    <div class=\"form-group row justify-content-center\" id=\"editBoxSubmit\" style=\"display:none;\">
                        <div class=\"col-lg-7 d-flex justify-content-center\">
                            <button type=\"submit\" class=\"btn btn-warning mx-3\" name=\"status\" value=\"แก้ไข\">แก้ไข</button>
                            <button type=\"button\" class=\"btn btn-light mx-3\" onclick=\"cancelEdit()\">ยกเลิก</button>
                        </div>
                    </div>";
                } 
                else {
                    echo "
                    <div class=\"form-group row\">
                        <div class=\"col-lg-8 ml-auto\">
                            <a href=\"./committee.php\" class=\"btn btn-light mx-3\" style=\"color: black;\">กลับ</a>
                        </div>
                    </div>";
                }
                ?>
                
                <script>
                  function showDisapproveBox() {
    // ทำให้ปุ่มอื่นๆ จางและกดไม่ได้
    document.getElementById("approveBtn").style.opacity = "0.5";
    document.getElementById("approveBtn").disabled = true;
    
    // แสดงกล่องคอมเมนต์และปุ่ม "ไม่เห็นชอบ"
    document.getElementById("disapproveBtn").style.display = "none"; // ซ่อนปุ่ม "ไม่เห็นชอบ"
    document.getElementById("commentBox").style.display = "block";
    document.getElementById("commentBoxSubmit").style.display = "block";
}

function cancelDisapprove() {
    // ซ่อนกล่องคอมเม้นต์และปุ่ม "ไม่เห็นชอบ"
    document.getElementById("commentBox").style.display = "none";
    document.getElementById("commentBoxSubmit").style.display = "none";

    // คืนค่าปุ่มกลับมา
    document.getElementById("approveBtn").style.opacity = "1";
    document.getElementById("approveBtn").disabled = false;
    document.getElementById("disapproveBtn").style.display = "inline-block"; // แสดงปุ่ม "ไม่เห็นชอบ"
}
    
                function showCommentBox() {
    // ทำให้ปุ่มอื่นๆ จางและกดไม่ได้
    document.getElementById("approveBtn").style.opacity = "0.5";
    document.getElementById("approveBtn").disabled = true;
    document.getElementById("editBtn").style.opacity = "0.5";
    document.getElementById("editBtn").disabled = true;

    
    // แสดงกล่องคอมเมนต์และปุ่ม "ไม่เห็นชอบ"
    document.getElementById("disapproveBtn").style.display = "none"; // ซ่อนปุ่ม "ไม่เห็นชอบ"
    document.getElementById("commentBox").style.display = "block";
    document.getElementById("commentBoxSubmit").style.display = "block";
}

function cancelComment() {
    // ซ่อนกล่องคอมเม้นต์และปุ่ม "ไม่เห็นชอบ"
    document.getElementById("commentBox").style.display = "none";
    document.getElementById("commentBoxSubmit").style.display = "none";

    // คืนค่าปุ่มกลับมา
    document.getElementById("approveBtn").style.opacity = "1";
    document.getElementById("approveBtn").disabled = false;
    document.getElementById("editBtn").style.opacity = "1";
    document.getElementById("editBtn").disabled = false;
    document.getElementById("disapproveBtn").style.display = "inline-block"; // แสดงปุ่ม "ไม่เห็นชอบ"
}

function showEditBox() {
    // ทำให้ปุ่มอื่นๆ จางและกดไม่ได้
    document.getElementById("approveBtn").style.opacity = "0.5";
    document.getElementById("approveBtn").disabled = true;
    document.getElementById("disapproveBtn").style.opacity = "0.5";
    document.getElementById("disapproveBtn").disabled = true;

    // แสดงกล่องแก้ไขและปุ่ม "ยืนยันการแก้ไข"
    document.getElementById("editBtn").style.display = "none"; // ซ่อนปุ่ม "แก้ไข"
    document.getElementById("editBox").style.display = "block";
    document.getElementById("editBoxSubmit").style.display = "block";
}

function cancelEdit() {
    // ซ่อนกล่องแก้ไขและปุ่ม "ยืนยันการแก้ไข"
    document.getElementById("editBox").style.display = "none";
    document.getElementById("editBoxSubmit").style.display = "none";

    // คืนค่าปุ่มกลับมา
    document.getElementById("approveBtn").style.opacity = "1";
    document.getElementById("approveBtn").disabled = false;
    document.getElementById("disapproveBtn").style.opacity = "1";
    document.getElementById("disapproveBtn").disabled = false;
    document.getElementById("editBtn").style.display = "inline-block"; // แสดงปุ่ม "แก้ไข"
} 
                </script>
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