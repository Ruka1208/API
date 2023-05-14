<?php 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,x-Requested-with');
        include_once(__DIR__ . '/../../../model/records/records.php');
        include_once(__DIR__ . '/../../../conf/db.php');
    
        
        $db = new db();
        $connect = $db->connect();

        $records = new Records($connect);

        $data = json_decode(file_get_contents("php://input"));
        $records->id_records = $data->id_category;
        $records->username = $data->username;
        $records->img = $data->img;
        $records->age = $data->age;
        $records->cmnd = $data->cmnd;
        $records->phone = $data->phone;
        $records->note = $data->note;
        $records->date_create = $data->date_create;
        $records->address = $data->address;


        if($records->update()){
            echo json_encode(array('message' , 'Update'));
        }else{
            echo json_encode(array('message' , 'cant update'));
        }
?>