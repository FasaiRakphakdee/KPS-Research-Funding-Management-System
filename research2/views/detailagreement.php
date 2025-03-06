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
  include('./layout.php'); ?>

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
                <form class="form-valide" action="../controller/staffContract.php" method="post"
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


                  </div>

                  <div class="table-responsive">
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
          if (strpos($form["status" . $i], "แก้ไขเอกสารเรียบร้อย") === 0 ) {
            echo "<span></span>"; // แก้ไขการเชื่อมต่อ index
        }
          elseif (isset($form["remark" . $i]) == "" && (strpos($form["status" . $i], "ไม่") === 0 || strpos($form["status" . $i], "แก้ไข") === 0 )) {
            echo "<span>" . htmlspecialchars($form["remark" . ($i + 1)]) . "</span>"; // แก้ไขการเชื่อมต่อ index
        } elseif (strpos($form["status" . $i], "ไม่") === 0 || strpos($form["status" . $i], "แก้ไข") === 0) {
            echo "<span>" . htmlspecialchars($form["remark" . $i]) . "</span>";
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

                  <style>
                    .table td span {
                      padding: 5px 10px;
                      display: inline-flex; /* ใช้ inline-flex แทนการใช้ inline-block */
                      justify-content: center; /* จัดตำแหน่งเนื้อหากลางแนวนอน */
                      align-items: center; /* จัดตำแหน่งเนื้อหากลางแนวตั้ง */
                      text-align: center; /* จัดข้อความตรงกลาง */
                      font-size: 14px;
                    }

                    .table td {
                      vertical-align: middle;
                      word-break: break-word;
                    }

                    .label {
                      padding: 5px 10px;
                      border-radius: 12px;
                      font-size: 14px;
                      display: inline-flex;
                      justify-content: center;
                      align-items: center;
                      text-align: center;
                      width: 100%;
                    }

                    .gradient-1 {
                      background-color: #4CAF50;
                      /* สีเขียวสำหรับเห็นชอบ */
                      color: white;
                    }

                    .gradient-2 {
                      background-color: #F44336;
                      /* สีแดงสำหรับไม่เห็นชอบ */
                      color: white;
                    }

                    .gradient-3 {
                      background-color: #2196F3;
                      /* สีน้ำเงินสำหรับรอเห็นชอบ */
                      color: white;
                    }
                  </style>

                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-currency">วันที่ทำสัญญา <span
                        class="text-danger">*</span>
                    </label>
                    <div class="col-lg-7">
                      <input type="date" class="form-control" id="date" name="date">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-currency">ระยะเวลาสัญญา (7-24 เดือน) <span
                        class="text-danger">*</span>
                    </label>
                    <div class="col-lg-7">
                      <input type="number" class="form-control" id="month" name="month">
                    </div>
                  </div> -->
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">ระยะเวลาสัญญา (12 - 36 เดือน) <span
                        class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                      <select class="form-control" id="month" name="month" required>
                        <?php

                        for ($i = 12; $i <= 36; $i += 6) {
                            echo "<option value=".$i.">".$i."</option>";
                        }
                        ?>
                        

                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-currency">เอกสารทำสัญญา(pdf เท่านั้น) <span
                        class="text-danger">*</span>
                    </label>
                    <div class="col-lg-6">
                      <input type="file" class="form-control" name="fileResearch" id="fileResearch"
                        accept="application/pdf" required />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-suggestions">หมายเหตุ
                    </label>
                    <div class="col-lg-7">
                      <textarea class="form-control" id="remark" name="remark" rows="5" placeholder=""></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-lg-8 ml-auto">
                      <button type="submit" class="btn btn-success">บันทึก</button>
                      <a href="./staff.php" type="submit" class="btn btn-light" style="color: black;">กลับ</a>
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