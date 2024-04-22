<?php
// Mở kết nối CSDL bằng PDO
// 1.0 function connect database
function pdo_get_connect()
{
    $host = 'db';
    $dbName = 'lab09';
    $username = 'root';
    $password = 'my-secret-pw';

    try {
        $dbCon = new PDO("mysql:host=$host;dbname=$dbName", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $dbCon;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
}

//2.0 Thực thi cau lenh sql (INSERT, UPDATE, DELETE)
//$args mảng giá trị cung cấp cho các tham số của $sql
function pdo_executer($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
//3.0 thực thi câu lệnh truy vấn (SELECT)
//$args mảng giá trị cung cấp cho các tham số của $sql

function pdo_update_category($sql, $category, $id)
{
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $category);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_query_with_condition($sql, $colName, $condition)
{
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam($colName, $condition);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
//Thực THI truy vấn 1 bảng ghi
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    }
}
