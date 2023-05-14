<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/records/records.php');
    include_once(__DIR__ . '/../../../conf/db.php'); 

    $db = new db();
    $connect = $db->connect();

    $records = new Records($connect);
    $records->id_records = isset($_GET['id']) ? $_GET['id'] : die();

    $records->show();

    $records_item = array(
        'id_records' => $records->id_records,
        'username' => $records->username,
        'img' => $records->img,
        'age' => $records->age,
        'cmnd' => $records->cmnd,
        'phone' => $records->phone,
        'note' => $records->note,
        'date_create' => $records->date_create,
           // có thể xóa trường này nếu không cần thiết
    );
    // print(json_encode($user_item ,JSON_PRETTY_PRINT));
?>