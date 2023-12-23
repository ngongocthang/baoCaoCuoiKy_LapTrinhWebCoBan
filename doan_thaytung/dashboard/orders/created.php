<?php
include_once "../../connect.php";
include_once "../../functions.php";
// kiểm tra 
if (isset($_POST['submit'])) {
    echo "post from client";
    $code=$_POST['code'];
    $tocalprice=$_POST['tocalprice'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $ispaid=$_POST['ispaid'];
    createOrders($code, $tocalprice, $phone, $address, $ispaid);
       
    }
?>


<?php include_once "../includes/header.php"?>

    <div class="container">
        <form action="" method="POST">
        <p class="fw-bold text-center fs-1"> Thêm Order</p>

            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" id="code" name="code">
            </div>
            <div class="mb-3">
                <label for="tocalprice" class="form-label">Tocalprice</label>
                <input type="text" class="form-control" id="tocalprice" name="tocalprice">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
                <label for="ispaid" class="form-label">Ispaid</label>
                <input type="text" class="form-control" id="ispaid" name="ispaid">
            </div>
            <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                Thêm</button>
        </form>

    </div>

    <?php include_once "../includes/footer.php"?>
