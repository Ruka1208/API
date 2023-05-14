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


<form action="view/layout/account_management/logic.php" method="POST" enctype="multipart/form-data">
    <div class="account">
        <div class="account_container">
            <h3>Add users</h3>
            <div class="from_add">
                <p>User name</p>
                <input type="text" name="username">
                <p>Email</p>
                <input type="email" name="email">
                <p>Pass</p>
                <input type="password" name="pass">
                <p>Repass</p>
                <input type="password" name="repass">
                <div class="btn_add">
                    <button name="create_users" type="submit">Add user</button>
                </div>
            </div>
        </div>
    </div>
</form>

</body>
</html> 