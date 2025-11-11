<?php
$host = "localhost"; // hoặc 127.0.0.1
$user = "root"; // user MySQL (mặc định là root)
$pass = ""; // mật khẩu MySQL (nếu có thì điền vào)
$dbname = "qlthuocankhang"; // tên database bạn đã tạo

// Tạo kết nối
$conn = new mysqli($host, $user, $pass, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đặt charset để hỗ trợ tiếng Việt
$conn->set_charset("utf8");
