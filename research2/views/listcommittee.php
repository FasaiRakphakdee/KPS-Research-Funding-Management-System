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
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="card-title">รายชื่อคณะกรรมการ</h4>
                </div>
                <div class="col-sm-6">
                  <a href="./addcommittee.php" type="button" class="btn mb-1 btn-info float-right">เพิ่มคณะกรรมการ</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>ชื่อ-นามสกุล</th>
                      <th>ภาควิชา</th>
                      <th>email</th>
                      <th>รายละเอียด</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $files = glob("../committee/*");
                        //echo print_r($files);

                        $committees;
                        $count =0;
                        foreach($files as $file){
                          //echo $file;

                          $jsonString = file_get_contents($file);

                          $committee = json_decode($jsonString, true);
                          $key = $committee["key"];
                          //echo $key;
                          $committees["name".$count] = $committee[$key]["fullName"];
                          $committees["rolecommittee".$count] =  $committee[$key]["role"];
                          $committees["emailcommittee".$count] = $committee[$key]["email"];

                          echo "<tr>";
                          echo "<td>" . $committees["name".$count] . "</td>";
                          echo "<td>" . $committees["rolecommittee".$count] . "</td>";
                          echo "<td>" . $committees["emailcommittee".$count] . "</td>";
                          echo "<td style=\"text-align:center\"><a href=\"./editcommittee.php?keyName=" .$key . "\" type=\"submit\" class=\"btn btn-info\"
                                    style=\"color: aliceblue;\"><svg style=\"color:white\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                                    <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
                                    <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z\"/>
                                  </svg></a>

                                  <a href=\"../controller/deleteCommittee.php?keyName=" .$key . "\" type=\"button\" class=\"btn mb-1 btn-danger\"><svg style=\"color:white\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash3-fill\" viewBox=\"0 0 16 16\">
                                    <path d=\"M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5\"/>
                                  </svg>
                                  </a>

                                </td>";

                          echo "</tr>";

                          $count++;

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
