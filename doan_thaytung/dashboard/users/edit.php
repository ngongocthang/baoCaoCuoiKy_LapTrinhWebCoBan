<?php
include "../../connect.php";
include "../../functions.php";

if (!isset($_GET['id'])) {
    header('location:index.php');
}
// tạo biến id để chứa các id dc gọi
$id = $_GET['id'];
$users = editUsers($id);
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = validateUpdateUsers($name, $email);

    if (empty($errors)) {
        updateUsers($conn, $id, $name, $email, $password);
    } else {
        foreach ($errors as $errorField) {
            foreach ($errorField as $error) {
                echo $error["msg"] . "</br>";
            }
        }
    }
}
?>
<?php include_once "../includes/header.php" ?>
<p class="fw-bold text-center fs-1">Trang edit tai khoan.</p>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form action="" method="POST" class="mx-1 mx-md-4">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="name" class="form-control" name="name" value="<?php echo $users['name']; ?>" />
                                            <label class="form-label" for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $users['email']; ?>" />
                                            <label class="form-label" for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password" class="form-control" name="password" value="<?php echo $users['password']; ?>" />
                                            <label class="form-label" for="password">Password</label>
                                        </div>
                                    </div>
                                   
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button class="btn btn-primary" name="submit" type="submit"><i data-lucide="chevron-right-square"></i>
                                            Edit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://atpsoftware.vn/wp-content/uploads/2020/02/Nh%E1%BA%ADn-bi%E1%BA%BFt-Register-l%C3%A0-g%C3%AC.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once "../includes/footer.php" ?>