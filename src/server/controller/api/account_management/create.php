<?php 
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods:POST');
        header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,x-Requested-with');
        include_once(__DIR__ . '/../../../model/account_management/account_management.php');
        include_once(__DIR__ . '/../../../conf/db.php');
    
        
        $db = new db();
        $connect = $db->connect();

        $users = new Users($connect);

        $data = json_decode(file_get_contents("php://input"));
        $users->username = $data->username;
        $users->email = $data->email;
        $users->pass = $data->pass;
        $users->repass = $data->repass;

        if($users->create()){
            
        }else{
            echo json_encode(array('message' , 'cant create'));
        }
?>