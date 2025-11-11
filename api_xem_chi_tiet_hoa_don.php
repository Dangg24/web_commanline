<?php
require 'dp.php';

$id = $_GET['id'];

$sql = "SELECT hd.MaHD, hd.NgayLap, kh.HoTen AS TenKh, nv.HoTen AS TenNv, hd.TongTien
        FROM hoadon hd
        JOIN khachhang kh ON hd.MaKH = kh.MaKH
        JOIN nhanvien nv ON hd.MaNV = nv.MaNV
        WHERE hd.MaHD = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$hoadon = $result->fetch_assoc();

$sql2 = "SELECT ct.MaThuoc, t.TenThuoc, ct.SoLuong, ct.DonGia, ct.ThanhTien
         FROM chitiethoadon ct
         JOIN thuoc t ON ct.MaThuoc = t.MaThuoc
         WHERE ct.MaHD = ?";

$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("i", $id);
$stmt2->execute();
$res2 = $stmt2->get_result();

$chitiet = [];
while ($row = $res2->fetch_assoc()) {
    $chitiet[] = $row;
}

echo json_encode([
    "hoadon" => $hoadon,
    "chitiet" => $chitiet
]);
