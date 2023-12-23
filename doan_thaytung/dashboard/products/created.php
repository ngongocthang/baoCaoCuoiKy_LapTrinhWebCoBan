<?php 
include_once "../../connect.php";
include_once "../../functions.php";
if(isset($_POST['submit'])){
    echo"post from client";
    $name=$_POST['name'];
    $categories=$_POST['categories'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $image= uploadImage();
    $view=$_POST['view'];
    createProducts($name, $categories,$description,$price,$image,$view);
}
include_once "../includes/header.php" ?>
<div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <p class="fw-bold text-center fs-1">Trang them danh muc san pham.</p>
                <div class="mb-3">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nhap ten cua danh muc san pham">
                </div>
                <div class="mb-3">
                        <label for="name" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control" id="image_upload" name="fileToUpload" >
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label">Chi tiết</label>
                    <textarea class="form-control" id="categories" name="categories" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá</label>
                    <input type="text" class="form-control" id="price" name="price" >

                </div>
                <div class="mb-3">
                    <label for="view" class="form-label">Lượt mua</label>
                    <input type="text" class="form-control" id="view" name="view" >

                </div>
                <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                    Thêm</button>
                </form>

            </div>
        </div>
    </div>
     <?php
     include_once "../includes/footer.php" ?> 
