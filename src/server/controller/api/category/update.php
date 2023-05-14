<?php 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,x-Requested-with');
        include_once(__DIR__ . '/../../../model/category/category.php');
        include_once(__DIR__ . '/../../../conf/db.php');
    
        
        $db = new db();
        $connect = $db->connect();

        $category = new Category($connect);

        $data = json_decode(file_get_contents("php://input"));
        $category->id_category = $data->id_category;
        $category->nameCategory = $data->nameCategory;


        if($category->update()){
            echo json_encode(array('message' , 'Update'));
        }else{
            echo json_encode(array('message' , 'cant update'));
        }
?>