<?php
include_once "../../connect.php";
include_once "../../functions.php";
//  Chuẩn bị câu truy vấn $querySelect, lấy dữ liệu ban đầu của record cần update
if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$orders = editOrders($id);
if (isset($_POST['submit'])) { // isset dùng để xác định nếu biến đã được xác định và có bất kỳ giá trị nào khác null, isset sẽ trả về true
    $code = $_POST['code'];
    $tocalprice = $_POST['tocalprice'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $ispaid = $_POST['ispaid'];

    $errors = validateUpdateOrders($tocalprice, $phone);
    if (empty($errors)) {
        updateOrders($conn, $id, $code, $tocalprice, $phone, $address, $ispaid);
    } else {
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "</br>";
            }
        }
    }
}
?>
<?php include_once "../includes/header.php" ?>


<div class="container">
    <form action="" method="POST">
        <p class="fw-bold text-center fs-1"> Chỉnh sủa Order</p>

        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="<?php echo $orders['code']; ?>">
        </div>
        <div class="mb-3">
            <label for="tocalprice" class="form-label">Tocalprice</label>
            <input type="text" class="form-control" id="tocalprice" name="tocalprice" value="<?php echo $orders['tocalprice']; ?>">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $orders['phone']; ?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php echo $orders['address']; ?>">
        </div>
        <div class="mb-3">
            <label for="ispaid" class="form-label">Ispaid</label>
            <input type="text" class="form-control" id="ispaid" name="ispaid" value="<?php echo $orders['ispaid']; ?>">
        </div>
        <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
            Edit</button>
    </form>

</div>

<?php include_once "../includes/footer.php" ?>