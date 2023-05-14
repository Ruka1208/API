<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Index Admin</title>
</head>
<style>
        form {
  max-width: 400px;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

h2 {
  text-align: center;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="email"],
input[type="password"] {
  display: block;
  width: 95%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  margin-bottom: 20px;
}

input[type="submit"] {
  display: block;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
}

.error-msg {
  display: block;
  color: red;
  margin-bottom: 10px;
}

    </style>
<body>
<?php 
  session_start();
  require_once '../server/conf/db.php';

  $db = new db();
  $conn = $db->connect();
        
  if ($conn) {
    if (isset($_POST['email']) && isset($_POST['pass'])) {
      $email = $_POST['email'];
      $pass = $_POST['pass'];
          
      try {
        $query = "SELECT * FROM tbl_users WHERE email=:email AND pass=:pass";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
            
        if ($stmt->rowCount() > 0) {
          $row = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy bản ghi đầu tiên
          $_SESSION['user_name'] = $row['username']; // Lưu username vào session
          header("location:index.php");
        } else {
          $error[] = 'Email hoặc mật khẩu bạn không đúng vui lòng nhập lại';
        }
      } catch(PDOException $e) {
        // Báo lỗi nếu có
        echo "Lỗi: " . $e->getMessage();
      }
          
      // Đóng kết nối
      $conn = null;
    } else {
      // Hiển thị thông báo lỗi hoặc chuyển hướng người dùng đến trang khác
    }
  }
?> 
    
    <form method="post" action="">
        <h2>Đăng nhập</h2>
        <?php 
          if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
          };
        ?>
      <div>
        <label for="email">Tên đăng nhập:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="pass" name="pass"><br><br>
        <input type="submit" value="Đăng nhập">
      </div>
    </form>
</body>
</html>