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
<div class="content_content">
    <body>
        <div class="content">
            <?php
                if(isset($_GET['action']) && $_GET['query']){
                    $tam = $_GET['action'];
                    $query = $_GET['query'];
                }else{
                    $tam = '';
                }
                if($tam=='account_management' && $query=='show'){
                    include("layout/account_management/show.php");
                }elseif($tam=='account_management' && $query=='update'){
                    include("layout/account_management/update.php");
                }elseif($tam == 'account_management' && $query =='add'){
                    include("layout/account_management/add.php");
                }elseif($tam == 'account_management' && $query =='delete'){
                    include("layout/account_management/delete.php");
                }
                
                
                if($tam=='category' && $query=='show'){
                    include("layout/category/show.php");
                }elseif($tam=='category' && $query=='update'){
                    include("layout/category/update.php");
                }elseif($tam=='category' && $query=='add'){
                    include("layout/category/add.php");
                }elseif($tam=='category' && $query=='delete'){
                    include("layout/category/delete.php");
                }
                
                if($tam=='records' && $query=='show'){
                    include("layout/records/show.php");
                }elseif($tam=='records' && $query=='update'){
                    include("layout/records/update.php");
                }elseif($tam=='records' && $query=='add'){
                    include("layout/records/add.php");
                }elseif($tam=='records' && $query=='delete'){
                    include("layout/records/delete.php");
                }
            ?>
        </div>
    </body>
</div>
</html>