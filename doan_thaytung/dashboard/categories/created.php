<?php

// $root=$_SERVER['DOCUMENT_ROOT']."/doan_thaytung";
// include_once $root."/connect.php";
// include_once $root."/functions.php";
include_once "../../connect.php";
 include_once "../../functions.php";
// kiểm tra 
if(isset ($_POST['submit'])){
    echo"post from client";
    $name=$_POST['name'];
    $description=$_POST['description'];
    createCategories($name,$description);

}



 //include_once $root."/dashboard/includes/header.php"
 include_once "../includes/header.php"?>

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang them danh muc san pham.</p>
                <div class="mb-3">
                    <form action="" method="POST">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nhap ten cua danh muc san pham">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                    Thêm</button>
                </form>

            </div>
        </div>
    </div>
    <?php //include_once $root."/dashboard/includes/footer.php";
    include_once "../includes/footer.php"
    ?>
