<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/category/category.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();
    
    $category = new Category($connect);
    $read = $category->read();

    $num = $read->rowCount();
        if($num > 0){
            $category_array = [];
            $category_array['data'] = [];

            while($row = $read->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $category_item = array(
                    'id_category' => $id_category,
                    'nameCategory' => $nameCategory,
                );
                array_push($category_array['data'],$category_item);
            }
            // echo json_encode($category_array, JSON_PRETTY_PRINT);
        }
?> 