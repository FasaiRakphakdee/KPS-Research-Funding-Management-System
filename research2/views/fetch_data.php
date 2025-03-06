<?php
session_start();

// Get the selected year from the POST request
$selectedYear = $_POST['year'];

// Directory containing JSON files
$path = "../formResearch/";

// Initialize budget variables
$sumBudgetResearch = 0;
$sumBudgetInnovative = 0;
$sumBudgetAll = 0;

// Get the current year
$currentYear = date("Y");

// Iterate through each file in the directory
$files = glob($path . '*');
foreach ($files as $file) {
    // Read JSON data from file
    $jsonData = file_get_contents($file);
    $formData = json_decode($jsonData, true);

    // Extract year from the date in the form
    $date = strtotime($formData["date"]);
    $year = date("Y", $date);
    for ($i = $selectedYear-4;$i<=$selectedYear;$i++)
    {
        $sumBudget["Research".$i]=0;
        $sumBudget["Innovative".$i]=0;
    }
    $years=[];

    // Compare the year with the selected year
    if ($year <= $selectedYear && $year >= $selectedYear-4) {

        if (!in_array($year, $years)) {
           $years[]=$year;
        }
        // Update budget variables based on the form type
        if ($formData["type"] == "ทุนวิจัย") {
            $sumBudget["Research".$i] += intval($formData["budget"]);
        } elseif ($formData["type"] == "ทุนนวัตกรรม") {
            $sumBudget["Innovative".$i] += intval($formData["budget"]);
        }
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

// Send response data back to client-side
echo json_encode($responseData);
?>
