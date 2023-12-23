<?php
// $root=$_SERVER['DOCUMENT_ROOT']."/doan_thaytung";
// include_once $root."/connect.php";
// include_once $root."/functions.php";
include "../../connect.php";
include "../../functions.php";
if (!isset($_GET['id'])) {
    header('location:index.php');
}
// tạo biến id để chứa các id dc gọi
$id = $_GET['id'];
$products=editProducts($id);
    if (isset($_POST['submit'])) {// isset dùng để xác định nếu biến đã được xác định và có bất kỳ giá trị nào khác null, isset sẽ trả về true
        // $image = $_POST['image'];
        $name = $_POST['name'];
        $categories = $_POST['categories'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $view = $_POST['view'];
        $errors=validateUpdateProducts($name, $description);
        if (empty($errors)) {
            updateProducts($conn, $id, $name, $categories,$description,$price,$view);
        } else {
            foreach ($errors as $errorField) {
                foreach ($errorField as $error) {
                    echo $error["msg"] . "</br>";
                }
            }
        }
    }
    //include_once $root."/dashboard/includes/header.php"
    include "../includes/header.php";
?>
<div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang sua danh muc san pham.</p>
                <div class="mb-3">
                    <form action="" method="POST">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nhap ten cua danh muc san pham" value="<?php echo $products['name']; ?>">
                </div>


                

                <div class="mb-3">
                    <label for="categories" class="form-label">Chi tiết</label>
                    <textarea class="form-control" id="categories" name="categories" rows="5" ><?php echo $products['categories']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?php echo $products['description']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $products['price']; ?>">

                </div>
                <div class="mb-3">
                    <label for="view" class="form-label">Lượt mua</label>
                    <input type="text" class="form-control" id="view" name="view" value="<?php echo $products['view']; ?>">

                </div>
                <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                    Edit</button>
                </form>

            </div>
        </div>
    </div>
    
 <?php //include_once $root."/dashboard/includes/footer.php"
  include "../includes/footer.php";
 ?>
