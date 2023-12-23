<?php
// $root=$_SERVER['DOCUMENT_ROOT']."/doan_thaytung";
// include_once $root."/connect.php";
// include_once $root."/functions.php";
include_once "../../connect.php";
include_once "../../functions.php";
showAllProducts();

// include_once $root."/dashboard/includes/header.php"
 include_once "../includes/header.php"
 ?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <p class="fw-bold text-center fs-1">Trang danh muc san pham.</p>
            <a href="./created.php" class="btn btn-primary d-inline"><i data-lucide="plus-square"></i> Thêm</a>
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Chi tiết sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Đơn giá</th>
                        <th>Lượt mua</th>
                        <th>Ngày tạo</th>
                        <th>###</th>
                    </tr>
                <tbody>
                    <?php foreach ($products as $pro) { ?>
                        <tr>
                            <td><?php echo $pro['index'] ?></td>
                            <td><?php echo $pro['id'] ?></td>
                            <td><img src="<?php echo $pro['image']; ?>" style="max-width: 100px; max-height: 100px;"></td>
                            <td><?php echo $pro['name'] ?></td>
                            <td><?php echo $pro['categories'] ?></td>
                            <td><?php echo $pro['description'] ?></td>
                            <td><?php echo $pro['price'] ?></td>
                            <td><?php echo $pro['view'] ?></td>
                            <td><?php echo $pro['created_at'] ?></td>
                            <td>
                                <a href="./edit.php ?id=<?php echo $pro['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                <a href="./delete.php ?id=<?php echo $pro['id'] ?>" class="btn btn-danger"><i data-lucide="trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                </thead>
            </table>
            <a href="../views_admin/index.php" class="btn btn-primary d-inline"><i data-lucide="undo-dot"></i> Back</a>

        </div>
    </div>
</div>
<?php //include_once $root."/dashboard/includes/footer.php"
 include_once "../includes/footer.php"
 ?>