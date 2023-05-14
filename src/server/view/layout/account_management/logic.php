<?php 
session_start();
if(isset($_POST['create_users'])){
    include_once(__DIR__ . '/../../../controller/api/account_management/read.php');
    include_once(__DIR__ . '/../../../conf/db.php'); // Đảm bảo rằng biến $connect đã được khởi tạo và kết nối đến cơ sở dữ liệu

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new db();
        $connect = $db->connect();

        $users = new Users($connect);

        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];

        $users->username = $username;
        $users->email = $email;
        $users->pass = $pass;
        $users->repass = $repass;

        if ($users->create()) {
            echo "User created successfully";
        } else {
            echo "Error creating user";
        }
        header('Location:../../../index.php?action=account_management&query=show');
    }
}
if(isset($_POST['update_users'])){
    include_once(__DIR__ . '/../../../controller/api/account_management/update.php');
    include_once(__DIR__ . '/../../../conf/db.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $db = new db();
        $connect = $db->connect();
    
        $users = new Users($connect);
    
        $id_users = $_POST['id_users'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $repass = $_POST['repass'];
    
        $users->id_users = $id_users;
        $users->username = $username;
        $users->email = $email;
        $users->pass = $pass;
        $users->repass = $repass;
    
        if ($users->update() ) {
            echo "User updated successfully";
        } else {
            echo "Error updating user";
        }
        header('Location:../../../index.php?action=account_management&query=show');
    }
}

if(isset($_POST['delete_users'])) {
    include_once(__DIR__ . '/../../../conf/db.php');
    include_once(__DIR__ . '/../../../model/account_management/account_management.php');

    $db = new db();
    $connect = $db->connect();

    $users = new Users($connect);

    $users->id_users = $_GET['id'];

    if ($users->delete()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user";
    }
    header('Location:../../../index.php?action=account_management&query=show');
}

?>