<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    include_once(__DIR__ . '/../../../model/account_management/account_management.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();

    $user = new Users($connect);
    $user->id_users = isset($_GET['id']) ? $_GET['id'] : die();

    $user->show();

    $user_item = array(
        'id_users' => $user->id_users,
        'username' => $user->username,
        'email' => $user->email,  
        'pass' => $user->pass,  
        'repass' => $user->repass,  // có thể xóa trường này nếu không cần thiết
    );
    // print(json_encode($user_item ,JSON_PRETTY_PRINT));
?>

