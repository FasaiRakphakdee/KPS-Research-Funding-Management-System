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

  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body">


    <!-- row -->

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">ประวัติคำขอทุนวิจัยทั้งหมด</h4>
              <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th style="text-align:center">ประเภททุนวิจัย</th>
                      <th>ชื่อโครงการ</th>
                      <th>ผู้ขอ</th>
                      <th style="text-align:right">งบประมาณ</th>
                      <th>สถานะ</th>
                      <th style="text-align:center">รายละเอียด</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $userId = "userId";
                    $path = "../formResearch/";
                    $department = "วิศวกรรมคอมพิวเตอร์";

                    $files = glob($path . '*');

                    foreach ($files as $file) {
                      $jsonString = file_get_contents($file);

                      $form = json_decode($jsonString, true);
                      $tableStyleCenter = "text-align:center";
                      $tableStyleRight = "text-align:right";
                      if ($form["statusSend"] == "send" && $form["state"] >= 0) {
                        echo "<tr>";
                        echo "<td style=$tableStyleCenter>" . $form["type"] . "</td>";
                        echo "<td>" . $form["nameResearch"] . "</td>";
                        echo "<td>" . $form["name"] . "</td>";
                        //echo "<td style=$tableStyleRight>" . $form["budget"] ."</td>";
                        echo "<td style='$tableStyleRight'>" . number_format($form["budget"], 0, '.', ',') . "</td>";
                        echo "<td>" . $form["statusAll"] . "</td>";
                        if ($form["state"] == 8 && $_SESSION["access-user"] == "staff") {
                          echo "<td style=\"text-align:center\"><a href=\"./detailagreement.php?formName=" . $form["formName"] . "\" type=\"submit\" class=\"btn btn-primary\"
                      style=\"color: aliceblue;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"
                        fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
                        <path
                          d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\" />
                      </svg></a></td>";
                        } 
                        elseif($_SESSION["staff"] == 1){

                          echo "<td style=\"text-align:center\"><a href=\"./detailStaff.php?formName=" . $form["formName"] . "\" type=\"submit\" class=\"btn btn-primary\"
                      style=\"color: aliceblue;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"
                        fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
                        <path
                          d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\" />
                      </svg></a></td>";
                        }
                        elseif($_SESSION["committee"] == 1){
                          echo "<td style=\"text-align:center\"><a href=\"./detailcommittee.php?formName=" . $form["formName"] . "\" type=\"submit\" class=\"btn btn-primary\"
                          style=\"color: aliceblue;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"
                            fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
                            <path
                              d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\" />
                          </svg></a></td>";
                        }
                        elseif($_SESSION["dean"] == 1){
                          echo "<td style=\"text-align:center\"><a href=\"./detaildean.php?formName=" . $form["formName"] . "\" type=\"submit\" class=\"btn btn-primary\"
                          style=\"color: aliceblue;\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\"
                            fill=\"currentColor\" class=\"bi bi-search\" viewBox=\"0 0 16 16\">
                            <path
                              d=\"M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z\" />
                          </svg></a></td>";
                        }

                        echo "</tr>";

                      }


                    }

                    ?>


                  </tbody>

                </table>
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

  <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
  <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
  <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

</body>

</html>