<?php
if (empty ($_SESSION['email']) || $_SESSION['role'] != 0) {
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
  <script src="../js/jquery.min.js"></script>
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
            <?php echo $_SESSION['email'] ?>
          </span>
          <br><br>
          <li><a href="../admin/admin_dashboard.php" class="sub-btn">
            <i class="fas fa-home"></i>
            <span class="nav-item">Dashboard</span>
          </a></li>
        <li>
          <a href="#" class="sub-btn">
            <i class="fas fa-users"></i>
            <span class="nav-item">Class</span>
            <i class="fa-solid fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="../process/class_show.php" class="sub-item"><i class="fas fa-eye"></i>Show Class</a>
            <a href="../pages/class_add.php" class="sub-item"><i class="fas fa-add"></i>Add Class</a>
          </div>
        </li>
        <li>
          <a href="#" class="sub-btn">
            <i class="fas fa-user-graduate"></i>
            <span class="nav-item">Teacher</span>
            <i class="fa-solid fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="../process/teacher_show.php" class="sub-item"><i class="fas fa-add"></i>Show Teachers</a>
            <a href="../pages/teacher_add.php" class="sub-item"><i class="fas fa-eye"></i>Add Teachers</a>
          </div>
        </li>
        <li>
          <a href="#" class="sub-btn">
            <i class="fas fa-user"></i>
            <span class="nav-item">Students</span>
            <i class="fa-solid fa-angle-right dropdown"></i>
          </a>
          <div class="sub-menu">
            <a href="../process/student_show.php" class="sub-item"><i class="fas fa-eye"></i>Show Students</a>
            <a href="../pages/student_add.php" class="sub-item"><i class="fas fa-add"></i>Add Students</a>
          </div>
        </li>
        <li><a class="sub-btn" href="../pages/messages.php">
            <i class="fas fa-message"></i>
            <span class="nav-item">Messages</span>
          </a></li>
        <li><a  class="sub-btn" href="../pages/logout.php" id="logout">
            <i class="fas fa-sign-out-alt"></i>
            <span class="nav-item">Log out</span>
          </a></li>
        </ul>
      </nav>
    </div>

    <script type="text/javascript">
    $(document).ready(function () {
      $('.sub-btn').click(function () {
        $(this).next('.sub-menu').slideToggle();
        $(this).find('.dropdown').toggleClass('rotate');
      });
    });
  </script>

  </body>

  </html>
<?php }
?>