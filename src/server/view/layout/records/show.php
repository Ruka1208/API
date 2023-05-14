<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Index Admin</title>
</head>
<body>
    <?php

        include_once(__DIR__ . '/../../../controller/api/records/read.php');
        include_once(__DIR__ . '/../../../conf/db.php'); // Đảm bảo rằng biến $connect đã được khởi tạo và kết nối đến cơ sở dữ liệu

        $records = new Records($connect);
        
        $stmt = $records->read();

        if ($stmt->rowCount() > 0) {
            $records_array = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $records_item = array(
                    'id_records' => $row['id_records'],
                    'username' => $row['username'],
                    'img' => $row['img'],
                    'age' => $row['age'],
                    'cmnd' => $row['cmnd'],
                    'phone' => $row['phone'],
                    'note' => $row['note'],
                    'date_create' => $row['date_create'],
                    'address' => $row['address'],

                );
                array_push($records_array, $records_item);
            }
        } else {
            echo "No users found. Error: " . json_encode($stmt->errorInfo());
        }
    ?>

    <div class="account">
        <div class="account_container">
            <h3>User</h3>
            <div class="account_content row">
                <div class="account_search">
                    <input type="text">
                    <span>Tìm kiếm</span>
                </div>
                <div class="account_create">
                    <button><a href="index.php?action=records&query=add">Create new records</a></button>
                </div>
            </div>
            <div class="account_show">
                <table id="users_table" border="1" width="100%" style="border-collapse: collapse ; text-align: center; margin-top:20px; border: 0.1px solid #f5f5f5">
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>img</th>
                        <th>age</th>
                        <th>cmnd</th>
                        <th>phone</th>
                        <th>note</th>
                        <th>date_create</th>
                        <th>address</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php 
                        $i = 0;
                        foreach ($records_array as $records) {
                        $i++;
                    ?>
                    <tr>
                       
                        <td id="id_users">
                            <?php 
                                echo $i;
                            ?>
                        </td>
                        <td id="username">
                            <?php 
                                echo $records['username'];
                            ?>
                        </td>
                        <td id="username">
                            <img src="view/layout/records/uploads/<?php echo $records['img'] ?>" width="100px">

                        </td>
                        <td id="username">
                            <?php 
                                echo $records['age'];
                            ?>
                        </td>

                        <td id="username">
                            <?php 
                                echo $records['cmnd'];
                            ?>
                        </td>
                        <td id="username">
                            <?php 
                                echo $records['phone'];
                            ?>
                        </td>
                        <td id="username">
                            <?php 
                                echo $records['note'];
                            ?>
                        </td>
                        <td id="username">
                            <?php 
                                echo $records['date_create'];
                            ?>
                        </td>
                        <td id="username">
                            <?php 
                                echo $records['address'];
                            ?>
                        </td>
                        <td>
                            <button id="btn_1" class="btn_1"><a href="index.php?action=records&query=update&id=<?php echo $records['id_records']; ?>">Update</a></button>

                            <button name="delete_users" class="btn_2 delete-btn"><a href="index.php?action=records&query=delete&id=<?php echo $records['id_records']; ?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php 
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>