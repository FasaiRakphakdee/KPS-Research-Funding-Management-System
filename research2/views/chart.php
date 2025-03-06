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


  <!--**********************************
            Content body start
        ***********************************-->
  <div class="content-body" style="width:100%;max-width:100%">
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-10" style="display: block; justify-content: center; align-items: center;">
          <div class="card">
            <div class="card-body">
            <form action="chartsearch.php" method="post">
  <div class="form-group row">
    <label class="col-lg-4 col-form-label" for="val-skill">ปีที่สืบค้น<span class="text-danger">*</span></label>
    <div class="col-lg-3">
      <select class="form-control" id="year" name="year" required>
        <option value="ทั้งหมด">ทั้งหมด</option> <!-- เพิ่มคำว่า "ทั้งหมด" -->
        <?php
        $currentYear = date("Y");
        for ($i = $currentYear; $i > $currentYear - 10; $i--) {
        ?>
          <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="col-lg-3">
      <button type="submit" class="btn mb-1 btn-primary">ค้นหา</button>
    </div>
  </div>
</form>


              <html>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
              <h4 class="card-title">กราฟแสดงผลการเปรียบเทียบจำนวนเงินที่มีการขอทุนวิจัยต่อปีของทุนแต่ละประเภท(ทั้งหมด)</h4>
              <html>
              <div class="col-sm-6" style="width:100%;max-width:100%">
                <canvas id="learnyear"></canvas>
              </div>
            </div>
            <div class="card-body">
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
              <h4 class="card-title">กราฟแสดงผลการเปรียบเทียบจำนวนเงินที่มีการขอทุนวิจัยต่อปีของแต่ละภาควิชา(ทั้งหมด)</h4>
              <html>
              <div class="col-sm-6" style="width:100%;max-width:100%">

                <canvas id="facu"></canvas>
              </div>
            </div>


            
            <div class="card-body">

<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<h4 class="card-title">กราฟจำนวนทุนที่มีการขอทุนวิจัยต่อภาควิชาของทุนแต่ละประเภท(ทั้งหมด)
</h4>
<html>
<div class="col-sm-6" style="width:100%;max-width:100%">

  <canvas id="learnyear6"></canvas>
</div>


</div>
            <div class="card-body">

              <html>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
              <h4 class="card-title">กราฟจำนวนทุนที่มีการขอทุนวิจัยต่อภาควิชาแต่ละสถานะของทุนอุดหนุนวิจัย(ทั้งหมด)</h4>
              <html>
              <div class="col-sm-6" style="width:100%;max-width:100%">

                <canvas id="learnyear3"></canvas>
              </div>


            </div>
            <div class="card-body">

              <html>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
              <h4 class="card-title">กราฟจำนวนทุนที่มีการขอทุนวิจัยต่อภาควิชาแต่ละสถานะของทุนวิจัยนวัตกรรม(ทั้งหมด)</h4>
              <html>
              <div class="col-sm-6" style="width:100%;max-width:100%">

                <canvas id="learnyear4"></canvas>
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

  <?php

$selectedYear = date("Y");
  $path = "../formResearch/";

  // Initialize budget variables
  $sumBudgetResearch = 0;
  $sumBudgetInnovative = 0;
  $sumBudgetAll = 0;

  // Initialize an empty array to store years
  $years = [];

  // Initialize an empty array to store budget data for each year
  $sumBudget = [];

  // Initialize budget variables for each year
  for ($i = $selectedYear - 4; $i <= $selectedYear; $i++) {
    $sumBudget["Research" . $i] = 0;
    $sumBudget["Innovative" . $i] = 0;
    $years[] = $i;
  }

  // Iterate through each file in the directory
  $files = glob($path . '*');
  foreach ($files as $file) {
    // Read JSON data from file
    $jsonData = file_get_contents($file);
    $formData = json_decode($jsonData, true);

    // Extract year from the date in the form
    $date = strtotime($formData["date"]);
    $year = date("Y", $date);

    // Check if year is in the selected range and status is "ทำสัญญา"
    if ($year <= $selectedYear && $year >= $selectedYear - 4 && $formData["count"] >= 14) {
      // Update budget variables based on the form type
      if ($formData["type"] == "ทุนวิจัย") {
        $sumBudget["Research" . $year] += $formData["budget"];
      } elseif ($formData["type"] == "ทุนนวัตกรรม") {
        $sumBudget["Innovative" . $year] += $formData["budget"];
      }

      // Update total budget
      $sumBudgetAll += intval($formData["budget"]);
    }
  }

  // Prepare response data as JSON
  $responseData = array(
    'researchBudget' => $sumBudgetResearch,
    'innovativeBudget' => $sumBudgetInnovative,
    'totalBudget' => $sumBudgetAll,
    'years' => $years,
    'sumBudget' => $sumBudget,
    'selectedYear' => $selectedYear
  );

  // Output the JSON-encoded response data
  echo json_encode($responseData);

  // Prepare data for chart
  $researchs = [];
  $innovatives = [];

  for ($i = $selectedYear - 4; $i <= $selectedYear; $i++) {
    $researchs[] = $sumBudget["Research" . $i];
    $innovatives[] = $sumBudget["Innovative" . $i];
  }
  ?>

  <script>
    var researchs = <?php echo json_encode($researchs); ?>;
    var innovatives = <?php echo json_encode($innovatives); ?>;
    var years = <?php echo json_encode($years); ?>;

    var ctx = document.getElementById("learnyear");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: years,
        datasets: [{
            label: 'ทุนวิจัย',
            data: researchs,
            borderColor: "#5dae8b", // สีของเส้น
          borderWidth: 2, // ความหนาของเส้น
          pointBackgroundColor: "#5dae8b", // สีจุด
          fill: false, // ไม่ลงสีพื้นที่ใต้กราฟ
          tension: 0 // ทำให้เส้นเป็นเส้นตรง
          },
          {
            label: 'ทุนนวัตกรรม',
            data: innovatives,
            borderColor: "#ff7676", // สีของเส้น
          borderWidth: 2, // ความหนาของเส้น
          pointBackgroundColor: "#ff7676", // สีจุด
          fill: false, // ไม่ลงสีพื้นที่ใต้กราฟ
          tension: 0 // ทำให้เส้นเป็นเส้นตรง
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            stacked: true
          },
          y: {
            max: 100,
            stacked: true
          }
        }

      }
    });
  </script>
  
<?php
// Get the selected year from the POST request
$selectedYear = date("Y");
// Directory containing JSON files
$path = "../formResearch/";
$sumBudget;
// Initialize budget variables
$sumBudgetResearch = 0;
$sumBudgetInnovative = 0;
$sumBudgetAll = 0;

// Get the current year
$currentYear = date("Y");

// Iterate through each file in the directory
$codes = ['K0802', 'K0803', 'K0804', 'K0807', 'K0814', 'K0816', 'K0817', 'K0818', 'K0819', 'K0844', 'K0845'];
$DepartNames = ['เกษตร', 'ชลประทาน', 'การอาหาร', 'โยธา', 'เครื่องกล', 'คอมพิวเตอร์', 'อุตสาหการ', 'ศูนย์ปฏิบัติการวิศวกรรมพลังงานและสิ่งแวดล้อม', 'ศูนย์เครื่องจักรกลการเกษตรแห่งชาติ', 'สำนักงานเลขานุการคณะวิศวกรรมศาสตร์ กำแพงแสน', 'ศูนย์ทดสอบประตู หน้าต่างและ ระบบผนังกระจกสำหรับอาคาร'];
$files = glob($path . '*');

for ($j = 0; $j < 11; $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];

  $sumBudget[$code . 'Name'] = $name;
  $sumBudget[$code . 'Research'] = 0;
  $sumBudget[$code . 'Innovative'] = 0;
}







foreach ($files as $file) {
  // Read JSON data from file
  $jsonData = file_get_contents($file);
  $formData = json_decode($jsonData, true);
  $years = [];
  // Extract year from the date in the form
  $date = strtotime($formData["date"]);
  $year = date("Y", $date);


  // Compare the year with the selected year
  if ($year <= $selectedYear && $year >= $selectedYear - 4 && $formData["count"] >= 14) {
    $code = $formData['departmentCode'];
    // Update budget variables based on the form type
    if ($formData["type"] == "ทุนวิจัย") {
      $sumBudget[$code . "Research"] += intval($formData["budget"]);
    } elseif ($formData["type"] == "ทุนนวัตกรรม") {
      $sumBudget[$code . "Innovative"] += intval($formData["budget"]);
    }
    $sumBudgetAll += intval($formData["budget"]);
  }
}

// Prepare response data as JSON
$responseData = array(
  'researchBudget' => $sumBudgetResearch,
  'innovativeBudget' => $sumBudgetInnovative,
  'totalBudget' => $sumBudgetAll,
  'codes' => $codes,
  'sumBudget' => $sumBudget,
  'selectedYear' => $selectedYear
);

// Send response data back to client-side
json_encode($responseData);


for ($j = 0; $j < 11; $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];
  $researchDepts[] = $sumBudget[$code . "Research"];
  $innovativeDepts[] = $sumBudget[$code . "Innovative"];
}


?>
<script>
  var researchDepts = <?php echo json_encode($researchDepts) ?>;
  var innovativeDepts = <?php echo json_encode($innovativeDepts) ?>;
  var DepartNames = <?php echo json_encode($DepartNames) ?>;

  var ctx = document.getElementById("facu");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: DepartNames.map(name => name.length > 10 ? name.substring(0, 12) + "..." : name),
      datasets: [{
          label: 'ทุนอุดหนุนวิจัย',
          data: researchDepts,
          backgroundColor: "rgba(93, 174, 139, 0.5)",
          borderColor: "#5dae8b",
          fill: false,  // ไม่เติมสีในพื้นที่ใต้เส้น
          borderWidth: 2,
          tension: 0  // ทำให้เส้นเป็นเส้นตรง
        },
        {
          label: 'ทุนนวัฒกรรม',
          data: innovativeDepts,
          backgroundColor: "rgba(255, 118, 118, 0.5)",
          borderColor: "#ff7676",
          fill: false,
          borderWidth: 2,
          tension: 0  // ทำให้เส้นเป็นเส้นตรง
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          title: {
            display: true,
            text: 'Departments',
            font: {
              size: 14,
              weight: 'bold'
            }
          }
        },
        y: {
          title: {
            display: true,
            text: 'Funding Amount (in %)',
            font: {
              size: 14,
              weight: 'bold'
            }
          },
          max: 100,
          beginAtZero: true
        }
      },
      plugins: {
        legend: {
          display: true,
          labels: {
            font: {
              size: 12
            }
          }
        }
      }
    }
  });
</script>

    <?php


// Get the selected year from the POST request
$selectedYear = date("Y");
// Directory containing JSON files
$path = "../formResearch/";
//
$sumResearch;
// Initialize budget variables

//
$sumResearchResearch = 0;
$sumResearchInnovative = 0;
$sumResearchAll = 0;
// Get the current year
$currentYear = date("Y");

// Iterate through each file in the directory
$codes = ['K0802', 'K0803', 'K0804', 'K0807', 'K0814', 'K0816', 'K0817', 'K0818', 'K0819', 'K0844', 'K0845'];
$DepartNames = ['เกษตร', 'ชลประทาน', 'การอาหาร', 'โยธา', 'เครื่องกล', 'คอมพิวเตอร์', 'อุตสาหการ', 'ศูนย์ปฏิบัติการวิศวกรรมพลังงานและสิ่งแวดล้อม', 'ศูนย์เครื่องจักรกลการเกษตรแห่งชาติ', 'สำนักงานเลขานุการคณะวิศวกรรมศาสตร์ กำแพงแสน', 'ศูนย์ทดสอบประตู หน้าต่างและ ระบบผนังกระจกสำหรับอาคาร'];
$files = glob($path . '*');

for ($j = 0; $j < count($codes); $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];

  $sumResearch[$code . 'Name'] = $name;


  $sumResearch[$code . 'Research'] = 0;
  $sumResearch[$code . 'Innovative'] = 0;
}

foreach ($files as $file) {
  // Read JSON data from file
  $jsonData = file_get_contents($file);
  $formData = json_decode($jsonData, true);
  $years = [];
  // Extract year from the date in the form
  $date = strtotime($formData["date"]);
  $year = date("Y", $date);


  // Compare the year with the selected year
  if ($year <= $selectedYear) {
    $code = $formData['departmentCode'];
    // Update budget variables based on the form type
  
    if ($formData["type"] == "ทุนวิจัย") {
      $sumResearch[$code . "Research"] += intval(1);
    } elseif ($formData["type"] == "ทุนนวัตกรรม") {
      $sumResearch[$code . "Innovative"] += intval(1);
    }
    $sumResearchAll += intval(1);
  }
}

// Prepare response data as JSON
$responseData = array(
  'codes' => $codes,

  'sumResearch' => $sumResearch,
  'researchsumResearch' => $sumResearchResearch,
  'innovativesumResearch' => $sumResearchInnovative,
  'totalsumResearch' => $sumResearchAll,
  'selectedYear' => $selectedYear
);

// Send response data back to client-side
json_encode($responseData);


for ($j = 0; $j < 11; $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];


  $research[] = $sumResearch[$code . "Research"];
  $innovative[] = $sumResearch[$code . "Innovative"];
}


?>
<script>
  var research = <?php echo json_encode($research) ?>;
  var innovative = <?php echo json_encode($innovative) ?>;
  var DepartNames = <?php echo json_encode($DepartNames) ?>;

  var ctx = document.getElementById("learnyear6");
  var myChart = new Chart(ctx, {
    type: 'bar',  // ยังคงเป็น 'line'
    data: {
      labels: DepartNames.map(name => name.length > 10 ? name.substring(0, 12) + "..." : name),
      datasets: [
        {
          label: 'ทุนอุดหนุนวิจัย',
          data: research,
          backgroundColor: "rgba(93, 174, 139, 0.5)",
          borderColor: "#5dae8b",
          fill: false,  // ไม่เติมสีในพื้นที่ใต้เส้น
          borderWidth: 2,
          tension: 0  // ทำให้เส้นเป็นเส้นตรง
        },
        {
          label: 'ทุนนวัฒกรรม',
          data: innovative,
          backgroundColor: "rgba(255, 118, 118, 0.5)",
          borderColor: "#ff7676",
          fill: false,
          borderWidth: 2,
          tension: 0  // ทำให้เส้นเป็นเส้นตรง
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          max: 100,
          beginAtZero: true
        }
      }
    }
  });
</script>
    <?php

  // Get the selected year from the POST request
  $selectedYear = date("Y");

  // Directory containing JSON files
  $path = "../formResearch/";

  // Initialize budget variables
  $sumStatusRe;

// Get the current year
$currentYear = date("Y");

  // Iterate through each file in the directory
  $codes = ['K0802', 'K0803', 'K0804', 'K0807', 'K0814', 'K0816', 'K0817', 'K0818', 'K0819', 'K0844', 'K0845'];
  $DepartNames = ['เกษตร', 'ชลประทาน', 'การอาหาร', 'โยธา', 'เครื่องกล', 'คอมพิวเตอร์', 'อุตสาหการ', 'ศูนย์ปฏิบัติการวิศวกรรมพลังงานและสิ่งแวดล้อม', 'ศูนย์เครื่องจักรกลการเกษตรแห่งชาติ', 'สำนักงานเลขานุการคณะวิศวกรรมศาสตร์ กำแพงแสน', 'ศูนย์ทดสอบประตู หน้าต่างและ ระบบผนังกระจกสำหรับอาคาร'];
  $files = glob($path . '*');

  for ($j = 0; $j < 11; $j++) {
    $code = $codes[$j];
    $name = $DepartNames[$j];

    $sumStatusRe[$code . 'Headept'] = 0;
    $sumStatusRe[$code . 'staff'] = 0;
    $sumStatusRe[$code . 'committee'] = 0;
    $sumStatusRe[$code . 'dean'] = 0;
    $sumStatusRe[$code . 'edit'] = 0;
    $sumStatusRe[$code . 'wait'] = 0;
    $sumStatusRe[$code . 'contract'] = 0;
  }
  
  foreach ($files as $file) {
  // Read JSON data from file
  $jsonData = file_get_contents($file);
  $formData = json_decode($jsonData, true);
  $years = [];
  // Extract year from the date in the form
  $date = strtotime($formData["date"]);

  $year = date("Y", $date);

    // Compare the year with the selected year
    if ($year  <= $selectedYear) {
      $code = $formData['departmentCode'];
      // Update budget variables based on the form type

      if ($formData["type"] == "ทุนวิจัย") { 
        if ($formData["statusAll"] == "รอหัวหน้าภาควิชาเห็นชอบ"){
          $sumStatusRe[$code . "Headept"] += 1;
        }
        elseif ($formData["statusAll"] == "รอเจ้าหน้าที่ตรวจสอบ") {
          $sumStatusRe[$code . "staff"] += 1;
        }
        elseif ($formData["statusAll"] == "รอคณะกรรมการทั้งหมดเห็นชอบ") {
          $sumStatusRe[$code . "committee"] += 1;
        }
        elseif ($formData["statusAll"] == "รอคณบดีอนุมัติ") {
          $sumStatusRe[$code . "dean"] += 1;
        }
        elseif ($formData["statusAll"] == "แก้ไขข้อเสนอโครงการวิจัย") {
          $sumStatusRe[$code . "edit"] += 1;
        }
        elseif ($formData["statusAll"] == "รอทำสัญญา") {
          $sumStatusRe[$code . "wait"] += 1;
        }
        elseif ($formData["statusAll"] == "ทำสัญญา" || $formData["count"] >= 14) {
          $sumStatusRe[$code . "contract"] += 1;
        }
      } 
    }
  }

  // Prepare response data as JSON
  $responseData = array(
    'codes' => $codes,
    'sumStatusRe' => $sumStatusRe,
    'selectedYear' => $selectedYear
  );

  // Send response data back to client-side
  json_encode($responseData);


  for ($j = 0; $j < 11; $j++) {
    $code = $codes[$j];
    $name = $DepartNames[$j];
    $researchDepts[] = $sumBudget[$code . "Research"];
    $innovativeDepts[] = $sumBudget[$code . "Innovative"];

    $HeadeptRe[] = $sumStatusRe[$code . "Headept"];
    $staffRe[] = $sumStatusRe[$code . "staff"];
    $committeeRe[] = $sumStatusRe[$code . "committee"];
    $deanRe[] = $sumStatusRe[$code . "dean"];
    $editRe[] = $sumStatusRe[$code . "edit"];
    $waitRe[] = $sumStatusRe[$code . "wait"];
    $contractRe[] = $sumStatusRe[$code . "contract"];
  }


  ?>
  <script>
    var DepartNames = <?php echo json_encode($DepartNames) ?>;

    var StatusHeadeptRe = <?php echo json_encode($HeadeptRe) ?>;
    var StatusStaffRe = <?php echo json_encode($staffRe) ?>;
    var StatusCommitteeRe = <?php echo json_encode($committeeRe) ?>;
    var StatusDeanRe = <?php echo json_encode($deanRe) ?>;
    var StatusEditRe = <?php echo json_encode($editRe) ?>;
    var StatusWaitRe = <?php echo json_encode($waitRe) ?>;
    var StatusContractRe = <?php echo json_encode($contractRe) ?>;

    var ctx = document.getElementById("learnyear3");
    var myChart = new Chart(ctx, {
      //type: 'bar',
      //type: 'line',
      type: 'bar',
      data: {
        labels:  DepartNames.map(name => name.length > 10 ? name.substring(0, 12) + "..." : name), // ตัดชื่อให้สั้นลงหากยาวเกิน
        datasets: [
                    {
                        label: 'รอหัวหน้าภาควิชาเห็นชอบ',
                        data: StatusHeadeptRe, // ข้อมูลรอหัวหน้าภาควิชาเห็นชอบ
                        backgroundColor: "#5dae8b",
                        borderWidth: 0
                    },
                    {
                        label: 'รอเจ้าหน้าที่ตรวจสอบ',
                        data: StatusStaffRe, // ข้อมูลรอเจ้าหน้าที่ตรวจสอบ
                        backgroundColor: "#ff7676",
                        borderWidth: 0
                    },
                    {
                        label: 'รอคณะกรรมการทั้งหมดเห็นชอบ',
                        data: StatusCommitteeRe, // ข้อมูลรอคณะกรรมการทั้งหมดเห็นชอบ
                        backgroundColor: "#76a5ff",
                        borderWidth: 0
                    },
                    {
                        label: 'รอคณบดีอนุมัติ',
                        data: StatusDeanRe, // ข้อมูลรอคณบดีอนุมัติ
                        backgroundColor: "#ff76ff",
                        borderWidth: 0
                    },
                    {
                        label: 'แก้ไขข้อเสนอโครงการวิจัย',
                        data: StatusEditRe, // ข้อมูลแก้ไขข้อเสนอโครงการวิจัย
                        backgroundColor: "#FFF676",
                        borderWidth: 0
                    },
                    {
                        label: 'รอทำสัญญา',
                        data: StatusWaitRe, // ข้อมูลรอทำสัญญา
                        backgroundColor: "#B176FF",
                        borderWidth: 0
                    },
                    {
                        label: 'ทำสัญญาแล้ว',
                        data: StatusContractRe, // ข้อมูลรอทำสัญญา
                        backgroundColor: "#76ffaa",
                        borderWidth: 0
                    }
                ]
      },
      options: {
    responsive: true,
    scales: {
      x: {
        stacked: true,
        ticks: {
          maxRotation: 0, // ป้องกันการหมุนของข้อความ
          minRotation: 0, // ป้องกันการหมุนของข้อความ
          autoSkip: false, // ไม่ข้ามการแสดงชื่อบนแกน x
          font: {
            size: 10 // ปรับขนาดฟอนต์ให้เล็กลง
          }
        }
      },
      y: {
        max: 100,
        stacked: true
      }
        }

      }
    });
  </script>
  <?php


// Get the selected year from the POST request
$selectedYear = date("Y");

// Directory containing JSON files
$path = "../formResearch/";

// Initialize budget variables
$sumStatusRe;

// Get the current year
$currentYear = date("Y");

// Iterate through each file in the directory
$codes = ['K0802', 'K0803', 'K0804', 'K0807', 'K0814', 'K0816', 'K0817', 'K0818', 'K0819', 'K0844', 'K0845'];
$DepartNames = ['เกษตร', 'ชลประทาน', 'การอาหาร', 'โยธา', 'เครื่องกล', 'คอมพิวเตอร์', 'อุตสาหการ', 'ศูนย์ปฏิบัติการวิศวกรรมพลังงานและสิ่งแวดล้อม', 'ศูนย์เครื่องจักรกลการเกษตรแห่งชาติ', 'สำนักงานเลขานุการคณะวิศวกรรมศาสตร์ กำแพงแสน', 'ศูนย์ทดสอบประตู หน้าต่างและ ระบบผนังกระจกสำหรับอาคาร'];
$files = glob($path . '*');

for ($j = 0; $j < 11; $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];

  $sumStatusIn[$code . "Headept"] = 0;
  $sumStatusIn[$code . "staff"] = 0;
  $sumStatusIn[$code . "committee"] = 0;
  $sumStatusIn[$code . "dean"] = 0;
  $sumStatusIn[$code . "edit"] = 0;
  $sumStatusIn[$code . "wait"] = 0;
  $sumStatusIn[$code . "contract"] = 0;
}







foreach ($files as $file) {
  // Read JSON data from file
  $jsonData = file_get_contents($file);
  $formData = json_decode($jsonData, true);
  $years = [];
  // Extract year from the date in the form
  $date = strtotime($formData["date"]);
  $year = date("Y", $date);


  // Compare the year with the selected year
  if ($year <= $selectedYear) {
    
    $code = $formData['departmentCode'];

    if ($formData["type"] == "ทุนนวัตกรรม") {
        if ($formData["statusAll"] == "รอหัวหน้าภาควิชาเห็นชอบ"){
          $sumStatusIn[$code . "Headept"] += 1;
        }
        elseif ($formData["statusAll"] == "รอเจ้าหน้าที่ตรวจสอบ") {
          $sumStatusIn[$code . "staff"] += 1;
        }
        elseif ($formData["statusAll"] == "รอคณะกรรมการทั้งหมดเห็นชอบ") {
          $sumStatusIn[$code . "committee"] += 1;
        }
        elseif ($formData["statusAll"] == "รอคณบดีอนุมัติ") {
          $sumStatusIn[$code . "dean"] += 1;
        }
        elseif ($formData["statusAll"] == "แก้ไขข้อเสนอโครงการวิจัย") {
          $sumStatusIn[$code . "edit"] += 1;
        }
        elseif ($formData["statusAll"] == "รอทำสัญญา") {
          $sumStatusIn[$code . "wait"] += 1;
        }
        elseif ($formData["statusAll"] == "ทำสัญญา" || $formData["count"] >= 14) {
          $sumStatusIn[$code . "contract"] += 1;
        }
    }
  }
}

// Prepare response data as JSON
$responseData = array(
  'codes' => $codes,
  'sumStatusIn' => $sumStatusIn,
  'selectedYear' => $selectedYear
);

// Send response data back to client-side
json_encode($responseData);


for ($j = 0; $j < 10; $j++) {
  $code = $codes[$j];
  $name = $DepartNames[$j];

  $HeadeptIn[] = $sumStatusIn[$code . "Headept"];
  $staffIn[] = $sumStatusIn[$code . "staff"];
  $committeeIn[] = $sumStatusIn[$code . "committee"];
  $deanIn[] = $sumStatusIn[$code . "dean"];
  $editIn[] = $sumStatusIn[$code . "edit"];
  $waitIn[] = $sumStatusIn[$code . "wait"];
  $contractIn[] = $sumStatusIn[$code . "contract"];
}


?>
<script>
  var DepartNames = <?php echo json_encode($DepartNames) ?>;

    var StatusHeadeptIn = <?php echo json_encode($HeadeptIn) ?>;
    var StatusStaffIn = <?php echo json_encode($staffIn) ?>;
    var StatusCommitteeIn = <?php echo json_encode($committeeIn) ?>;
    var StatusDeanIn = <?php echo json_encode($deanIn) ?>;
    var StatusEditIn = <?php echo json_encode($editIn) ?>;
    var StatusWaitIn = <?php echo json_encode($waitIn) ?>;
    var StatusContractIn = <?php echo json_encode($contractIn) ?>;

  var ctx = document.getElementById("learnyear4");
  var myChart = new Chart(ctx, {
    //type: 'bar',
    //type: 'line',
    type: 'bar',
    data: {
      labels: DepartNames.map(name => name.length > 10 ? name.substring(0, 12) + "..." : name),
      datasets: [
                    {
                        label: 'รอหัวหน้าภาควิชาเห็นชอบ',
                        data: StatusHeadeptIn, // ข้อมูลรอหัวหน้าภาควิชาเห็นชอบ
                        backgroundColor: "#5dae8b",
                        borderWidth: 0
                    },
                    {
                        label: 'รอเจ้าหน้าที่ตรวจสอบ',
                        data: StatusStaffIn, // ข้อมูลรอเจ้าหน้าที่ตรวจสอบ
                        backgroundColor: "#ff7676",
                        borderWidth: 0
                    },
                    {
                        label: 'รอคณะกรรมการทั้งหมดเห็นชอบ',
                        data: StatusCommitteeIn, // ข้อมูลรอคณะกรรมการทั้งหมดเห็นชอบ
                        backgroundColor: "#76a5ff",
                        borderWidth: 0
                    },
                    {
                        label: 'รอคณบดีอนุมัติ',
                        data: StatusDeanIn, // ข้อมูลรอคณบดีอนุมัติ
                        backgroundColor: "#ff76ff",
                        borderWidth: 0
                    },
                    {
                        label: 'แก้ไขข้อเสนอโครงการวิจัย',
                        data: StatusEditIn, // ข้อมูลแก้ไขข้อเสนอโครงการวิจัย
                        backgroundColor: "#FFF676",
                        borderWidth: 0
                    },
                    {
                        label: 'รอทำสัญญา',
                        data: StatusWaitIn, // ข้อมูลรอทำสัญญา
                        backgroundColor: "#B176FF",
                        borderWidth: 0
                    },
                    {
                        label: 'ทำสัญญาแล้ว',
                        data: StatusContractIn, // ข้อมูลรอทำสัญญา
                        backgroundColor: "#76ffaa",
                        borderWidth: 0
                    }
                ]
    },
    options: {
    responsive: true,
    scales: {
      x: {
        stacked: true,
        ticks: {
          maxRotation: 0, // ป้องกันการหมุนของข้อความ
          minRotation: 0, // ป้องกันการหมุนของข้อความ
          autoSkip: false, // ไม่ข้ามการแสดงชื่อบนแกน x
          font: {
            size: 10 // ปรับขนาดฟอนต์ให้เล็กลง
          }
        }
      },
      y: {
        max: 100,
        stacked: true
      }
      }

    }
  });
  </script>
</body>

</html>