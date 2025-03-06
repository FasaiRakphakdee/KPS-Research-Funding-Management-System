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

    <?php include('./header/techer_layout.html'); ?>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">

      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">แก้ไขยื่นคำขอทุนวิจัย</h5>
                <div class="form-validation">
                  <form class="form-valide" action="#" method="post">
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-username">ประเภททุน <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <select class="form-control" id="val-skill" name="val-skill" value="ทุนวิจัย" disabled>
                          <option value="1">ทุนวิจัย</option>
                          <option value="2">ทุนนวัตกรรม</option>

                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-email">ชื่อโครงการวิจัย <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="val-email" name="val-email" value="วิจัยโรคพืช"
                        disabled/>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="name">ผู้ขอ<span class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" id="name" name="name" value="รศ.ดร.ฐิติพงษ์ สถิรเมธีกุล"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">หน่วยงาน <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <input type="text" class="form-control" name="name" id="name" value="วิศวกรรมคอมพิวเตอร์"
                          disabled />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-suggestions">งบประมาณ(บาท) <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <input type="number" class="form-control" name="money" id="money" value="20000"  disabled/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-4 col-form-label" for="val-currency">upload File <span
                          class="text-danger">*</span>
                      </label>
                      <div class="col-lg-7">
                        <input type="file" class="form-control" id="val-currency" name="val-currency"
                          value="แถบเมนู ข้อมูลพื้นฐาน.pdf" >
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-8 ml-auto">
                        <a href="./historyRequest.php" type="submit" class="btn btn-danger">ยกเลิก</a>
                        <a href="./historyRequest.php" type="submit" class="btn btn-primary">บันทึก</a>
                        <button type="submit" class="btn btn-success">ส่ง</button>
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
