<?php
require_once('connection.php');

if (!isset($_POST['id'])) {
    die(json_encode(array('status' => false, 'data' => 'Parameters not valid')));
}

$id = $_POST['id'];

$sql = 'DELETE from product where id=:id';

try {
    $stmt = $dbCon->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    echo json_encode(array('status' => true, 'data' => 'Xóa sản phẩm thành công'));
} catch (PDOException $ex) {
    die(json_encode(array('status' => false, 'data' => $ex->getMessage())));
}
