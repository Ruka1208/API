<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    include_once('../../../conf/db.php');
    include_once('../../../model/account_management/account_management.php');
    
    $db = new db();
    $connect = $db->connect();

    $users = new Users($connect);

    $users->id_users = isset($_GET['id']) ? $_GET['id'] : die();

    if($users->delete()){
        echo json_encode(array('message' => 'User deleted'));
    } else {
        echo json_encode(array('message' => 'Unable to delete user'));
    }
?>
