<?php
require_once('connection.php');

if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['desc'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$img = $_FILES['image']['name'];

$sql = 'UPDATE product set name=:name, price=:price, description=:description, image=:image where id=:id';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":price", $price);
    $stmt->bindParam(":description", $desc);
    $stmt->bindParam(":image", $img);
    $stmt->bindParam(":id", $_GET['id']);
    $stmt->execute();

    echo json_encode(array('status' => true, 'data' => 'Cập nhật sản phẩm thành công'));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
