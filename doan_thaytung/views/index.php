<?php
include_once "./includes/header.php";
?>
<!-- home content -->
<section class="home">
  <div class="content">
    <h1> <span>Electronic Products</span>
      <br>
      Up To <span id="span2">50%</span> Off
    </h1>
    <p>Uy tín - Chất lượng - Tạo nên thương hiệu.
      <br>Electronic luôn đồng hành cùng bạn.
    </p>
    <div class="btn"><button>Shop Now</button></div>

  </div>
  <div class="img">
    <img src="./public/images/background.png" alt="">
  </div>
</section>
<!-- home content -->


<!--  product cards hot-->
<div class="container" id="product-cards">
  <p>Danh sách sản phẩm:</p>
  <div class="row" style="margin-top: 30px;">
    <?php
    foreach ($products_hot as $prohot) {
    ?>
      <div class="col-md-3 py-3">
        <a class="card" style="text-decoration: none" href="detail.php?id=<?php echo $prohot['id'] ?>">
          <img src="<?php echo $prohot['image'] ?>" alt="">
          <div class="card-body">
            <h3 class="text-center"><?php echo $prohot['name'] ?></h3>
            <p class="text-center">Danh sách sản phẩm.</p>
            <div class="star text-center">
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
            </div>

            <h2><?php echo $prohot['price'] ?>$
              <span>
                <i data-lucide="scan-barcode"></i>
              </span>
            </h2>

          </div>
        </a>
      </div>

    <?php
    }
    ?>
  </div>
</div>
</div>
<!-- hot product cards -->



<!-- card product -->







<!-- banner -->
<section class="banner">
  <div class="content">
    <h1> <span>Electronic Gadget</span>
      <br>
      Up To <span id="span2">50%</span> Off
    </h1>
    <p>Uy tín-Chất lượng-Tạo nên thương hiệu.
      <br>Electronic luôn đồng hành cùng bạn.
    </p>
    <div class="btn"><button>Shop Now</button></div>

  </div>
  <div class="img">
    <img src="./public/images/image1.png" alt="">
  </div>
</section>
<!-- banner -->




<!-- other cards -->
<div class="container" id="other">
  <div class="row">
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./public/images/c3.png" alt="">
        <div class="card-img-overlay">
          <h3>Home Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./public/images/c4.png" alt="">
        <div class="card-img-overlay">
          <h3>Gaming Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
    <div class="col-md-4 py-3 py-md-0">
      <div class="card">
        <img src="./public/images/c5.png" alt="">
        <div class="card-img-overlay">
          <h3>Electronic Gadget</h3>
          <p>Latest collection Up To 50% Off</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- other cards -->

<!-- list product cards  -->
<div class="container" id="product-cards">
  <p>Danh sách sản phẩm:</p>
  <div class="row" style="margin-top: 30px;">
    <?php
    foreach ($products as $pro) {
    ?>
      <div class="col-md-3 py-3">
        <a class="card" style="text-decoration: none" href="detail.php?id=<?php echo $pro['id'] ?>">
          <img src="<?php echo $pro['image'] ?>" alt="">
          <div class="card-body">
            <h3 class="text-center"><?php echo $pro['name'] ?></h3>
            <p class="text-center">Danh sách sản phẩm.</p>
            <div class="star text-center">
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
              <i class="fa-solid fa-star checked"></i>
            </div>
            <h2><?php echo $pro['price'] ?>$ <span>
                <i data-lucide="scan-barcode"></i>
              </span></h2>
          </div>
        </a>
      </div>

    <?php
    }
    ?>
  </div>
</div>
</div>
<!-- end list products cart   -->



<!-- offer -->
<div class="container" id="offer">
  <div class="row">
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-cart-shopping"></i>
      <h3>Free Shipping</h3>
      <p>On order over $1000</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-rotate-left"></i>
      <h3>Free Returns</h3>
      <p>Within 30 days</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-truck"></i>
      <h3>Fast Delivery</h3>
      <p>World Wide</p>
    </div>
    <div class="col-md-3 py-3 py-md-0">
      <i class="fa-solid fa-thumbs-up"></i>
      <h3>Big choice</h3>
      <p>Of products</p>
    </div>
  </div>
</div>
<!-- offer -->

<!-- newslater -->
<div class="container" id="newslater">
  <h3 class="text-center">Subscribe To The Electronic Shop For Latest upload.</h3>
  <div class="input text-center">
    <input type="text" placeholder="Enter Your Email..">
    <button id="subscribe">SUBSCRIBE</button>
  </div>
</div>
<!-- newslater -->
<?php //include $root."/views/includes/footer.php" ;
include_once "./includes/footer.php";


?>