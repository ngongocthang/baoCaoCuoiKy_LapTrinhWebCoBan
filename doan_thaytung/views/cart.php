<?php
session_start();
// kiểm tra đã đăng nhập hay chưa
if (!isset($_SESSION['email'])) {
  header("Location: login.php");
  exit();
}
$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Electronic Shop</title>
  <link rel="stylesheet" href="./public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- bootstrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- bootstrap links -->
  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
  <!-- fonts links -->
</head>

<body>
  <!-- top navbar -->
  <div class="top-navbar">
    <p>WELCOME TO OUR SHOP</p>
    <div class="icons">
      <?php if (isset($_SESSION['name'])) {
        echo 'Hello: ' . $_SESSION['name'] . '<a href="logout.php" class="btn btn-pramiry">Logout</a>';
      }
      else {
        echo '<a href="./login.php"><img src="#" alt="" width="18px">Login</a>';
        echo '<a href="./register.php"><img src="#" alt="" width="18px">Register</a>';
    } ?>
    </div>
  </div>
  <!-- end  top navbar -->

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php" id="logo"><span id="span1">E</span>Lectronic
        <span>Shop</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><img src="./public/images/menu.png" alt="" width="30px"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#product-cards">Product</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(67 0 86);">=

              <?php
              foreach ($categories as $cat) {
              ?>
                <li><a class="dropdown-item" href="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></a></li>
              <?php
              }
              ?>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
        <form class="d-flex" id="search" action="search.php">
          <input name="key" class="form-control me-2" type="search" placeholder="Search ....." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>

          <div class="cart">
            <a href="./cart.php"><button type="button" class="btn  position-relative text-wrap">
                <i data-lucide="shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                  <span class="visually-hidden">New alerts</span>
                </span>
              </button>
            </a>
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- navbar -->
  <main class="page">
    <section class="shopping-cart dark">
      <div class="container">
        <div class="block-heading">
          <h2>Shopping Cart</h2>
          <p>Electronic luôn đặt chất lượng của sản phẩm và trải nghiệm của người dùng lên hàng đầu, cạnh đó cũng tự hào vì luôn dành được sự ưu ái từ khách hàng.</p>
        </div>
        <div class="content">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="items">
                <?php $total_price = 0;
                foreach ($cart as $key => $value) :
                  $total_price += ($value['price'] * $value['quantity']); ?>
                  <div class="product">
                    <div class="row">
                      <div class="col-md-3">
                        <img class="img-fluid mx-auto d-block image" src="<?php echo  "/doan_thaytung" . $value['image'] ?>">
                      </div>
                      <div class="col-md-8">
                        <div class="info">
                          <div class="row ">
                            <div class="col-md-5 product-name">
                              <div class="product-name">
                                <p class="fs-4"><?php echo $value['name'] ?></p>
                                <div class="product-info">
                                  <p class="fs-7" style="margin-left: 23px;">Price: <?php echo $value['price'] ?>$</p>
                                </div>
                              </div>
                            </div>
                            <!-- quantity  -->
                            <div class="col-md-5 product-name">
                              <div class="d-flex justify-content-end d-flex align-items-start">
                                <form action="cartCTL.php">
                                  <div class="col-md-4 quantity ">
                                    <label for="quantity">Quantity:</label>
                                    <input type="hidden" name="action" value="update">
                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                    <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>" class="form-control quantity-input">
                                  </div>
                                  <!-- quantity  -->
                                  <div class="col-md-3 price">

                                    <button type="submit" class="btn btn-primary mt-3 ms-0" style="width: 80px;">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- DELETE  -->
                          <div class="cart position-relative">
                            <div class="position-absolute bottom-0 end-0">
                              <a href="cartCTL.php?id=<?php echo $value['id']; ?>&action=delete" class="btn btn-danger mt-3 ms-0">
                                <i data-lucide="trash-2"></i>
                              </a>
                            </div>
                          </div>
                          <!-- DELETE  -->
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <!-- bill  -->

            <div class="col-md-12 col-lg-4">
              <div class="summary">
                <h3>Bill</h3>
                <div class="summary-item"><span class="text">Subtotal</span><span class="price"><?php echo number_format($total_price)  ?>$ </span></div>
                <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
                <div class="summary-item"><span class="text">Total</span><span class="price"><?php echo number_format($total_price)  ?>$</span></div>
                <a href="#"><button type="button" class="btn btn-primary btn-lg btn-block">Checkout</button></a>
              </div>
            </div>
            <!-- bill  -->
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- table  -->
  </table>
  <!-- table  -->
</body>
<!-- link icon  -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
<!-- end link icon  -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>