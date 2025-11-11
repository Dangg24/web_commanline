<?php
require 'dp.php';

$sql = "SELECT * FROM thuoc";
$result = $conn->query($sql);

$thuoc = [];
while ($row = $result->fetch_assoc()) {
    $thuoc[] = $row;
}
echo json_encode($thuoc);
