<?php
session_start();
// Hủy toàn bộ session
session_destroy();
// Chuyển hướng về trang đăng nhập 
header("Location: login.php");
exit();
?>
