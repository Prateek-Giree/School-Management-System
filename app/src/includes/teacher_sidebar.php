<?php
if (empty ($_SESSION['email']) || $_SESSION['role'] != 1) {
    header("Location:../../public/index.php");
    exit();
} else {
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/admin_sidebar.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <span class="sms">SMS</span>
                    <br>
                    <br> <br>
                    <div class="flexing">
                        <img src="../assets/pngwing.com.png" class="imagepng" />
                    </div>
                    <span class="gmail">
                        <?php echo $_SESSION['email']; ?>
                    </span>
                    <br><br>
                    <li><a href="../teacher/teacher_dashboard.php">
                            <i class="fas fa-home"></i>
                            <span class="nav-item">Dashboard</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-user"></i>
                            <span class="nav-item">Profile</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-users-rectangle"></i>
                            <span class="nav-item">View Classes</span>
                        </a></li>
                    <li><a href="">
                            <i class="fas fa-users"></i>
                            <span class="nav-item">View Students</span>
                        </a></li>
                    <li><a href="../pages/logout.php" class="logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a></li>
                </ul>
            </nav>
        </div>

    </body>

    </html>
    <?php
}
?>