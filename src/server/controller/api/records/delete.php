<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    include_once('../../../conf/db.php');
    include_once('../../../model/records/records.php');
    
    $db = new db();
    $connect = $db->connect();

    $records = new Records($connect);
    $records->id_records = isset($_GET['id']) ? $_GET['id'] : die();

    if($records->delete()){
        echo json_encode(array('message' => 'User deleted'));
    } else {
        echo json_encode(array('message' => 'Unable to delete user'));
    }
?>
