<?php 
session_start();
if(isset($_POST['create_users'])){
    include_once(__DIR__ . '/../../../controller/api/records/read.php');
    include_once(__DIR__ . '/../../../conf/db.php'); // Đảm bảo rằng biến $connect đã được khởi tạo và kết nối đến cơ sở dữ liệu

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db = new db();
        $connect = $db->connect();

        $records = new Records ($connect);

        $username = $_POST['username'];
        $img = $_FILES['img']['name'];
        $img = time().'_'.$img;
        $img_tmp = $_FILES['img']['tmp_name'];
        $age = $_POST['age'];
        $cmnd = $_POST['cmnd'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $date_create = $_POST['date_create'];
        $address = $_POST['address'];

        $records->username = $username;
        $records->img = $img;
        $records->age = $age;
        $records->cmnd = $cmnd;
        $records->phone = $phone;
        $records->note = $note;
        $records->date_create = $date_create;
        $records->address = $address;
        move_uploaded_file($img_tmp,'uploads/'.$img);
        if ($records->create()) {
            echo "User created successfully";
        } else {
            echo "Error creating user";
        }
        header('Location:../../../index.php?action=records&query=show');
    }
}
if(isset($_POST['update_users'])){
    include_once(__DIR__ . '/../../../controller/api/records/update.php');
    include_once(__DIR__ . '/../../../conf/db.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $db = new db();
        $connect = $db->connect();
    
        $records = new Records ($connect);

        $id_records = $_POST['id_records'];
        $username = $_POST['username'];
        $img = $_FILES['img']['name'];
        $img = time().'_'.$img;
        $img_tmp = $_FILES['img']['tmp_name'];
        $age = $_POST['age'];
        $cmnd = $_POST['cmnd'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $date_create = $_POST['date_create'];

        $records->id_records = $id_records;
        $records->username = $username;
        $records->img = $img;
        $records->age = $age;
        $records->cmnd = $cmnd;
        $records->phone = $phone;
        $records->note = $note;
        $records->date_create = $date_create;

    
        if ($records->update() ) {
            echo "User updated successfully";
        } else {
            echo "Error updating user";
        }
        
        header('Location:../../../index.php?action=records&query=show');
    }
}

if(isset($_POST['delete_users'])) {
    include_once(__DIR__ . '/../../../conf/db.php');
    include_once(__DIR__ . '/../../../model/records/records.php');

    $db = new db();
    $connect = $db->connect();

    $records = new Records($connect);

    $records->id_records = $_GET['id'];

    if ($records->delete()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user";
    }
    header('Location:../../../index.php?action=records&query=show');
}

?>