<?php
require 'dp.php'; // file kết nối CSDL

// Đọc dữ liệu JSON từ body request
$data = json_decode(file_get_contents('php://input'), true);

// Lấy giá trị, nếu không có thì để rỗng
$hoTen = $data['HoTen'] ?? '';
$gioiTinh = $data['GioiTinh'] ?? '';
$ngaySinh = $data['NgaySinh'] ?? null;
$dienThoai = $data['DienThoai'] ?? '';
$diaChi = $data['DiaChi'] ?? '';

$sql = "INSERT INTO khachhang (HoTen, GioiTinh, NgaySinh, DienThoai, DiaChi)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $hoTen, $gioiTinh, $ngaySinh, $dienThoai, $diaChi);

if ($stmt->execute()) {
    echo json_encode([
        "status" => "success",
        "MaKH" => $conn->insert_id
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();
