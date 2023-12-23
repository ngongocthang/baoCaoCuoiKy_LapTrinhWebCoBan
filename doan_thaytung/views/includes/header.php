<?php

include_once "../connect.php";
include_once "../functions.php";
include_once "../controller/registerCTL.php";
include_once "../controller/loginCTL.php";


$categories = showAllCategories();
$products = showAllProducts();
$products_hot = showProductsHot();
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
        echo 'Hello: ' . $_SESSION['name'] . '<a href="logout.php" class="btn btn-pramiry"><i data-lucide="log-out"></i> Logout</a>';
      }
      else {
        echo '<a href="./login.php"><i data-lucide="log-in"></i> Login</a>';
        echo '<a href="./register.php"><i data-lucide="log-in"></i> Register</a>';
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