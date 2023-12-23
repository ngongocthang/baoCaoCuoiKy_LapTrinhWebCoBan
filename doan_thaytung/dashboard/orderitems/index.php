<?php
// nhúng,kết nối csdl
include_once "../connect.php";
// truy vấn query
$query = "SELECT *FROM orderitem";
// thực thi câu lệnh đễ lấy dữ liệu
$result = mysqli_query($conn, $query);
// tạo một mảng đế chứa dữa liệu 
$orderitem = [];
if ($result && $result->num_rows > 0) {
    $rownum = 1;
    while ($row = $result->fetch_assoc()) {
        $orderitem[] = array(
            "index" => $rownum++,
            "id" => $row['id'],
            "orderid" => $row['orderid'],
            "productid" => $row['productid'],
        );
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>

</head>

<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">
                    <p class="fw-bold text-center fs-1">Trang orderitem.</p>

                    <a href="./create.php" class="btn btn-primary d-inline"><i data-lucide="plus-square"></i> Thêm</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>OrderID</th>
                                <th>ProductID</th>
                                <th>Ngày cập nhật</th>
                                <th>###</th>
                            </tr>
                        <tbody>
                            <?php foreach ($orderitem as $cat) { ?>
                                <tr>
                                    <td><?php echo $cat['index'] ?></td>
                                    <td><?php echo $cat['id'] ?></td>
                                    <td><?php echo $cat['orderid'] ?></td>
                                    <td><?php echo $cat['productid'] ?></td>
                                    <td><?php echo $cat['created_at'] ?></td>
                                    <td>
                                        <a href="./edit.php ?id=<?php echo $cat['id'] ?>" class="btn btn-primary"><i data-lucide="pencil"></i></a>
                                        <a href="./delete.php ?id=<?php echo $cat['id'] ?>" class="btn btn-danger"><i data-lucide="trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>


                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- link icon -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            lucide.createIcons();
        </script>

    </body>

</html>