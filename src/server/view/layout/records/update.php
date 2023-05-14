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

    $records->show();

    // Hiển thị form update với các giá trị mặc định được lấy từ database
?>
    <form action="view/layout/records/logic.php" method="POST" enctype="multipart/form-data">
        <div class="account">
            <div class="account_container">
                <h3>Add treatment records</h3>
                <div class="from_add">
                    <input type="hidden" name="id_records" value="<?php echo $records->id_records; ?>">
                    <p>Username</p>
                    <input type="text" name="username" value="<?php echo $records->username; ?>">
                    <p>Img</p>
                    <input type="file" name="img" value="<?php echo $records->img; ?>">
                    <img src="view/layout/records/uploads/<?php echo $records->img; ?>" width="100px">
                    <p>Age</p>
                    <input type="number" name="age" value="<?php echo $records->age; ?>">
                    <p>CMND</p>
                    <input type="number" name="cmnd" value="<?php echo $records->cmnd; ?>">
                    <p>Phone</p>
                    <input type="number" name="phone" value="<?php echo $records->phone; ?>">
                    <p>Note</p>
                    <input type="text" name="note" value="<?php echo $records->note; ?>">
                    <p>Date create</p>
                    <input type="date" name="date_create" value="<?php echo $records->date_create; ?>">
                    <input type="number" name="id_users" hidden>
                    <p>Address</p>
                    <input type="test" name="address">
                    <div class="btn_add">
                        <button name="update_users" type="submit">Add user</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html> 