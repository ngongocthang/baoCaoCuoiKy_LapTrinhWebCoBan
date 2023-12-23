<?php
include "../connect.php";
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$action = (isset($_GET['action'])) ? $_GET['action'] : 'add';
$quantity = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
$query = mysqli_query($conn, "SELECT * FROM products WHERE id= $id");
if ($query) {
    $product = mysqli_fetch_assoc($query);
}
$item = [
    'id' => $product['id'],
    'name' => $product['name'],
    'image' => $product['image'],
    'price' => $product['price'],
    'quantity' => $quantity,
];
if ($action == 'add') {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = $item; // mang nhieu chieu
    }
}
// cập nhật sp
if ($action == 'update') {
    $_SESSION['cart'][$id]['quantity'] = $quantity;
}
// xoá sp
function xoaSanPhamKhoiGioHang($id)
{
    if (isset($_SESSION['cart'][$id])) {
        unset($_SESSION['cart'][$id]);
    }
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    switch ($action) {
        case 'delete':
            xoaSanPhamKhoiGioHang($id);
            break;
        default:
            break;
    }
}


header('location: cart.php');
