<?php
if (isset($_POST['tableData'])) {
    $tableData = $_POST['tableData'];

    // Process the data
    foreach ($tableData as $row) {
        $count = $row['count'];
        $division_id = $row['division_id'];
        $division_name = $row['division_name'];
        $district_id = $row['district_id'];
        $district_name = $row['district_name'];

        // Example: Save to database or handle as needed
    }

    echo json_encode(["status" => array($tableData), "message" => "Data processed."]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received."]);
}
?>
