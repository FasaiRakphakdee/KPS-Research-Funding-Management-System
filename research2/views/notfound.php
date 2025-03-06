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
<?php include('./layout.html'); ?>


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
                            <p class="card-title">ไม่มีคำขอ <span>&nbsp;&nbsp;
                            </p>

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
                        <h4 class="col-lg-6 col-form-label" for="val-currency">เลือกประเภทรายงาน<span
                                class="text-danger">*</span>
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