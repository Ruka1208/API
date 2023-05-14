<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/records/records.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();
    
    $records = new Records($connect);
    $read = $records->read();

    $num = $read->rowCount();
        if($num > 0){
            $records_array = [];
            $records_array['data'] = [];

            while($row = $read->fetch(PDO::FETCH_ASSOC)){
                extract($row);

                $records_item = array(
                    'id_records' => $id_records,
                    'username' => $username,
                    'img' => $img,
                    'age' => $age,
                    'cmnd' => $cmnd,
                    'phone' => $phone,
                    'note' => $note,
                    'date_create' => $date_create,
                    'id_users' => $id_users,
                    'address' => $address,
                );
                array_push($records_array['data'],$records_item);
            }
            // echo json_encode($records_array, JSON_PRETTY_PRINT);
        }
?> 