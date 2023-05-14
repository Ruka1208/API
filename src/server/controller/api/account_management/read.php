<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/account_management/account_management.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();
    
    $users = new Users($connect);
    $read = $users->read();

    $num = $read->rowCount();
        if($num > 0){
            $users_array = [];
            $users_array['data'] = [];

            while($row = $read->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $users_item = array(
                    'id_users' => $id_users,
                    'username' => $username,
                    'email' => $email,  
                );
                array_push($users_array['data'],$users_item);
            }
            // echo json_encode($users_array, JSON_PRETTY_PRINT);
        }
?>