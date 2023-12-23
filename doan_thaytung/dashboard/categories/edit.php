<?php
include_once "../../connect.php";
include_once "../../functions.php";

if (!isset($_GET['id'])) {
    header('location:index.php');
}
$id = $_GET['id'];
$catRow = editCategories($id);
    if (isset($_POST['submit'])) {// isset dùng để xác định nếu biến đã được xác định và có bất kỳ giá trị nào khác null, isset sẽ trả về true
        $name = $_POST['name'];
        $description = $_POST['description'];
        $errors = validateUpdateCategories($name, $description);
        if (empty($errors)) {
            updateCategories($conn, $id, $name, $description);
        } else {
            foreach ($errors as $errorField) {
                foreach ($errorField as $error) {
                    echo $error["msg"] . "</br>";
                }
            }
        }
    }

    ?>

<?php include_once "../includes/header.php"?>


    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang edit danh muc san pham.</p>
                <div class="mb-3">
                    <form action="" method="POST">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nhap ten cua danh muc san pham" value="<?php echo $catRow['name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?php echo $catRow['description']; ?></textarea> </div>
                <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                    Edit</button>
                </form>

            </div>
        </div>
    </div>
  
<?php include_once "../includes/footer.php"?>
