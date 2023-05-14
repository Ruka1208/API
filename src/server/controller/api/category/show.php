<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/category/category.php');
    include_once(__DIR__ . '/../../../conf/db.php'); 

    $db = new db();
    $connect = $db->connect();

    $category = new Category($connect);
    $category->id_category = isset($_GET['id']) ? $_GET['id'] : die();

    $category->show();

    $category_item = array(
        'id_category' => $category->id_category,
        'nameCategory' => $category->nameCategory,
           // có thể xóa trường này nếu không cần thiết
    );
    print(json_encode($category_item ,JSON_PRETTY_PRINT));
?>
