<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Index Admin</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar_size row">
            <div class="navbar_container">
                <ul class="navbar_content">
                    <li class="navbar_item"><a href="index.php?action=account_management&query=show">Quản lý tài khoản</a></li>
                    <li class="navbar_item"><a href="index.php?action=category&query=show">Quản lý danh mục</a></li>
                    <li class="navbar_item"><a href="index.php?action=records&query=show">Quản lý hồ sơ điều trị</a></li>
                </ul>
            </div>
                <?php
                    @include_once('content.php'); 
                ?>
        </div>
    </div>
</body>
</html>