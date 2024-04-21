<?php
require_once('connection.php');

if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['desc'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$name = $_POST['name'];
$price = $_POST['price'];
$desc = $_POST['desc'];
$img = $_FILES['image']['name'];

$sql = 'INSERT INTO product(name,price,description,image) VALUES(?,?,?,?)';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->execute(array($name, $price, $desc, $img));

    echo json_encode(array('status' => true, 'data' => 'Thêm sản phẩm thành công'));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
