<?php 
session_start();
if(isset($_POST['create_users'])){
    include_once(__DIR__ . '/../../../controller/api/category/read.php');
    include_once(__DIR__ . '/../../../conf/db.php'); // Đảm bảo rằng biến $connect đã được khởi tạo và kết nối đến cơ sở dữ liệu

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new db();
        $connect = $db->connect();

        $category = new Category ($connect);

        $nameCategory = $_POST['nameCategory'];

        $category->nameCategory = $nameCategory;

        if ($category->create()) {
            echo "User created successfully";
        } else {
            echo "Error creating user";
        }
        header('Location:../../../index.php?action=category&query=show');
    }
}
if(isset($_POST['update_users'])){
    include_once(__DIR__ . '/../../../controller/api/category/update.php');
    include_once(__DIR__ . '/../../../conf/db.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $db = new db();
        $connect = $db->connect();
    
        $category = new Category($connect);
    
        $id_category = $_POST['id_category'];
        $nameCategory = $_POST['nameCategory'];
    
        $category->id_category = $id_category;
        $category->nameCategory = $nameCategory;

    
        if ($category->update() ) {
            echo "User updated successfully";
        } else {
            echo "Error updating user";
        }
        header('Location:../../../index.php?action=category&query=show');
    }
}

if(isset($_POST['delete_users'])) {
    include_once(__DIR__ . '/../../../conf/db.php');
    include_once(__DIR__ . '/../../../model/category/category.php');

    $db = new db();
    $connect = $db->connect();

    $category = new Category($connect);

    $category->id_category = $_GET['id'];

    if ($category->delete()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user";
    }
    header('Location:../../../index.php?action=records&query=show');
}

?>