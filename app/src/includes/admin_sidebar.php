<?php

include "../includes/connection.php";
$sql = "SELECT email FROM user where role=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $email = $row['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin_sidebar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
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
          <?php echo $email ?>
        </span>
        <br><br>
        <li><a href="../admin/admin_dashboard.php">
            <i class="fas fa-home"></i>
            <span class="nav-item">Dashboard</span>
          </a></li>
        <li><a href="../pages/class.php">
            <i class="fas fa-users"></i>
            <span class="nav-item">Class</span>
          </a></li>
        <li><a href="../pages/teacher.php">
            <i class="fas fa-user-graduate"></i>
            <span class="nav-item">Teacher</span>
          </a></li>
        <li><a href="../pages/student.php">
            <i class="fas fa-user"></i>
            <span class="nav-item">Student</span>
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