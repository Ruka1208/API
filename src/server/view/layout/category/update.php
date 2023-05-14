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
    include_once(__DIR__ . '/../../../model/category/category.php');
    include_once(__DIR__ . '/../../../conf/db.php');

    $db = new db();
    $connect = $db->connect();

    $category = new Category($connect);
    $category->id_category = isset($_GET['id']) ? $_GET['id'] : die();

    $category->show();

    // Hiển thị form update với các giá trị mặc định được lấy từ database
?>

<form action="view/layout/category/logic.php" method="POST">
    <div class="account">
        <div class="account_container">
            <h3>Update users</h3>
            <div class="from_add">
                <input type="hidden" name="id_category" value="<?php echo $category->id_category; ?>">
                <p>Category name</p>
                <input type="text" name="nameCategory" value="<?php echo $category->nameCategory; ?>">
                <div class="btn_add">
                    <button name="update_users" type="submit">Update user</button>
                </div>
            </div>
        </div>
    </div>
</form>


</body>
</html> 