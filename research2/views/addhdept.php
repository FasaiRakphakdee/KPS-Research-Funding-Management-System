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
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">เพิ่มรายชื่อหัวหน้าภาควิชา</h5>

              <div class="form-validation">
                <form class="form-valide" action="../controller/createHeadDept.php" method="POST"
                  enctype="multipart/form-data">
                  <input type="hidden" name="key" value="<?php echo $keyName?>"/>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-username">ชื่อ-นามสกุล
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="name" />
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">ภาควิชา
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="role"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">Username KU
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="key"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="val-email">email
                    </label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" id="val-email" name="email"/>
                    </div>
                  </div>

                  <div class="form-group row">
                  <div class="col-lg-8 ml-auto">
                    <button type="submit" class="btn btn-success" name = "status" value ="บันทึก">บันทึก</button>
                    <a href="./listhdept.php" type="submit" class="btn btn-light" style="color: black;">กลับ</a>
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
