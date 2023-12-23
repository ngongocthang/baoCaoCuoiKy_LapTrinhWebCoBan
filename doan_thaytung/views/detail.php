<?php include "./includes/header.php";

// detail
$product_id = $_GET['id'];
$product_detail = getProduct($product_id);

// var_dump($product_detail['id']);
?>

<!-- content -->
<section class="py-5">
  <div class="container" id="product-detail">
    <div class="row gx-5">
      <aside class="col-lg-6">

        <div class="border rounded-4 mb-3 d-flex justify-content-center">

          <a href="<?php echo "/doan_thaytung" . $product_detail['image'] ?>">
            <img style="max-width: 100%; max-height: 350px; margin: auto; " class="rounded-4 fit" src="<?php echo "/doan_thaytung" . $product_detail['image'] ?>" />
          </a>

        </div>

        <div class="d-flex justify-content-center mb-3">
          <a class="border mx-1 rounded-2" href="#">
            <img width="120" height="120" class="rounded-2" src="./public/images/h1.png" />
          </a>
          <a class="border mx-1 rounded-2" href="#">
            <img width="120" height="120" class="rounded-2" src="./public/images/pr11.png" />
          </a>
          <a class="border mx-1 rounded-2" href="#">
            <img width="120" height="120" class="rounded-2" src="./public/images/iphone 13 pro.png" />
          </a>
          <a class="border mx-1 rounded-2" href="#">
            <img width="120" height="120" class="rounded-2" src="./public/images/pr7.png" />
          </a>
          <!-- <a class="border mx-1 rounded-2" href="#">   100vh
            <img width="120" height="120" class="rounded-2" src="./public/images/pr8.png" />
          </a> -->
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            <?php echo $product_detail['name'] ?>
          </h4>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
          </div>

          <div class="mb-3">
            <span class="h5"><?php echo $product_detail['price'] ?>$</span>

          </div>

          <p>
            Sản phẩm demo chất lượng và kiểu dáng hiện đại là bộ sưu tập lấy cảm hứng từ công nghệ mới, tiếp tục
            phá vỡ các quy ước của công nghệ hiện nay . Được sản xuất tại Ý, những chiếc .... phù hợp cho tất cả
            mọi người.
          </p>

          <div class="row">
            <dt class="col-3">Type:</dt>
            <dd class="col-9">...</dd>

            <dt class="col-3">Color</dt>
            <dd class="col-9">...</dd>

            <dt class="col-3">Material</dt>
            <dd class="col-9">...</dd>

            <dt class="col-3">Brand</dt>
            <dd class="col-9">...</dd>
          </div>

          <hr />



          <!-- quantity  -->
          <form action="cartCTL.php" method="GET">
          <div class="row mb-4">
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
              <div class="input-group mb-3" style="width: 170px; margin-top: 20px;">
                <input id="quantity" type="number" value="1"  name="quantity" min="1" class="form-control quantity-input">
                <input  type="hidden" name="id" value="<?php echo $product_detail['id']?>">
              </div>
            </div>
            <!-- quantity  -->

            <!-- add to cart  -->
            <div class="col-md-6 col-6 mt-4"  >
             <button type="submit" class="btn btn-warning" style="margin-top: 20px">Add to cart</button>
            </div>
            </form>
            <!-- add to cart  -->

          </div>

        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->


<?php include "./includes/footer.php"; ?>