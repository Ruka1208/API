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

        include_once(__DIR__ . '/../../../controller/api/category/read.php');
        include_once(__DIR__ . '/../../../conf/db.php'); // Đảm bảo rằng biến $connect đã được khởi tạo và kết nối đến cơ sở dữ liệu

        $category = new Category($connect);
        
        $stmt = $category->read();

        if ($stmt->rowCount() > 0) {
            $category_array = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $category_item = array(
                    'id_category' => $row['id_category'],
                    'nameCategory' => $row['nameCategory'],

                );
                array_push($category_array, $category_item);
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
                    <button><a href="index.php?action=category&query=add">Create new category</a></button>
                </div>
            </div>
            <div class="account_show">
                <table id="users_table" border="1" width="100%" style="border-collapse: collapse ; text-align: center; margin-top:20px; border: 0.1px solid #f5f5f5">
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Chức năng</th>
                    </tr>
                    <?php 
                        $i = 0;
                        foreach ($category_array as $category) {
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
                                echo $category['nameCategory'];
                            ?>
                        </td>
                        <td>
                            <button id="btn_1" class="btn_1"><a href="index.php?action=category&query=update&id=<?php echo $category['id_category']; ?>">Update</a></button>

                            <button name="delete_users" class="btn_2 delete-btn"><a href="index.php?action=category&query=delete&id=<?php echo $category['id_category']; ?>">Delete</a></button>
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