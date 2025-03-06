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
  $userId = 1;
  $path = "../formResearch/";

  $formName = $_GET["formName"];

  $path = "../formResearch/" . $formName;

  $jsonString = file_get_contents($path);
  $formUser = json_decode($jsonString, true);

  $canSee = true;
  if ($_SESSION["access-user"] == $formUser["userId"]) {
    $canSee = false;
  }

  ?>

  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">

    <div class="container-fluid mt-3">
      <div class="row">
        <!--1 card-->
        <div class="col-md-12">


          <div class="card">
            <div class="card-body">

              <p class="card-title">ยื่นคำขอทุนวิจัย <span>&nbsp;&nbsp;
                  <?php
                  echo $formUser["date"];
                  ?>
                </span></p>
              <div class="form-validation">
                <form class="form-valide" action="#" method="post">
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
                    <label class="col-lg-4 col-form-label" for="name">ผู้ขอ</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="name" name="name"
                        value="<?php echo $formUser["name"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" name="name" id="name"
                        value="<?php echo $formUser["department"] ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ</label>
                    <div class="col-lg-7">
                      <input type="number" class="form-control" name="money" id="money"
                        value="<?php echo $formUser["budget"] ?>" disabled />
                    </div>
                  </div>



                  <?php

                  if (isset($formUser["fileContractName"])) {
                    echo "
    <div class=\"form-group row\">
        <label class=\"col-lg-4 col-form-label\" for=\"val-suggestions\">ระยะเวลาสัญญา</label>
        <div class=\"col-lg-7 input-group\" id=\"date-range\">
            <input type=\"text\" class=\"form-control\" value=\"" . date("d-m-Y", strtotime($formUser["dateStartContract"])) . "\" disabled>
            <span class=\"input-group-addon bg-info b-0 text-white\">ถึง</span>
            <input type=\"text\" class=\"form-control\" value=\"" . date("d-m-Y", strtotime($formUser["dateEndContract"])) . "\" disabled>
        </div>
    </div>";

                  }

                  ?>


                  <div class="row">
                    <div class="col-md-4">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">ข้อเสนอโครงการวิจัย</h4>
                          <div class="col-md-12">
                            <a href="<?php echo " ../docs/" . $formUser["file"] ?>" download>proposal.pdf <svg
                                xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                <path
                                  d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
                              </svg></a>
                          </div>
                          <br>
                          <form class="form-valide" action="../controller/editProposal.php" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                              <?php
                              // if ($formUser["state"] == 5 or $formUser["state"] == 9) {
                              //   echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required />";
                              
                              // echo "";
                              // }
                              ?>
                              <input type="hidden" class="form-control" name="formName" id="formName"
                                value=" <?php echo $formUser["formName"] ?>" />
                            </div>
                            <div class="float-right" style="justify-content: end; align-items: end;">

                              <?php
                              // if ($formUser["state"] == 5 or $formUser["state"] == 9) {
                              //   echo "<button type=\"submit\" class=\"btn btn-success \"
                              //     style=\"font-size:12px; color:white \">บันทึก</button>";
                              // }
                              ?>

                            </div>

                          </form>

                        </div>
                        <div class="card-footer">
                          <?php echo "วันที่ขอ: " . $formUser["uploadDate"]; ?>

                        </div>
                      </div>
                    </div>

                    <?php
                    if (isset($formUser["fileContractName"])) {


                      echo "
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">เอกสารทำสัญญา</h4>
                          <div class=\"col-md-12\">
                        ";
                      if (isset($formUser["fileContractName"])) {
                        echo "<a href=" . "../docs/" . $formUser["fileContractName"] . " download>contract.pdf <svg
                            xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                            <path
                              d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                          </svg></a>";
                      }

                      echo "</div>
                              <br>
                        ";

                      echo "
                        
                        <div class=\"form-group\">
                        ";


                      echo "</div>

                    </div>";

                      echo "<div class=\"card-footer\">";

                      if (isset($formUser["fileContractName"])) {
                        echo "วันที่เริ่มสัญญา: " . $formUser["dateStartContract"];
                      }


                      echo "</div>";

                      echo "


                      </div>
                    </div>

                    ";

                    }



                    ?>



                    <?php






                    if ($formUser["state"] >= 11 && $formUser["state"] < 31) {
                      echo "
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานความก้าวหน้า 6 เดือน</h4>
                          <div class=\"col-md-12\">";

                      if ($formUser["state"] == 14) {
                        echo "<span
                          class=\"text-danger\">" . $formUser["remarkSixReport"] . "</span><br>
                        ";
                      }

                      if (isset($formUser["reportSixName"])) {
                        echo "<a href=" . "../docs/" . $formUser["reportSixName"] . " download>report6.pdf <svg
                            xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                            <path
                              d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                          </svg></a>";

                      }

                      if (isset($formUser["recritpFileName"])) {
                        echo "<br><a href=" . "../docs/" . $formUser["recritpFileName"] . " download>recritp.pdf <svg
                            xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                            <path
                              d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                          </svg></a>";
                      }

                      echo "</div>
                              <br>
                        ";

                      echo "
                        <form class=\"form-valide\" action=\"../controller/reportSix.php\" method=\"post\"
                        enctype=\"multipart/form-data\">
                        <div class=\"form-group\">
                        ";
                      if (!isset($formUser["reportSixName"]) or $formUser["state"] == 14) {
                        echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required />";
                      }
                      echo "<input type=\"hidden\" class=\"form-control\" name=\"formName\" id=\"formName\"
                        value=" . $formUser["formName"] . " />";
                      echo "</div>";
                      echo "<div class=\"float-right\" style=\"justify-content: end; align-items: end;\">";
                      if (!isset($formUser["reportSixName"]) or $formUser["state"] == 14) {
                        echo "<button type=\"submit\" class=\"btn btn-success \"
                        style=\"font-size:12px; color:white \">บันทึก</button>";
                      }

                      echo "</div>
                    </form>
                    </div>";

                      echo "<div class=\"card-footer\">";

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



                      if (isset($formUser["reportSixName"])) {
                        echo "ส่งเมื่อวันที่: " . $formUser["reportSixDate"];
                      } elseif ($currentDate > $finalDate) {
                        echo "<span style=\"color:#D40101;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                        echo "<span style=\"color:#D40101;\">เกินเวลาที่กำหนดส่ง {$daysDifference} วัน</span><br>";
                    } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo "<span style=\"color:#FFA41B;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                        echo "<span style=\"color:#FFA41B;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                    } else {
                        echo "<span style=\"color:#058F00;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                        echo "<span style=\"color:#058F00;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                    }
                      echo "</div>";

                      echo "


                      </div>
                    </div>

                    ";

                    }

                    if ($formUser["state"] >= 16 && $formUser["timeMonth"] >= 12 && $formUser["state"] < 31) {
                      if ($formUser["state"] < 100) {
                          echo "
                          <div class=\"col-md-4\">
                              <div class=\"card\">
                                  <div class=\"card-body\">
                                      <h4 class=\"card-title\">รายงานความก้าวหน้า 12 เดือน</h4>
                                      <div class=\"col-md-12\">";
                  
                          if ($formUser["state"] == 18) {
                              echo "<span class=\"text-danger\">{$formUser["remarkTwelveReport"]}</span><br>";
                          }
                  
                          if (isset($formUser["reportTwelveName"])) {
                              echo "<a href=\"../docs/{$formUser["reportTwelveName"]}\" download>report12.pdf
                                  <svg xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                                      <path d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                                  </svg>
                              </a>";
                          }
                  
                          echo "</div><br>";
                  
                          echo "
                              <form class=\"form-valide\" action=\"../controller/reportTwelve.php\" method=\"post\" enctype=\"multipart/form-data\">
                                  <div class=\"form-group\">";
                  
                          if (!isset($formUser["reportTwelveName"]) || $formUser["state"] == 18) {
                              echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required />";
                          }
                  
                          echo "<input type=\"hidden\" class=\"form-control\" name=\"formName\" id=\"formName\" value=\"{$formUser["formName"]}\" />";
                          echo "</div>";
                  
                          echo "<div class=\"float-right\" style=\"justify-content: end; align-items: end;\">";
                          if (!isset($formUser["reportTwelveName"]) || $formUser["state"] == 18) {
                              echo "<button type=\"submit\" class=\"btn btn-success\" style=\"font-size:12px; color:white\">บันทึก</button>";
                          }
                          echo "</div></form></div>";
                  
                          echo "<div class=\"card-footer\">";
                  
                          $time = strtotime($formUser["dateStartContract"]);
                          $final = date("Y-m-d", strtotime("+12 month", $time));
                  
                          $finalDate = new DateTime($final);
                          $currentDate = new DateTime();
                          $interval = $currentDate->diff($finalDate);
                          $monthsDifference = $interval->m + ($interval->y * 12);
                          $daysDifference = $interval->days;
                  
                          if (isset($formUser["reportTwelveName"])) {
                              echo "ส่งเมื่อวันที่: {$formUser["reportTwelveDate"]}";
                          } elseif ($currentDate > $finalDate) {
                            echo "<span style=\"color:#D40101;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#D40101;\">เกินเวลาที่กำหนดส่ง {$daysDifference} วัน</span><br>";
                        } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                            echo "<span style=\"color:#FFA41B;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#FFA41B;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                        } else {
                            echo "<span style=\"color:#058F00;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#058F00;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                        }
                  
                          echo "</div></div></div>";
                      }
                  }
                  


                    if (isset($formUser) && $formUser["state"] < 31) {
                      if ($formUser["state"] >= 19 && $formUser["timeMonth"] >= 18) {
                          if ($formUser["state"] != 100 || $formUser["state"] > 100) {
                              echo "
                              <div class=\"col-md-4\">
                                  <div class=\"card\">
                                      <div class=\"card-body\">
                                          <h4 class=\"card-title\">รายงานความก้าวหน้า 18 เดือน</h4>
                                          <div class=\"col-md-12\">
                              ";
                  
                              // แสดงข้อสังเกตถ้ามี
                              if (isset($formUser["state"]) && $formUser["state"] == 23 && isset($formUser["remarkEighteenReport"])) {
                                  echo "<span class=\"text-danger\">{$formUser["remarkEighteenReport"]}</span><br>";
                              }
                  
                              // แสดงลิงก์ดาวน์โหลดรายงาน ถ้ามี
                              if (isset($formUser["reportEighteenName"])) {
                                  echo "<a href=\"../docs/{$formUser["reportEighteenName"]}\" download>report18.pdf</a>";
                              }
                  
                              // ฟอร์มอัปโหลดไฟล์
                              echo "</div><br>
                              <form class=\"form-valide\" action=\"../controller/reportEighteen.php\" method=\"post\" enctype=\"multipart/form-data\">
                                  <div class=\"form-group\">";
                  
                              if (!isset($formUser["reportEighteenName"]) || $formUser["state"] == 23) {
                                  echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required />";
                              }
                  
                              echo "<input type=\"hidden\" name=\"formName\" value=\"{$formUser["formName"]}\" />";
                              echo "</div>
                                  <div class=\"float-right\">
                                      <button type=\"submit\" class=\"btn btn-success\" style=\"font-size:12px; color:white\">บันทึก</button>
                                  </div>
                              </form>
                              </div>";
                  
                              // Footer ของการ์ด
                              echo "<div class=\"card-footer\">";
                  
                              // คำนวณวันที่ส่ง
                              if (isset($formUser["dateStartContract"])) {
                                  $time = strtotime($formUser["dateStartContract"]);
                                  $finalDate = new DateTime(date("Y-m-d", strtotime("+18 month", $time)));
                                  $currentDate = new DateTime();
                  
                                  $interval = $currentDate->diff($finalDate);
                                  $daysDifference = $interval->days;
                  
                                  if (isset($formUser["reportEighteenName"])) {
                                      echo "ส่งเมื่อวันที่: {$formUser["reportTwelveDate"]}";
                          } elseif ($currentDate > $finalDate) {
                            echo "<span style=\"color:#D40101;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#D40101;\">เกินเวลาที่กำหนดส่ง {$daysDifference} วัน</span><br>";
                        } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                            echo "<span style=\"color:#FFA41B;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#FFA41B;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                        } else {
                            echo "<span style=\"color:#058F00;\">กำหนดส่งในวันที่: " . $finalDate->format("d-m-Y") . "</span><br>";
                            echo "<span style=\"color:#058F00;\">จะถึงกำหนดส่งในอีก {$daysDifference} วัน</span><br>";
                        }
                              }
                  
                              echo "</div></div></div>";
                          }
                      }
                  }



                  if ($formUser["state"] >= 11) {
                    echo "
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">รายงานฉบับสมบูรณ์</h4>
                          <div class=\"col-md-12\">
                    ";
                
                    if ($formUser["state"] == 32) {
                        echo "<span class=\"text-danger\">" . $formUser["remarkFinalReport"] . "</span><br>";
                    }
                
                    if (isset($formUser["reportFinalName"])) {
                        echo "<a href=\"../docs/" . $formUser["reportFinalName"] . "\" download>final_report.pdf
                        <svg xmlns=\"http://www.w3.org/2000/svg\" height=\"1em\" viewBox=\"0 0 512 512\">
                        <path d=\"M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z\" />
                        </svg></a>";
                    }
                
                    echo "</div><br>";
                
                    echo "
                    <form class=\"form-valide\" action=\"../controller/reportFinal.php\" method=\"post\" enctype=\"multipart/form-data\">
                      <div class=\"form-group\">
                    ";
                
                    if ((!isset($formUser["reportFinalName"]) || $formUser["state"] == 32 || $formUser["state"] != 100)) {
                      if ($formUser["state"] == 32) {
                          echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required />";
                      }
                  }
                  
                
                    echo "<input type=\"hidden\" class=\"form-control\" name=\"formName\" id=\"formName\" value=\"" . $formUser["formName"] . "\" />";
                    echo "</div>";
                
                    echo "<div class=\"float-right\" style=\"justify-content: end; align-items: end;\">";
                    if (!isset($formUser["reportFinalName"]) || $formUser["state"] == 32) {
                        echo "<button type=\"submit\" class=\"btn btn-success\" style=\"font-size:12px; color:white\">บันทึก</button>";
                    }
                
                    echo "</div>
                    </form>
                    </div>";
                
                    echo "<div class=\"card-footer\">";
                
                    // คำนวณวันที่กำหนดส่ง
                    $time = strtotime($formUser["dateStartContract"]);
                    $final = date("Y-m-d", strtotime("+24 month", $time));
                
                    // เปลี่ยนเป็น DateTime
                    $startDate = new DateTime($formUser["dateStartContract"]);
                    $endDate = new DateTime($final);
                    $finalDate = new DateTime($final);
                    $currentDate = new DateTime();  // สามารถทดสอบกับวันที่สมมุติได้
                
                    // คำนวณระยะเวลา
                    $interval = $currentDate->diff($finalDate);
                    $monthsDifference = $interval->m + ($interval->y * 12);
                    $daysDifference = $interval->days;
                
                    if (isset($formUser["reportFinalName"])) {
                        echo "ส่งเมื่อวันที่: " . $formUser["reportFinalnDate"];
                    } elseif ($currentDate > $finalDate) {
                        echo '<span style="color:#D40101;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>';
                        echo '<span style="color:#D40101;">เกินเวลาที่กำหนดส่ง ' . $daysDifference . " วัน" . '</span><br>';
                    } elseif ($currentDate <= $finalDate && $daysDifference <= 30) {
                        echo '<span style="color:#FFA41B;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>';
                        echo '<span style="color:#FFA41B;">จะถึงกำหนดส่งในอีก ' . $daysDifference . " วัน" . '</span><br>';
                    } elseif ($currentDate < $finalDate) {
                        echo '<span style="color:#058F00;">กำหนดส่งในวันที่: ' . date("d-m-Y", strtotime($final)) . '</span><br>';
                        echo '<span style="color:#058F00;">จะถึงกำหนดส่งในอีก ' . $daysDifference . " วัน" . '</span><br>';
                    }
                
                    echo "</div>";
                    echo "</div></div>";
                }


                    if ($formUser["state"] == 5 or $formUser["state"] == 9) {
                      echo "
                    <div class=\"col-md-4\">
                      <div class=\"card\">
                        <div class=\"card-body\">
                          <h4 class=\"card-title\">ข้อเสนอโครงการฉบับแก้ไข</h4>
                          <div class=\"col-md-12\">
                        ";
                      //echo '<span style="color: red;">' . $formUser["remark"] . '</span>';
                      //echo '<span style="color: red;">' . $formUser["editRemarkdean"] . '</span>';
                    


                      echo "</div>
                              <br>
                        ";

                      echo "
                        <form class=\"form-valide\" action=\"../controller/editProposal.php\" method=\"post\"
                        enctype=\"multipart/form-data\">
                        <div class=\"form-group\">
                        ";
                      if ($formUser["state"] == 5 or $formUser["state"] == 9) {
                        echo "<input type=\"file\" name=\"fileResearch\" accept=\"application/pdf\" required/>";

                        echo "";
                      }
                      echo "<input type=\"hidden\" class=\"form-control\" name=\"formName\" id=\"formName\"
                        value= " . $formUser["formName"] . " />";
                      echo "</div>";
                      echo "<div class=\"float-right\" style=\"justify-content: end; align-items: end;\">";
                      if ($formUser["state"] == 5 or $formUser["state"] == 9) {
                        echo "<button type=\"submit\" class=\"btn btn-success \"
                          style=\"font-size:12px; color:white \">บันทึก</button>";
                      }

                      echo "</div>
                    </form>
                    </div>";

                      echo "<div class=\"card-footer\">";




                      echo "</div>";

                      echo "


                      </div>
                    </div>

                    ";

                    }








                    ?>






                  </div>
                  <div class="table-responsive">
                    <table class="table header-border">
                      <thead>
                        <tr>
                          <th>วันที่</th>
                          <th>ชื่อ-นามสกุล</th>
                          <th>ตำแหน่ง</th>
                          <th>สถานะ</th>
                          <th>ความคิดเห็น</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $n = isset($formUser["count"]) ? $formUser["count"] : 0; // ตรวจสอบค่าว่างของ count
                        $lastDate = ""; // เก็บวันที่ล่าสุด
                        $waitingApproval = 0;
                        $disapproved = 0;
                        $approved = 0;
                        $commitbeark = 0;

                        for ($i = 1; $i < $n; $i++) {
                          echo "<tr>";
                          if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] != "คณะกรรมการ") {
                            echo "<td><span>" . (isset($formUser["statusDate" . $i]) ? $formUser["statusDate" . $i] : '') . "</span></td>";
                            echo "<td><span>" . (isset($formUser["statusName" . $i]) ? $formUser["statusName" . $i] : '') . "</span></td>";
                            echo "<td><span>" . (isset($formUser["statusRole" . $i]) ? $formUser["statusRole" . $i] : '') . "</span></td>";
                          }
                          

                          // กำหนดสีของสถานะ
                          $status = isset($formUser["status" . $i]) ? $formUser["status" . $i] : '';
                          if (
                            in_array($status, [
                              "เห็นชอบ",
                              "ยื่นคำขอทุนวิจัย",
                              "แก้ไขเอกสารเรียบร้อย",
                              "ผ่านการตรวจสอบ",
                              "คณะกรรมเห็นชอบ",
                              "อนุมัติ",
                              "ทำสัญญา",
                              "ส่งรายงานความคืบหน้า 6 เดือน",
                              "ส่งรายงานความคืบหน้า 12 เดือน"
                            ])
                          ) {
                            $color = "label gradient-1 rounded";
                            if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] == "คณะกรรมการ") {
                              $approved++;
                            }
                          } elseif (in_array($status, ["รอเห็นชอบ", "แก้ไข"]) || strpos($status, "รอแก้ไข") === 0) {
                            $color = "label gradient-3 rounded";
                            if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] == "คณะกรรมการ") {
                              $waitingApproval++;
                            }
                          } elseif (strpos($status, "ไม่") === 0) {
                            $color = "label gradient-2 rounded";
                            if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] == "คณะกรรมการ") {
                              $disapproved++;
                            }
                          }

                          // แสดงสถานะพร้อมสี
                          if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] != "คณะกรรมการ") {
                            echo "<td><span class=\"" . $color . "\">" . htmlspecialchars($status) . "</span></td>";
                          }

                          // แสดงความคิดเห็น
                          if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] != "คณะกรรมการ") {
                            echo "<td>";
                            if (strpos($status, "แก้ไขเอกสารเรียบร้อย") === 0) {
                              echo "<span></span>";
                            } elseif (
                              isset($formUser["remarkContract"]) &&
                              $formUser["statusRole" . $i] != "เจ้าหน้าที่" &&
                              $status == "ทำสัญญา"
                            ) {
                              echo "<span>" . htmlspecialchars($formUser["remarkContract"]) . "</span>";
                            } elseif (
                              !isset($formUser["remark" . $i]) &&
                              (strpos($status, "ไม่") === 0 || strpos($status, "แก้ไข") === 0)
                            ) {
                              echo "<span>" . htmlspecialchars(isset($formUser["remark" . ($i + 1)]) ? $formUser["remark" . ($i + 1)] : '') . "</span>";
                            } elseif (strpos($status, "ไม่") === 0 || strpos($status, "แก้ไข") === 0) {
                              echo "<span>" . htmlspecialchars(isset($formUser["remark" . $i]) ? $formUser["remark" . $i] : '') . "</span>";
                            } else {
                              echo "<span></span>";
                            }
                            echo "</td>";
                          }

                          echo "</tr>";

                          // เก็บวันที่ล่าสุดที่มีการเปลี่ยนแปลง
                          if (isset($formUser["statusDate" . $i]) && !empty($formUser["statusDate" . $i])) {
                            $lastDate = $formUser["statusDate" . $i];
                          }

                          // ส่วนการสรุปผล (คณะกรรมการ)
                          if (isset($formUser["statusRole" . $i]) && $formUser["statusRole" . $i] == "คณะกรรมการ") {
                            $commitbeark++;
                            if ($commitbeark == 7) {
                              echo "<tr>";
                              echo "<td><span>" . htmlspecialchars($lastDate) . "</span></td>";
                              echo "<td><span>สรุปผลการพิจารณาของคณะกรรมการ</span></td>";
                              echo "<td><span>คณะกรรมการ</span></td>";
                              echo "<td>";
                              if ($approved > 0) {
                                echo "<span class='label gradient-1 rounded'>เห็นชอบ " . $approved . " คน</span><br>";
                              }
                              if ($disapproved > 0) {
                                echo "<span class='label gradient-2 rounded'>ไม่เห็นชอบ " . $disapproved . " คน</span><br>";
                              }
                              if ($waitingApproval > 0) {
                                echo "<span class='label gradient-3 rounded'>รอเห็นชอบ " . $waitingApproval . " คน</span>";
                              }
                              echo "</td>";
                              echo "<td><span></span></td>";
                              echo "</tr>";
                            }
                          }
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>

                  <!-- เพิ่ม CSS เพื่อปรับการแสดงผล -->
                  <style>
                    .table td span {
                      padding: 5px 10px;
                      display: inline-block;
                      white-space: nowrap;
                    }

                    .table td {
                      vertical-align: middle;
                      word-break: break-word;
                    }

                    .table td span {
                      font-size: 14px;
                    }

                    .table td span {
                      word-wrap: break-word;
                      display: block;
                    }
                    

                    .label {
  padding: 5px 10px;
  border-radius: 12px;
  font-size: 14px;
  display: inline-flex; /* ใช้ inline-flex แทนการใช้ inline-block */
  justify-content: center; /* จัดตำแหน่งเนื้อหากลางแนวนอน */
  align-items: center; /* จัดตำแหน่งเนื้อหากลางแนวตั้ง */
  width: 100%; /* ให้แถบสถานะกว้างเต็มที่ */
  text-align: center; /* จัดข้อความตรงกลาง */
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


                  </tbody>
                  </table>
              </div>

              <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                  <button type="submit" class="btn btn-danger">ยกเลิก</button>
                </div>
              </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      <!--end card-->


      <!--start card
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="card-title">ยื่นคำขอทุนวิจัย <span>&nbsp;&nbsp;2023-10-11 17:08:57</span></p>
                <div class="form-validation">

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน</label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="ทุนวิจัย"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="วิจัยโรคข้าว"
                          disabled />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="name">ผู้ขอ</label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="name" name="name" value="รศ.ดร.ฐิติพงษ์ สถิรเมธีกุล"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" name="name" id="name" value="วิศวกรรมคอมพิวเตอร์"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ </label>
                      <div class="col-lg-7">
                        <input type="number" class="form-control" name="money" id="money" value="50000" disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-currency">ข้อเสนอโครงการวิจัย</label>
                      <div class="col-lg-7">
                        <a href="report.pdf"  download>ข้อเสนอโครงการวิจัย.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">ข้อเสนอโครงการวิจัย</h4>
                              <div class="col-md-12">
                                <a href="report.pdf"  download>รายงานความก้าวหน้า.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 8 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 12 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 18 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานฉบับสมบูรณ์</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive ">
                      <table class="table header-border">
                        <thead>
                          <tr>
                            <th>วันที่</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานะ</th>


                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>ผศ.ดร.วรัญญา อรรถเสนา</span></td>
                            <td><span>หัวหน้าภาควิชา</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>

                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>พี่ฟ้า</span></td>
                            <td><span>เจ้าหน้าที่</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>

                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 1</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 2</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 3</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 4</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 5</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 6</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 7</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 8</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 9</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>

                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>คณะกรรมการ 10</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>ชื่อ คณบดี</span></td>
                            <td><span>คณบดี</span></td>
                            <td><span class="label gradient-1 rounded">เห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span>2023-10-11</span></td>
                            <td><span>พี่ฟ้า</span></td>
                            <td><span>เจ้าหน้าที่</span></td>
                            <td><span class="label gradient-7 rounded">ทำสัญญา</span></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>


                </div>

              </div>
            </div>
          </div>-->
      <!--end card-->

      <!--start card
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="card-title">ยื่นคำขอทุนวิจัย <span>&nbsp;&nbsp;2023-10-10 17:08:57</span></p>
                <div class="form-validation">
                  <form class="form-valide" action="#" method="post">
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="ทุนวิจัย"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="วิจัยโรคแมลง"
                          disabled />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="name">ผู้ขอ</label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="name" name="name" value="รศ.ดร.ฐิติพงษ์ สถิรเมธีกุล"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions"></label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" name="name" id="name" value="วิศวกรรมคอมพิวเตอร์"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ </label>
                      <div class="col-lg-7">
                        <input type="number" class="form-control" name="money" id="money" value="20000" disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-currency">ข้อเสนอโครงการวิจัย</label>
                      <div class="col-lg-7">
                        <a href="report.pdf"  download>ข้อเสนอโครงการวิจัย.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">ข้อเสนอโครงการวิจัย</h4>
                              <div class="col-md-12">
                                <a href="report.pdf"  download>รายงานความก้าวหน้า.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 8 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 12 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 18 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานฉบับสมบูรณ์</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>
                    </div>


                    <div class="table-responsive ">
                    <table class="table header-border">
                        <thead>
                          <tr>
                            <th>วันที่</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานะ</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span></span></td>
                            <td><span>ผศ.ดร.วรัญญา อรรถเสนา</span></td>
                            <td><span>หัวหน้าภาควิชา</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>

                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 1</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 2</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 3</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 4</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 5</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 6</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 7</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 8</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 9</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 10</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>ชื่อ คณบดี</span></td>
                            <td><span>คณบดี</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-8 ml-auto">

                        <button type="submit" class="btn btn-success" style="color: aliceblue;">ส่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>-->
      <!--end card-->
      <!--start card
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <p class="card-title">ยื่นคำขอทุนวิจัย <span>&nbsp;&nbsp;2023-10-10 17:08:57</span></p>
                <div class="form-validation">
                  <form class="form-valide" action="#" method="post">
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="ทุนนวัตกรรม"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="Smart Office"
                          disabled />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="name">ผู้ขอ</label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="name" name="name" value="รศ.ดร.ฐิติพงษ์ สถิรเมธีกุล"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" name="name" id="name" value="วิศวกรรมคอมพิวเตอร์"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ </label>
                      <div class="col-lg-7">
                        <input type="number" class="form-control" name="money" id="money" value="20000" disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-currency">ข้อเสนอโครงการวิจัย</label>
                      <div class="col-lg-7">
                        <a href="report.pdf"  download>ข้อเสนอโครงการวิจัย.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">ข้อเสนอโครงการวิจัย</h4>
                              <div class="col-md-12">
                                <a href="report.pdf"  download>รายงานความก้าวหน้า.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 8 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 12 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานความก้าวหน้า 18 เดือน</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-body">
                              <h4 class="card-title">รายงานฉบับสมบูรณ์</h4>
                              <div class="col-md-12">
                                <br><a href="report1.pdf"  download>เอกสารแนบที่1.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                                <br><a href="report2.pdf"  download>เอกสารแนบที่2.pdf <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"> <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg></a>
                              </div>
                              <br><input type="file" name="report1" />
                          </div>
                          <div class="card-footer">2023-10-10 17:08:57</div>
                        </div>
                      </div>
                    </div>

                    <div class="table-responsive ">
                    <table class="table header-border">
                        <thead>
                          <tr>
                            <th>วันที่</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>ตำแหน่ง</th>
                            <th>สถานะ</th>

                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span></span></td>
                            <td><span>ผศ.ดร.วรัญญา อรรถเสนา</span></td>
                            <td><span>หัวหน้าภาควิชา</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>

                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 1</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 2</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 3</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 4</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 5</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 6</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 7</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 8</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 9</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>คณะกรรมการ 10</span></td>
                            <td><span>คณะกรรมการ</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>
                          <tr>
                            <td><span></span></td>
                            <td><span>ชื่อ คณบดี</span></td>
                            <td><span>คณบดี</span></td>
                            <td><span class="label gradient-3 rounded">รอเห็นชอบ</span></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-8 ml-auto">
                        <button type="submit" class="btn btn-success" style="color: aliceblue;">ส่ง</button>
                        <button type="submit" class="btn btn-danger">ยกเลิก</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>-->
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

<!-- Modal -->
<div class="modal fade" id="report" role="dialog">
  <div class="modal-dialog" style="width:80%">

    <!-- Modal content-->
    <from>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <h4 class="col-lg-6 col-form-label" for="val-currency">เลือกประเภทรายงาน<span class="text-danger">*</span>
            </h4>
            <div class="col-lg-8">
              <input type="radio" id="html" name="fav_language" value="รายงานความก้าวหน้า"><label
                for="html">&nbsp;รายงานความก้าวหน้า</label><br>
              <input type="radio" id="html" name="fav_language" value="รายงานความก้าวหน้า"><label
                for="html">&nbsp;รายงานความก้าวหน้า 6 เดือน</label>
              <br><input type="radio" id="html" name="fav_language" value="รายงานความก้าวหน้า"><label
                for="html">&nbsp;รายงานความก้าวหน้า 12 เดือน</label>
              <br><input type="radio" id="html" name="fav_language" value="รายงานความก้าวหน้า"><label
                for="html">&nbsp;รายงานปิดโครงการ</label>
            </div>
            <h4 class="col-lg-6 col-form-label" for="val-currency">เลือกไฟล์รายงานความคืบหน้า<span
                class="text-danger">*</span>
            </h4>
            <div class="col-lg-6">
              <input type="file" class="form-control" id="val-currency" name="val-currency">
            </div>
          </div>
          <div class="form-group">
            <h4 class="col-lg-6 col-form-label" for="val-currency">เลือกไฟล์เอกสารแนบ
            </h4>
            <div class="col-lg-6">
              <input type="file" class="form-control" id="val-currency" name="val-currency" multiple>
            </div>
          </div>

        </div>




        <div class="modal-footer">
          <a type="button" class="btn btn-success" style="color:aliceblue" data-dismiss="modal">ยืนยัน</a>
        </div>
      </div>
    </from>

  </div>
</div>