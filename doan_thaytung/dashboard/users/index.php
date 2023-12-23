<?php 
include_once "../../connect.php";
include_once "../../functions.php";
showAllUsers();
?>
<?php include_once "../includes/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <p class="fw-bold text-center fs-1">Trang hiển thị tài khoản người dùng.</p>

            <a href="./create.php" class="btn btn-primary d-inline"><i data-lucide="plus-square"></i> Thêm</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Ngày tạo</th>
                        <th>###</th>
                    </tr>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <td><?php echo $user['index'] ?></td>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['password'] ?></td>
                            <td><?php echo $user['created_at'] ?></td>
                            <td>
                                <a href="./edit.php ?id=<?php echo $user['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                <a href="./delete.php ?id=<?php echo $user['id'] ?>" class="btn btn-danger"><i data-lucide="trash"></i></a>
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
<?php include_once "../includes/footer.php" ?>