<?php
include('config.php');

$table_name = 'record';
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);

if (!$result->num_rows > 0) {
    echo "No records found.";
} else {
    header('Content-Type: application/json');
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    $sql = "SELECT id FROM $table_name ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    $data = [
        "lastId" => $result->fetch_array()["id"],
        "record" => $rows
    ];

    echo json_encode($data, JSON_NUMERIC_CHECK);
}

$conn->close();