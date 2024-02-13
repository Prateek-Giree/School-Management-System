<?php
session_start();
include('../includes/connection.php');

// Redirect to index page if session dont exists
if (empty($_SESSION['email'])) {
    header('location:../../public/index.php');
    exit();
} else {
    // Query to fetch total number of classes
    $sqlTotalClasses = "SELECT COUNT(*) AS total_classes FROM class";
    $resultTotalClasses = $conn->query($sqlTotalClasses);
    $rowTotalClasses = $resultTotalClasses->fetch_assoc();
    $totalClasses = $rowTotalClasses['total_classes'];

    // Query to fetch total number of teachers
    $sqlTotalTeachers = "SELECT COUNT(*) AS total_teachers FROM user where role=1";
    $resultTotalTeachers = $conn->query($sqlTotalTeachers);
    $rowTotalTeachers = $resultTotalTeachers->fetch_assoc();
    $totalTeachers = $rowTotalTeachers['total_teachers'];

    // Query to fetch total number of students
    $sqlTotalStudents = "SELECT COUNT(*) AS total_students FROM student";
    $resultTotalStudents = $conn->query($sqlTotalStudents);
    $rowTotalStudents = $resultTotalStudents->fetch_assoc();
    $totalStudents = $rowTotalStudents['total_students'];
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/admin_dashboard.css">
        <title>Admin Panel | Dashboard</title>
    </head>

    <body>
        <div class="hero">
            <?php
            include_once "../includes/admin_sidebar.php";
            ?>
            <div class="outer">
                <?php
                include_once "../includes/header.php";
                ?>
                <div class="main">
                    <div class="title">
                        <p>Report Summary</p>
                    </div>
                    <div class="report">
                        <div class="content">
                            <div class="card">
                                <p>Total class:</p>
                                <p>
                                    <?php echo $totalClasses; ?>
                                </p>
                                <a href="">View class</a>
                            </div>
                            <i class="fa            s fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="card">
                                <p>Total Teachers:</p>
                                <p>
                                    <?php echo $totalTeachers; ?>
                                </p>
                                <a href="">View teachers</a>
                            </div>
                            <i class="fa-solid fa-user-graduate"></i>
                        </div>
                        <div class="content">
                            <div class="card">
                                <p>Total Students:</p>
                                <p>
                                    <?php echo $totalStudents; ?>
                                </p>
                                <a href="">View students</a>
                            </div>
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <?php
}
?>