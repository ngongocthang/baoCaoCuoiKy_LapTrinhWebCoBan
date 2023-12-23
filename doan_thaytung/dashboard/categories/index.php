<?php
include_once "../../connect.php";
include_once "../../functions.php";
showAllCategories();

include_once "../includes/header.php";
?>
     <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang chi tiet san pham.</p>
                    <a href="./created.php" class="btn btn-primary d-inline"><i data-lucide="plus-square"></i> Thêm</a>
               
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Mô tả</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>###</th>
                        </tr>
                    <tbody>
                        <?php foreach($categories as $cat){ ?>
                        <tr>
                            <td><?php echo $cat['index']?></td>
                            <td><?php echo $cat['id']?></td>
                            <td><?php echo $cat['name']?></td>
                            <td><?php echo $cat['description']?></td>
                            <td><?php echo $cat['created_at']?></td>
                            <td><?php echo $cat['updated_at']?></td>
                            <td>
                                <a href="./edit.php ?id=<?php echo $cat['id']?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                <a href="./delete.php ?id=<?php echo $cat['id']?>" class="btn btn-danger"><i data-lucide="trash"></i></a>
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
    <?php
    include_once "../includes/footer.php";
    ?>
