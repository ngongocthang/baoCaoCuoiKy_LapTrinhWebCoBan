<?php

// categories
// show categories
function showAllCategories()
{
    global $conn;
    // b2 chuan bi cau truy van $query
    $query = "SELECT * FROM categories";
    // b3 thực thi câu lệnh sql để lấy dữu liệu
    $result = mysqli_query($conn, $query);
    // b4 khi thực thi các câu lệnh dạng select , dữ liệu lấy về cần phải phân tách để use
    // thông thường chúng ta use dụng vòng lặp while để duyệt danh sách các dòng dữ liệu dc select
    // ta sẽ use 1 mảng array để chứa các dữ liệu được trả về 
    $categories = [];
    if ($result && $result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $categories[] = array(
                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "description" => $row['description'],
                "created_at" => $row['created_at'],
                "updated_at" => $row['updated_at'],


            );
        }
    }
    return $categories;
}
$categories = showAllCategories();
// create categories
function createCategories($name, $description)
{
    global $conn;
    $errors = validateCreateCategories($name, $description);

    if (!empty($errors)) {
        // hiển thị thống báo lỗi
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "<br>";
            }
        }
        return;
    }
    // Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
    // Câu lệnh INSERT

    $queryInsert = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";

    if (mysqli_query($conn, $queryInsert)) {
        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:index.php');
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
    }
}
function validateCreateCategories($name, $description)
{
    //  Kiểm tra ràng buộc dữ liệu (Validation)
    // Tạo biến lỗi để chứa thông báo lỗi
    $errors = [];
    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Vui lòng nhập tên danh mục sản phẩm'
        ];
    }

    // minlength 5 (tối thiểu 5 ký tự)
    if (!empty($name) && strlen($name) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên phải ít nhất 5 ký tự'
        ];
    }
    // maxlength  30 (tối đa 30 ký tự)
    if (!empty($name) && strlen($name) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên nhiều nhất 30 ký tự'
        ];
    }
    // minlength 5 (tối thiểu 5 ký tự)
    if (!empty($description) && strlen($description) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả ít nhất 5 ký tự'
        ];
    }
    // maxlength 30 (tối đa 30 ký tự)
    if (!empty($description) && strlen($description) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả nhiều nhất 30 ký tự'
        ];
    }

    // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
    // var_dump($errors);
    if (!empty($errors)) {
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "</br>";
            }
        }
        return $errors;
    }
}
// edit categories
function editCategories($id)
{
    global $conn;
    $queryGet = " SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $categoriesRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($categoriesRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $categoriesRow;
}
function validateUpdateCategories($name, $description)
{
    $errors = [];
    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => '$name',
            'msg' => 'Vui lòng nhập danh mục sản phẩm'
        ];
    }
    // maxlength 30
    if (!empty($name) && strlen($name) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên nhiều nhất 30 ký tự'
        ];
    }
    // minlength 5
    if (!empty($description) && strlen($description) < 5) {
        $errors['description'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả ít nhất 5 ký tự'
        ];
    }



    return $errors;
}
function updateCategories($conn, $id, $name, $description)
{
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $queryUpdate = "UPDATE categories SET name = '$name', description = '$description' WHERE id='$id'";
    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}
// delete Categories
function deleteCategories($id)
{
    global $conn;
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM categories WHERE id='$id';";
    // Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);
    //  Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}





// users
// show users 
function showAllUsers()
{
    global $conn; // dùng globa để truy cập đến một biến toàn cục
    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);
    $users = [];
    if ($result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $users[] = array(

                "index" => $rowNum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "email" => $row['email'],
                "password" => $row['password'],
                "created_at" => $row['created_at'],
            );
        }
    }
    return $users;
}
$users = showAllUsers();
// create Users
function createUsers($name, $email, $password)
{
    global $conn;
    $errors = validateCreateUsers($name, $password);

    if (!empty($errors)) {
        // hiển thị thống báo lỗi
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "<br>";
            }
        }
        return;
    }

    // Nếu không có lỗi thì tiến hành thực hiện chèn dữ liệu
    $queryInsert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if (mysqli_query($conn, $queryInsert)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
    }
}
function validateCreateUsers($name, $password)
{
    $errors = [];

    // Validate 'name'
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Vui lòng con bố mày'
        ];
    }

    // Validate 'password'
    if (strlen($password) < 5) {
        $errors['password'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $password,
            'msg' => 'Mật khẩu ít nhất 5 ký tự'
        ];
    }
    if (strlen($password) > 30) {
        $errors['password'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $password,
            'msg' => 'Mật khẩu nhiều nhất 30 ký tự'
        ];
    }
    return $errors;
}
// editUsers
function editUsers($id)
{
    global $conn;
    $queryGet = " SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $usersRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($usersRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $usersRow;
}
function validateUpdateUsers($name, $email)
{
    $errors = [];

    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Vui lòng nhập tên '
        ];

        if (!empty($name) && strlen($name) > 30) {
            $errors['name'][] = [
                'rule' => 'maxlength',
                'rule_value' => true,
                'value' => $name,
                'msg' => 'Tên nhiều nhất 30 ký tự'
            ];
        }
        // min lenght 30
        if (!empty($email) && strlen($email) < 5) {
            $errors['email'][] = [
                'rule' => 'minlength',
                'rule_value' => true,
                'value' => $email,
                'msg' => 'Email ít nhất 5 ký tự'
            ];
        }
        // max lenght 30
        if (!empty($email) && strlen($email) > 30) {
            $errors['email'][] = [
                'rule' => 'maxlength',
                'rule_value' => true,
                'value' => $email,
                'msg' => 'Email nhiều nhất 30 ký tự'
            ];
        }

        return $errors;
    }
    function updateUsers($conn, $id, $name, $email, $password)
    {
        $name = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);
        $queryUpdate = "UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id='$id'";
        if (mysqli_query($conn, $queryUpdate)) {
            mysqli_close($conn);
            header('location:index.php');
        } else {
            echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
        }
    }
}
// delete Users
function deleteUsers($id)
{
    global $conn;
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM users WHERE id='$id';";

    // Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);

    //  Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}




// products
// show product
function showAllProducts()
{
    global $conn;
    $query = "SELECT * FROM products";
    //b3 thực hiện câu lệnh sql để lấy dữ liệu
    $result = mysqli_query($conn, $query);
    $products = [];
    // explode() ngắt một chuỗi thành mảng 
    $domian_name = explode('/', $_SERVER['REQUEST_URI'])[1]; //ngắt chuỗi source để lấy dữ liệu đường dẫn
    // var_dump($domian_name);
    if ($result->num_rows > 0) {
        $rownum = 1;
        while ($row = $result->fetch_assoc()) {
            $products[] = array(
                "index" => $rownum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "categories" => $row['categories'],
                "description" => $row['description'],
                "price" => $row['price'],
                "image" => '/' . $domian_name . $row['image'],
                "view" => $row['view'],
                "created_at" => $row['created_at']
            );
        }
    }
    return $products;
}
$products = showAllProducts();

// show products hot
function showProductsHot()
{
    global $conn;
    $query = "SELECT * FROM products ORDER BY view DESC LIMIT 8";
    $result = mysqli_query($conn, $query);
    $products_hot = [];
    $domian_name = explode('/', $_SERVER['REQUEST_URI'])[1];

    if ($result->num_rows > 0) {
        $rownum = 1;
        while ($row = $result->fetch_assoc()) {
            $products_hot[] = array(
                "index" => $rownum++,
                "id" => $row['id'],
                "name" => $row['name'],
                "categories" => $row['categories'],
                "description" => $row['description'],
                "price" => $row['price'],
                "image" => '/' . $domian_name . $row['image'],
                "view" => $row['view'],
                "created_at" => $row['created_at']
            );
        }
    }
    return $products_hot;
}
$products_hot = showProductsHot();
// create products
function createProducts($name, $categories, $description, $price, $image, $view)
{
    global $conn;
    $errors = validateCreateProducts($name, $categories, $description);

    if (!empty($errors)) {
        // hiển thị thống báo lỗi
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "<br>";
            }
        }
        return;
    }
    //  Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
    // Câu lệnh INSERT

    $queryInsert = "INSERT INTO products (name, categories,description,price,image,view) VALUES('$name','$categories','$description','$price','$image','$view')";

    if (mysqli_query($conn, $queryInsert)) {
        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('Location:index.php');
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
    }
}
function validateCreateProducts($name, $categories, $description)
{
    // Tạo biến lỗi để chứa thông báo lỗi
    $errors = [];
    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Vui lòng nhập tên danh mục sản phẩm'
        ];
    }

    // minlength 5 (tối thiểu 5 ký tự)
    if (!empty($name) && strlen($name) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên phải ít nhất 5 ký tự'
        ];
    }
    // maxlength  30 (tối đa 30 ký tự)
    if (!empty($name) && strlen($name) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên nhiều nhất 30 ký tự'
        ];
    }
    // minlength 5 (tối thiểu 5 ký tự)
    if (!empty($description) && strlen($description) < 5) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả ít nhất 5 ký tự'
        ];
    }
    // maxlength 30 (tối đa 30 ký tự)
    if (!empty($description) && strlen($description) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả nhiều nhất 30 ký tự'
        ];
    }
    // maxlenght 500 
    if (!empty($categories) && strlen($categories) > 500) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $categories,
            'msg' => 'Chi tiết sản phẩm nhiều nhất 500 ký tự'
        ];
    }

    // Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
    if (!empty($errors)) {
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "</br>";
            }
        }
        return  $errors;
    }
}
// edit products
function editProducts($id)
{
    global $conn;
    $queryGet = " SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $productsRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($productsRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $productsRow;
}
function validateUpdateProducts($name, $description)
{
    $errors = [];
    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($name)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'rule' => '$name',
            'msg' => 'Vui lòng nhập tên sản phẩm'
        ];
    }
    // maxlength 30
    if (!empty($name) && strlen($name) > 30) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $name,
            'msg' => 'Tên nhiều nhất 30 ký tự'
        ];
    }
    // minlength 5
    if (!empty($description) && strlen($description) < 5) {
        $errors['description'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $description,
            'msg' => 'Mô tả ít nhất 5 ký tự'
        ];
    }
    return $errors;
}

// get products
function getProduct($id)
{
    global $conn;
    $queryGet = " SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $product = $result->fetch_assoc();
    return $product;
}
// update products
function updateProducts($conn, $id, $name, $categories, $description, $price, $view)
{
    $name = mysqli_real_escape_string($conn, $name);
    $description = mysqli_real_escape_string($conn, $description);
    $queryUpdate = "UPDATE products SET name = '$name',categories = '$categories', description = '$description',price = '$price',view = '$view' WHERE id='$id'";
    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}
// delete Products
function deleteProducts($id)
{
    global $conn;
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM products WHERE id='$id';";
    // Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);
    //  Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}

// upload image product
function uploadImage()
{
    $target_dir = __DIR__ . "/storage/";
    // echo $target_dir;
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return "/storage/" . basename($_FILES["fileToUpload"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}






// Order
//show order
function showAllOrders()
{
    global $conn;
    $query = "SELECT * FROM orders";
    $result = mysqli_query($conn, $query);

    $order = [];
    if ($result && $result->num_rows > 0) {
        $rowNum = 1;
        while ($row = $result->fetch_assoc()) {
            $order[] = array(

                "index" => $rowNum++,
                "id" => $row['id'],
                "code" => $row['code'],
                "tocalprice" => $row['tocalprice'],
                "phone" => $row['phone'],
                "address" => $row['address'],
                "ispaid" => $row['ispaid'],
                "created_at" => $row['created_at'],

            );
        }
    }
    return $order;
}
$order = showAllOrders();
//create Orders
function createOrders($code, $tocalprice, $phone, $address, $ispaid)
{
    global $conn;
    $errors = validateCreateOrders($code, $tocalprice, $phone, $address, $ispaid);

    if (!empty($errors)) {
        // hiển thị thống báo lỗi
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "<br>";
            }
        }
        return;
    }
    // Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
    // Câu lệnh INSERT

    $queryInsert = "INSERT INTO orders (code, tocalprice,phone,address,ispaid) VALUES ('$code', '$tocalprice','$phone','$address','$ispaid')";

    if (mysqli_query($conn, $queryInsert)) {
        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:index.php');
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
    }
}
function validateCreateOrders($code, $tocalprice, $phone, $address, $ispaid)
{
    // Tạo biến lỗi để chứa thông báo lỗi
    $errors = [];
    // --- Kiểm tra Tên của danh mục sản phẩm (validate)
    // required (bắt buộc nhập <=> không được rỗng)
    if (empty($phone)) {
        $errors['name'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $phone,
            'msg' => 'Vui lòng nhập số điện thoại'
        ];
    }
    //  minlenght phone 
    if (!empty($phone) && strlen($phone) < 10) {
        $errors['name'][] = [
            'rule' => 'minlength',
            'rule_value' => true,
            'value' => $phone,
            'msg' => 'Số điện thoại nhập thiếu'
        ];
    }
    // maxlength phone 10 (tối đa 10 ký tự)
    if (!empty($phone) && strlen($phone) > 10) {
        $errors['name'][] = [
            'rule' => 'maxlength',
            'rule_value' => true,
            'value' => $phone,
            'msg' => 'Số điện thoại nhiều nhất 10 ký tự'
        ];
    }
    // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
    // var_dump($errors);
    if (!empty($errors)) {
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "</br>";
            }
        }
        return $errors;
    }
}
// editOrders
function editOrders($id)
{
    global $conn;
    $queryGet = " SELECT * FROM orders WHERE id=$id";
    $result = mysqli_query($conn, $queryGet);
    $ordersRow = $result->fetch_assoc();
    // Nếu không tìm thấy dữ liệu -> thông báo lỗi
    if (empty($ordersRow)) { // empty dùng để xác định một biến có rổng hay ko
        echo "giá trị id: $id không tồn tại. Vui lòng kiểm tra laị ";
        // điều hướng về trang index.php
        header("Location:index.php");
    }
    return $ordersRow;
}
function validateUpdateOrders($tocalprice, $phone)
{
    $errors = [];
    if (empty($tocalprice)) {
        $errors['tocalprice'][] = [
            'rule' => 'required',
            'rule_value' => true,
            'value' => $tocalprice,
            'msg' => 'Vui lòng nhập tổng giá'
        ];
    }


    if (!empty($phone) && strlen($phone) !== 10) {
        $errors['phone'][] = [
            'rule' => 'length',
            'rule_value' => true,
            'value' => $phone,
            'msg' => 'Số điện thoại phải bằng 10 chữ số'
        ];
    }

    return $errors;
}
function updateOrders($conn, $id, $code, $tocalprice, $phone, $address, $ispaid)
{
    $code = mysqli_real_escape_string($conn, $code);
    $tocalprice = mysqli_real_escape_string($conn, $tocalprice);
    $phone = mysqli_real_escape_string($conn, $phone);
    $address = mysqli_real_escape_string($conn, $address);
    $ispaid = mysqli_real_escape_string($conn, $ispaid);
    $queryUpdate = "UPDATE orders SET code = '$code', tocalprice = '$tocalprice' , phone = '$phone', address = '$address', ispaid = '$ispaid' WHERE id='$id'";
    if (mysqli_query($conn, $queryUpdate)) {
        mysqli_close($conn);
        header('location:index.php');
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}
// delete Orders
function deleteOrders($id)
{
    global $conn;
    $id = $_GET['id'];
    $queryDelete = "DELETE FROM orders WHERE id='$id';";
    // Thực thi câu lệnh DELETE
    $result = mysqli_query($conn, $queryDelete);
    //  Đóng kết nối
    mysqli_close($conn);

    // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    header('location:index.php');
}




// check register
function register($name, $email, $password)
{
    global $conn;

    // Sử dụng prepared statement để ngăn chặn SQL injection
    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Biding tham số và thực hiện truy vấn
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        $result = mysqli_stmt_execute($stmt);

        // Đóng statement
        mysqli_stmt_close($stmt);

        return $result;
    } else {
        echo "Lỗi prepare statement: " . mysqli_error($conn);
        return false;
    }
}
function checkLogin($email, $password)
{
    global $conn;
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = $result->fetch_assoc();

    if (empty($user)) {
        echo "Tài khoản sai, không tồn tại!";
    } else {
        // Lưu thông tin người dùng vào session
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name']; 
        header("Location: index.php");
        exit();
    }
}

