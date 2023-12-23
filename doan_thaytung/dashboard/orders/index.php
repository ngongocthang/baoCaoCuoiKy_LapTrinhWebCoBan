<?php
include_once "../../connect.php";
include_once "../../functions.php";
showAllOrders();
?>
<?php include_once "../includes/header.php"?>
<div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang Order.</p>
                <a href="./created.php" class="btn btn-primary d-inline"><i data-lucide="plus-square"></i> Thêm</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Code(mã giảm giá)</th>
                            <th>TocalPrice</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Ispaid(đã thanh toán)</th>
                            <th>Created_at</th>
                            <th>###</th>
                        </tr>
                    <tbody>
                        <?php foreach($order as $ord){ ?>
                        <tr>
                            <td><?php echo $ord['index']?></td>
                            <td><?php echo $ord['id']?></td>
                            <td><?php echo $ord['code']?></td>
                            <td><?php echo $ord['tocalprice']?></td>
                            <td><?php echo $ord['phone']?></td>
                            <td><?php echo $ord['address']?></td>
                            <td><?php echo $ord['ispaid']?></td>
                            <td><?php echo $ord['created_at']?></td>
                            <td>
                                <a href="./edit.php ?id=<?php echo $ord['id']?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                <a href="./delete.php ?id=<?php echo $ord['id']?>" class="btn btn-danger"><i data-lucide="trash"></i></a>
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
    <?php include_once "../includes/footer.php"?>
