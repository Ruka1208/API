<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Index Admin</title>
</head>
<body>
<div class="bg_admin">
        <div class="admin_size row">
            <div class="admin_account">
                <div class="admin_content_account">
                    <div class="admin_staff_title ">
                        <img src="../img/user.png" alt="">
                        <ul class="nav">
                            <li class="button-dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle">                    
                                    <?php 
                                        session_start();
                                        if (isset($_SESSION['user_name'])) {
                                    ?>
                                    <span><?php echo $_SESSION['user_name'] ?></span> <span>▼</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="logout.php">
                                            <?php
                                                } else {
                                                header("location:login.php");
                                              }
                                            ?>
                                            <p>Đăng Xuất</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php 
                include('logic/php/qltk/lietke.php')
            ?>
            </div>
            <script>
            jQuery(document).ready(function(e) {
                function t(t) {
                    e(t).bind("click", function(t) {
                        t.preventDefault();
                        e(this).parent().fadeOut()
                    })
                }
                e(".dropdown-toggle").click(function() {
                    var t = e(this).parents(".button-dropdown").children(".dropdown-menu").is(
                        ":hidden");
                    e(".button-dropdown .dropdown-menu").hide();
                    e(".button-dropdown .dropdown-toggle").removeClass("active");
                    if (t) {
                        e(this).parents(".button-dropdown").children(".dropdown-menu").toggle().parents(
                            ".button-dropdown").children(".dropdown-toggle").addClass("active")
                    }
                });
                e(document).bind("click", function(t) {
                    var n = e(t.target);
                    if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-menu")
                        .hide();
                });
                e(document).bind("click", function(t) {
                    var n = e(t.target);
                    if (!n.parents().hasClass("button-dropdown")) e(".button-dropdown .dropdown-toggle")
                        .removeClass("active");
                })
            });
            </script>
        </div>
    </div>
</body>
</html>