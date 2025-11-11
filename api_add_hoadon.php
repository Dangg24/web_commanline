<?php
require 'dp.php';

$data = json_decode(file_get_contents("php://input"), true);

$maKH = $data["MaKH"] ?? null;
$maNV = $data["MaNV"] ?? null;
$tongTien = $data["TongTien"] ?? 0;

$sql = "INSERT INTO hoadon (NgayLap, MaKH, MaNV, TongTien)
        VALUES (NOW(), ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iid", $maKH, $maNV, $tongTien);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "MaHD" => $conn->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
