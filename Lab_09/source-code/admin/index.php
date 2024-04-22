<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="container">
        <?php
        include "../model/pdo.php";
        include("header.php");
        //Controller
        //1.0 controler 
        if (isset($_GET['act'])) {
            $act = $_GET['act'];
            switch ($act) {
                case 'adddm':
                    //3.4 kiểm tra ng dung có click va nuct add ko
                    if (isset($_POST['tenloai'])) {
                        $tenloai = $_POST['tenloai'];
                        $sql = "INSERT INTO category(name) values('$tenloai')";
                        pdo_executer($sql);
                        $thongbao = "Thêm thành công";
                    }
                    $id = '';
                    $name = '';
                    include "danhmuc/add.php";
                    break;
                case 'suadm':
                    //3.4 kiểm tra ng dung có click va nuct add ko
                    if (isset($_GET['id'])) {
                        $sql = "SELECT * FROM category WHERE id = :id";
                        $data = pdo_query_with_condition($sql, 'id', $_GET['id']);
                        $id = $data['id'];
                        $name = $data['name'];
                    }

                    if (isset($_POST['tenloai'])) {
                        $tenloai = $_POST['tenloai'];
                        $id = $_POST['maloai'];
                        $sql = 'UPDATE category SET name=:name WHERE id=:id';
                        pdo_update_category($sql, $tenloai, $id);
                        $thongbao = "Cập nhật thành công";
                        echo '<script>window.location.replace("./index.php?act=listdm");</script>';
                        break;
                    }

                    include "danhmuc/update.php";
                    break;
                case 'xoadm':
                    //3.4 kiểm tra ng dung có click va nuct add ko
                    $sql = "DELETE FROM category WHERE id = :id";
                    $data = pdo_query_with_condition($sql, 'id', $_GET['id']);
                    $id = $data['id'];
                    $name = $data['name'];

                    echo '<script>window.location.replace("./index.php?act=listdm");</script>';
                    break;
                case 'listdm':
                    $sql = 'SELECT * from category order by name';
                    $listdanhmuc = pdo_query($sql);
                    include "danhmuc/list.php";
                    break;

                case 'addsp':
                    include "sanpham/add.php";
                    break;
                default:
                    include "home.php";
                    break;
            }
        } else {
            include "home.php";
        }

        include("footer.php");
        ?>
    </div>
</body>

</html>