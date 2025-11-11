<?php
require 'dp.php';

$data = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO chitiethoadon (MaHD, MaThuoc, SoLuong, DonGia) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("iiid", $data['MaHD'], $data['MaThuoc'], $data['SoLuong'], $data['DonGia']);

if ($stmt->execute()) {
    echo json_encode(["message" => "Thêm chi tiết hóa đơn thành công"]);
} else {
    echo json_encode(["error" => "Không thể thêm chi tiết hóa đơn"]);
}
