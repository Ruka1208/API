<?php

@include 'config.php';
//Hàm session_start() được sử dụng để bắt đầu một session.
session_start();
//Hàm session_unset(): Nó chỉ xóa các biến từ session và session vẫn còn tồn tại. Dữ liệu chỉ là cắt ngắn đi.
session_unset();
/* Hàm session_destroy(): Sẽ phá hủy tất cả dữ liệu được liên kết với phiên hiện tại. Nó không unset bất kỳ
 biến toàn cục nào được liên kết với phiên hoặc unset session cookie. */
session_destroy();
header('location:login.php');

?>