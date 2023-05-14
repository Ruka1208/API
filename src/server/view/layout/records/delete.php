<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Index Admin</title>
</head>
<body>
<?php
    include_once(__DIR__ . '/../../../model/records/records.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();

    $records = new Records($connect);
    $records->id_records = isset($_GET['id']) ? $_GET['id'] : die();

    $records->delete();

    // Hiển thị form update với các giá trị mặc định được lấy từ database
?>

<form action="view/layout/records/logic.php" method="POST">
    <div class="account">
        <div class="account_container">
            <h3>Update users</h3>
            <div class="from_add">
                <h2>Xác nhận xóa</h2>
                <p>Một khi đã xóa thì tài khoàn sẽ bị xóa vĩnh viễn và không thể khôi phục !</p>
                <div class="btn_add">
                    <button name="delete_users" type="submit">delete user</button>
                </div>
            </div>
        </div>
    </div>
</form>


</body>
</html> 