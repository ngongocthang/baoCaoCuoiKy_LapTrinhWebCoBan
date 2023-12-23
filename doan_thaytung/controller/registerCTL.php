<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_register'])) {
    // Kiểm tra xem khóa "name" có tồn tại trong mảng $_POST hay không
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Kiểm tra xem email đã tồn tại hay chưa
    if (isEmailRegistered($email)) {
        echo "Email đã được đăng ký trước đó. Vui lòng chọn một email khác.";
    } else {
        // Gọi hàm register để thêm người dùng mới vào cơ sở dữ liệu
        if (register($name, $email, $password)) { 
            header("location: login.php");
            exit();
        } else {
            // Đăng ký thất bại
            echo "Đăng ký không thành công!";
        }
    }
}

// Hàm kiểm tra xem email đã được đăng ký hay chưa
function isEmailRegistered($email) {
    global $conn;

    // Sanitize email để ngăn chặn SQL injection
    $safe_email = mysqli_real_escape_string($conn, $email);

    // Truy vấn để kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay không
    $query = "SELECT COUNT(*) as count FROM users WHERE email = '$safe_email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['count'] > 0; // Trả về true nếu email đã tồn tại, ngược lại false
    } else {
        // Xử lý lỗi truy vấn theo cách cần thiết
        die("Lỗi: " . mysqli_error($conn));
    }
}
?>

